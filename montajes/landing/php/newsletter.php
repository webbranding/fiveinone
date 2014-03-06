<?php
$email=$_POST['email'];
echo $email;
$dbhost     = "localhost";
$dbname     = "fiveino1_fiveinone";
$dbuser     = "fiveino1_5i9";
$dbpass     = "Nycolas86";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sql="INSERT INTO newsletter (EMAIL, PERMITE) VALUES ('$email', 1)";
$consulta = $conn->prepare($sql);	
$consulta -> execute();
$conn = null;