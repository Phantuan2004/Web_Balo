<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    if($_POST['product_name']!="") $product_name=$_POST['product_name'];
    if($_POST['$product_image']!="") $product_image=$_POST['product_image'];
    if($_POST['product_price']!="") $product_price=$_POST['product_price'];
    if((isset($_POST['product_quantity']))&&($_POST['product_quantity']>0)) $product_quantity= $_POST['product_quantity']; 
    else $product_quantity=1;
    $sp=[$product_image, $product_name, $product_quantity, $product_price];
    array_push($_SESSION['giohang'], $sp);
    header("location:cart.php");
?>