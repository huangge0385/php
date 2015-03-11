<?php

$hostname = "localhost";
$username = "root";
$password = "";

$databaseName = "GEHUANG";

$dbConnected = mysql_connect($hostname, $username, $password);

$dbSuccess = true;

if ($dbConnected) {
}else{
	echo "MySQL connection FAILED<br/><br/>";
	$dbSuccess = false;
}

if ($dbSuccess) {

	$databaseName = "gehuang";
	$drop_SQL = "CREATE DATABASE ".$databaseName;
	
	if (mysql_query($drop_SQL)) {
		echo "'Create DATABASE ".$databaseName."' - Successful";
	}else{
		echo "'Create DATABASE ".$databaseName."' - Failed";
	}

}




?>




