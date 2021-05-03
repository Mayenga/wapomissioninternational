<?php
$server="localhost";
$db="waporadio";
$host="root";
$pwd="";
$conn = new mysqli("$server","$host","$pwd","$db");
	if(!$conn){
		echo"Server is offline.. comeback later!";
	}
?>