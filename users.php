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
      <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
  </div>

<?php
}elseif ($do == 'single'){
    // single page
    echo 'Single Page';
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
