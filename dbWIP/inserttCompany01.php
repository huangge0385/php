<?php

$hostname = "localhost";
$username = "root";
$password = "";

$databaseName = "GEHUANG";

$dbConnected = mysql_connect($hostname, $username, $password);
$dbSelected = mysql_select_db($databaseName,$dbConnected);

$dbSuccess = true;

if ($dbConnected) {
	if (!$dbSelected) {
		echo "DB connection Failed<br/><br/>";
		$dbSuccess = false;
	}
}else{
	echo "MySQL connection FAILED<br/><br/>";
	$dbSuccess = false;
}



if ($dbSuccess) {

	$company_SQLinset = "INSERT INTO tCompany (";
	$company_SQLinset .= "preName, ";
	$company_SQLinset .= "Name, ";
	$company_SQLinset .= "RegType, ";
	$company_SQLinset .= "StreetA,  ";
	$company_SQLinset .= "StreetB, ";
	$company_SQLinset .= "StreetC, ";
	$company_SQLinset .= "Town, ";
	$company_SQLinset .= "County, ";
	$company_SQLinset .= "PostCode, ";
	$company_SQLinset .= "COUNTRY ";
	$company_SQLinset .= ")";

	$company_SQLinset .= "VALUES  ";

	
	$company_SQLinset .= "(";
	$company_SQLinset .= "'The', ";
	$company_SQLinset .= "'Pie Company', ";
	$company_SQLinset .= "'', ";
	$company_SQLinset .= "'500 Northside', ";
	$company_SQLinset .= "'', ";
	$company_SQLinset .= "'', ";
	$company_SQLinset .= "'Fulton', ";
	$company_SQLinset .= "'NW', ";
	$company_SQLinset .= "'30309', ";
	$company_SQLinset .= "'USA' ";
	$company_SQLinset .= ")";
	echo "$company_SQLinset";


	if (mysql_query($company_SQLinset)) {
		echo "'Insert INTO tCompany' - Successful<br/><br/>";
	}else{
		echo "'Insert INTO tCompany' - Failed";
	}

	

}




?>




