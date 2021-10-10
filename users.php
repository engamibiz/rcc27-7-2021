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
  ?>
        <div class="container mt-5 pt-5">
            <form method="post" action="users.php?do=insert" class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">User Name</label>
            <input type="text" class="form-control" name="userName" id="validationCustom01"  required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="validationCustom02"  required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a Email.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Password</label>
            <div class="input-group has-validation">
                <input type="text" class="form-control" name="password" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Please choose a password.
                </div>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
        </div>
<?php
}elseif ($do == 'insert'){
    // insert page
    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passHash=password_hash($password,PASSWORD_BCRYPT);
    if(empty($userName)){
        $errors[]='user name can not be empty';
    }
    if(empty($email)){
        $errors[]='email can not be empty';
    }
    if(empty($password)){
        $errors[]='password can not be empty';
    }
    $count=$userObject->unique("userName='$userName'");
    if($count > 0){
        $errors[]='user name is already registred';
    }
    $count=$userObject->unique("email='$email'");
    if($count > 0){
        $errors[]='email is already registred';
    }
    echo '<div class="container mt-5 pt-5">';
    if(isset($errors)){
        // there are errors

        foreach ($errors as $error){
            echo '<div class="alert alert-danger">'. $error . '</div>';
        }

    }else{
        $userObject->insert("userName='$userName',email='$email',password='$passHash'");
        echo '<div class="alert alert-success">Added Successfully</div>';
    }
    echo '</div>';
    header("Refresh:5;url=users.php");

}elseif ($do == 'edit'){
    // edit page
    echo 'Edit Page';
}elseif ($do == 'update'){
    // update page
    echo 'Update Page';
}elseif ($do == 'delete'){
    // delete page
   if(isset($_GET['id'])){
       $id=$_GET['id'];
       $userObject->delete($id);
       header("Location:users.php");
   }else{
       header("Location:users.php");
   }
}else{
    // non page
    echo 'you are not authorized';
    header("Location:users.php");

}

include 'footer.php';
