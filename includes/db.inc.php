<?php

try
{
	$conn = new PDO("mysql: hosst=localhost; dbname=quotes","root","");
	$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$conn -> exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
	$error = "There is no database connection";
	include 'error.html.php';
	exit();
}



?>