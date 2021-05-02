<?php 
include 'config.php';
$id=$_GET['id'] ; 
 $deletequery = "delete form  users where id=$id";

 $query = mysqli_query($link,$deletequery );

 header('location:Mseller.php');
 ?>