<?php
var_dump($_POST);
$unit = $_POST['num'];
$price = $_POST['price'];
$price = $_POST['discount'];

$fprice = $unit * $price * 10;
$fprice -= $fprice / 10;
echo $fprice;

setcookie('spy_family','スターライトアーニャと呼べ',[
    'path' => '/'
]);

?>
