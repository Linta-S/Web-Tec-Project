<?php
require "config.php";

extract($_POST);

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']))  {
	$query="INSERT INTO users ( name,username,passord) VALUES ('$name','$username','$password')";
	mysql_query($link,$query);
}
?>