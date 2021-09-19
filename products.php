<?php
$products=[
    ['name'=>'tshirt','price'=>100,'qnt'=>10],
    ['name'=>'cap','price'=>80,'qnt'=>5],
    ['name'=>'short','price'=>50,'qnt'=>2],
    ['name'=>'glasses','price'=>120,'qnt'=>0],
];
/*
foreach ($products as $product){
    echo '<h1>' . $product['name'] . '</h1>';
    echo '<h2> Price :' . $product['price'] . '</h2>';
    echo '<h3> QNT :' . $product['qnt'];
        if($product['qnt'] == 0){
            echo ' <span style="color:red">Out Of Stock</span>';
        }
      echo  ' </h3>';
} */
foreach ($products as $product){
    ?>
    <h1><?php echo  $product['name']; ?></h1>
    <h2><?php echo  $product['price']; ?></h2>
    <h3><?php echo  $product['qnt'];
        if($product['qnt'] == 0){
            echo ' <span style="color:red">Out Of Stock</span>';
        }
    ?></h3>
<?php
}