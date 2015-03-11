<?php

$hostname = "localhost";
$username = "root";
$password = "";

$databaseName = "GEHUANG";

$dbConnected = mysql_connect($hostname, $username, $password);
$dbSelected = mysql_select_db($databaseName, $dbConnected);

$dbSuccess = true;

if ($dbConnected) {
	if (!$dbSelected) {
		echo "DB connection FAILED<br/><br/>";
		$dbSuccess = false;
	}
}else{
	echo "MySQL connection FAILED<br/><br/>";
	$dbSuccess = false;
}

if ($dbSuccess) {
	
	$databaseName = "gehuang";
	$drop_SQL = "DROP DATABASE ".$databaseName;
	
	if (mysql_query($drop_SQL)) {
		echo "'DROP DATABASE ".$databaseName."' - Successful";
	}else{
		echo "'DROP DATABASE ".$databaseName."' - Failed";
	}

}




?>




