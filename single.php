<?php
include 'connect.php';
$id=$_GET['id'];
$stmt=$conn->prepare("SELECT * FROM users WHERE id='$id'");
$stmt->execute();
$users=$stmt->fetch();
echo '<pre>';
print_r($users);


//   http://localhost/rcc27-7-2021/single.php?id=5
