<?php
class Db_connection{
    public function Connection(){
        $db=new mysqli('localhost','root','root','kz_crud_with_l_&_r');
        if ($db->connect_error){
            $error=$db->connect_error;
            return $error;
        }
        return $db;
    }
}