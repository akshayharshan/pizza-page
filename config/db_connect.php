<?php 

$conn = mysqli_connect('localhost:3307','akshay','test1234','ninja_pizza');

if(!$conn){
	echo 'connection error:'. mysqli_connect_error();
}

?>