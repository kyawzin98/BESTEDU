<?php
//$db = new mysqli($this->host, $this->user_name, $this->password, $this->db_name);
$db = new mysqli('localhost', 'root', 'root', 'kz_crud_with_l_&_r');
if ($db->connect_error) {
    $error=$db->connect_error;
}
//else{
//    echo "Success";
//}
