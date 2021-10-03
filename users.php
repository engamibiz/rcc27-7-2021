<?php
include 'header.php';
if(isset($_GET['do'])){ // check if there is paramter (do) in the url
$do=$_GET['do']; // set the value of variable $do to the value of url parameter id
}else{
    $do='select';  // set a default value for do
}

if($do == 'select'){
    $users=$userObject->all();
    // select page ?>
  <div class="container mt-5 pt-5">
      <h1>All Users</h1>
      <a href="users.php?do=add" class="btn btn-info text-white">ADD</a>
      <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Email </th>
            <th scope="col">Registration Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user){ ?>
        <tr>
            <th scope="row"><?php echo $user['id'] ?></th>
            <td><?php echo $user['userName'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['regDate'] ?></td>
            <td>
    <a href="users.php?do=single&id=<?php echo $user['id'] ?>" class="btn btn-info">View</a>
    <a href="users.php?do=edit&id=<?php echo $user['id'] ?>" class="btn btn-warning">Edit</a>
    <a href="users.php?do=delete&id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
  </div>

<?php
}elseif ($do == 'single'){
    // single page
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $user=$userObject->find($id);
    ?>
    <div class="container pt-5 mt-5 text-center">
        <h1><?php echo $user['userName']  ?></h1>
        <h2><?php echo $user['email']  ?></h2>
        <h3><?php echo $user['regDate']  ?></h3>
    </div>

    <?php
    }else{ // no id in url
        header("Location:users.php");
    }
}elseif ($do == 'add'){
    // add page
    echo 'Add Page';
}elseif ($do == 'insert'){
    // insert page
    echo 'Insert Page';
}elseif ($do == 'edit'){
    // edit page
    echo 'Edit Page';
}elseif ($do == 'update'){
    // update page
    echo 'Update Page';
}elseif ($do == 'delete'){
    // delete page
    echo 'Delete Page';
}else{
    // non page
    echo 'you are not authorized';
}

include 'footer.php';
