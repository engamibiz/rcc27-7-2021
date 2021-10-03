<?php
include 'connect.php';
function all($table){
    global $conn;
    $stmt=$conn->prepare("SELECT * FROM $table");
    $stmt->execute();
    return $stmt->fetchAll();
}


print_r(all('categories'));