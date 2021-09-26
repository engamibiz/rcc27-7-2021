<?php
include 'connect.php';
class model{
    function all($table){
        global $conn;
        $stmt=$conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}


$userObject=new model();
print_r($userObject->all('users'));