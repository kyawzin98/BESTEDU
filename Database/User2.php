<?php
session_start();
include "Db_connection.php";

class User2 extends Db_connection
{
    public function login($email, $password)
    {
        $password = md5($password);
        if (empty($email)) {
            $_SESSION['error'] = 'Email is empty! You must enter Email Address';
        } elseif (empty($password)) {
            $_SESSION['error'] = 'Password is empty! Enter your Password';
        } else {
            $sql = "Select * From users Where email='$email' And password='$password'";
            $data = $this->Connection()->query($sql);
            $fetch_data = $data->fetch_assoc();
            $count = $data->num_rows;
            if ($count == 1) {
                $_SESSION['success'] = 'Login Successfully';
                $_SESSION['login'] = true;
                $_SESSION['id'] = $fetch_data['id'];
                $_SESSION['role'] = $fetch_data['role'];
                header('location:home_page.php');
            } else {
                $_SESSION['error'] = "Email or Password doesn't match. Try Again!";
            }
        }
    }

    public function user_register($name, $email, $phone, $role = 'user', $password, $confirm_password)
    {
        $password = md5($password);
        $confirm_password = md5($confirm_password);
        if (empty($name)) {
            $_SESSION['error'] = "Username is Empty! You must Enter User Name";
        } elseif (empty($email)) {
            $_SESSION['error'] = 'Email is empty! You must enter Email Address';
        } elseif (empty($phone)) {
            $_SESSION['error'] = "Phone Number is Empty! Enter Phone Number";
        } elseif (empty($role)) {
            $_SESSION['error'] = "Role is Empty! Enter your role";
        } elseif (empty($password)) {
            $_SESSION['error'] = 'Password is empty! Enter your Password';
        } elseif (empty($confirm_password)) {
            $_SESSION['error'] = 'Confirm your Password!';
        } else {
            if ($password == $confirm_password) {
                $sql = "Select * From users Where name='$name' Or email='$email'";
                $check = $this->Connection()->query($sql);
                $count = $check->num_rows;
                if ($count == 0) {
                    $sql = "Insert Into users (name,email,phone,role,password) Values ('$name','$email','$phone','$role','$password')";
                    $data = $this->Connection()->query($sql);
//                    $fetch_data = $data->fetch_assoc();
                    if ($data) {
                        $_SESSION['login'] = true;
//                        $_SESSION['id'] = $fetch_data['id'];
//                        $_SESSION['role'] = $fetch_data['role'];
                        $_SESSION['id'] = $this->Connection()->insert_id;
                        $_SESSION['role'] = $role;
                        $_SESSION['success'] = "Registered Successfully!";
                        header('location:home_page.php');
//                        print_r($check);
                    } else {
                        $_SESSION['error'] = "Data can't Insert";
                    }
                } else {
                    $_SESSION['error'] = "User Name or Email is already exist, Try Again!";
                    header('location:register.php');
                }
            } else {
                $_SESSION['error'] = "Passwords are not match. Please Try Again!";
            }
        }
    }

    public function retrieve_data($table, $id)
    {
        $sql = "Select * From " . $table . " Where id=" . $id;
        $data = $this->Connection()->query($sql);
        $res = $data->fetch_assoc();
        return $res;
//        print_r($res);
    }

    public function retrieve_datas($table)
    {
        $sql = "Select * From " . $table;
        $datas = $this->Connection()->query($sql);
        return $datas;
//        print_r($res);
    }

    public function edit($user_data)
    {
        $id = $user_data['id'];
        $name = $user_data['name'];
        $email = $user_data['email'];
        $phone = $user_data['phone'];
        $role = $user_data['role'];
        $password = md5($user_data['password']);
        $confirm_password = md5($user_data['confirm_password']);
        $url = 'edit.php?id=' . $id;
        if (empty($name)) {
            $_SESSION['error'] = "Enter Name";
        } elseif (empty($email)) {
            $_SESSION['error'] = "Enter Email";
        } elseif (empty($phone)) {
            $_SESSION['error'] = "Enter Phone Number";
        } elseif (empty($role)) {
            $_SESSION['error'] = "Enter Role";
        } elseif (empty($password)) {
            $_SESSION['error'] = "Enter Password";
        } elseif (empty($confirm_password)) {
            $_SESSION['error'] = "Confirm your Password";
        } elseif ($password !== $confirm_password) {
            $_SESSION['error'] = "Passwords are not Match. Try Again!";
        } else {
            $sql = "Update users Set name='$name',email='$email', phone='$phone',role='$role',password='$password' Where id='$id'";
            $update = $this->Connection()->query($sql);
            $_SESSION['success'] = "Record is Successfully Updated";
        }
    }

}
//$user=new User2();
//echo $user->retrieve_data('users',37);
//echo  $user->user_register('Kyaw Ko','kko@gmail.com','09324234232','user','kyawkyaw','kyawkyaw');