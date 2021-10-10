<?php
include 'connect.php';
class model{
    function all(){ // get all data from table
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function find($id){ // get single record using id
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        return $stmt->fetch();
    }
    function insert($set){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("INSERT INTO $table SET $set");
        $stmt->execute();
        // $set= userName='anas',email='anas@gmail.com'
    }
    function update($set,$id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("UPDATE $table SET $set WHERE id=$id");
        $stmt->execute();
        // $set= userName='anas',email='anas@gmail.com'
    }
    function delete($id){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("DELETE FROM $table WHERE id=$id");
        $stmt->execute();
    }
    function unique($where){
        global $conn;
        $table=get_class($this);
        $stmt=$conn->prepare("SELECT * FROM $table WHERE $where");
        $stmt->execute();
        return $stmt->rowCount();
        // $where = userName='$username'
    }
}
class users extends model{

}
class categories extends model{

}


$userObject=new users();
$categoryObject=new categories();
// $userObject->update("userName='mohsen' , email='mohsen@gmail.com' , password='123456'",4);
// $categoryObject->insert("name='emarketing'");
// $userObject->delete(6);