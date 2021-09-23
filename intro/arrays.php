<?php
$names=['ahmed','mshary','omar'];
$names=array('ahmed','mshary','omar');
// echo $names[0];
$product=[
  'name' => 'Ahmed',
  'phone' => '0123456789',
    'email' => 'ahmed@gmail.com'
];

// echo $product['phone'];

/*
foreach ($names as $name){
    echo $name . '<br>';
} */

$numbers =[1 ,6,18,3];
foreach ($numbers as $number){
    if($number % 2 == 0){
        $state='even';
    }else{
        $state='odd';
    }
    echo $number . ' is an ' . $state . ' number <br>';
}