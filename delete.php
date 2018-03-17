<?php
include 'Database/User.php';
$id=$_GET['id'];
$user=new User();
if (isset($id)){
    $deleted=$user->delete($id);
    if ($deleted){
        $smg="Deleted Successfully";
        header('location:home_page.php');
    }else{
        $smg="Deletion Failed";
    }
}