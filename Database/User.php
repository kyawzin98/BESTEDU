<?php
session_start();

class User
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', 'root', 'kz_crud_with_l_&_r');
        if ($this->db->connect_error) {
//            return $this->db->connect_error;
            echo "Can not connect to Database";
        }
    }

    public function user_register($name, $email, $phone, $role='user', $password)
    {
        $sql = "Select * From users Where name='$name' OR email='$email'";
        //checking if the username or email is available in db
        $check = $this->db->query($sql);
        $count_rows = $check->num_rows;
        //if the username or email is not in db then insert to the table
        $password = md5($password);
        if ($count_rows == 0) {
            $sql = "Insert Into users (name,email,phone,role,password) Values('$name','$email','$phone','$role','$password')";
            $result = $this->db->query($sql) or die(mysqli_connect_errno() . "Data cannot inserted");

            $_SESSION['login'] = true;
            $_SESSION['id']=$this->db->insert_id;
            $_SESSION['role'] = $role;
            return $result;
        }
    }

    public function login($name, $password)
    {
        $sql2 = "Select * From users Where name='$name' And password='$password'";
        //checking if the username is available in the table
        $result = $this->db->query($sql2);
        $data = $result->fetch_array();
        $count_rows = $result->num_rows;
        if ($count_rows == 1) {
            // this login var will use for the session
            $_SESSION['login'] = true;
            $_SESSION['id'] = $data['id'];
            $_SESSION['role'] = $data['role'];
            return true;
        } else {
            return false;
        }
    }

    public function retrieveData($id)
    {
        $sql = "Select * From users Where id=" . $id;
        $data = $this->db->query($sql);
        $res = $data->fetch_assoc();
        return $res;
    }

    public function myEdit($id, $name, $email, $phone, $role, $password)
    {
        $update_query = "Update users Set name='$name',email='$email',phone='$phone',role='$role',password='$password' Where id='$id'";
        $res = $this->db->query($update_query);
        return $res;
    }

    public function delete($id)
    {
        $sql = "Delete From users Where id=" . $id;
        $res = $this->db->query($sql);
        return $res;
    }

    /*** starting the session ***/
    public function get_Session()
    {
        return $_SESSION['login'];
    }

    public function logout()
    {
        return $_SESSION['login'] = FALSE;
        session_destroy();
    }


}
