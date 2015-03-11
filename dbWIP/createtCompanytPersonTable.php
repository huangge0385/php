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

	$createTable_SQL = "CREATE TABLE GEHUANG.tCompany ( ";
	$createTable_SQL .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
	$createTable_SQL .= "preName VARCHAR(50), ";
	$createTable_SQL .= "Name VARCHAR(250) NOT NULL, ";
	$createTable_SQL .= "RegType VARCHAR(50) NULL, " ;

	$createTable_SQL .= "StreetA VARCHAR(150), ";
	$createTable_SQL .= "StreetB VARCHAR(150), ";
	$createTable_SQL .= "StreetC VARCHAR(150), ";
	$createTable_SQL .= "Town VARCHAR(150), ";
	$createTable_SQL .= "County VARCHAR(150), ";
	$createTable_SQL .= "Postcode VARCHAR(50), ";

	$createTable_SQL .= "COUNTRY VARCHAR(250) NOT NULL ";
	$createTable_SQL .= ")";
		

	if (mysql_query($createTable_SQL)) {
		echo "'Create TABLE tCompany' - Successful<br/><br/>";
	}else{
		echo "'Create TABLE tCompany' - Failed";
	}

	$createPersonTable_SQL = "CREATE TABLE GEHUANG.tPerson(";
	$createPersonTable_SQL .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
	$createPersonTable_SQL .= "Salutation VARCHAR(20), ";
	$createPersonTable_SQL .= "FirstName VARCHAR(50), ";
	$createPersonTable_SQL .= "LastName VARCHAR(50), ";
	$createPersonTable_SQL .= "CompanyID INT(11) NOT NULL ";
	$createPersonTable_SQL .= ")";

	if (mysql_query($createPersonTable_SQL)) {
		echo "'Create TABLE tPerson' - Successful.<br/><br/>";
	}else{
		echo "love you";
	}

}




?>




