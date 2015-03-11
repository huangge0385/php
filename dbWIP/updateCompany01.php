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

	$company_SQLupdate = "UPDATE tCompany set ";
	$company_SQLupdate .= "COUNTRY = 'United States' ";
	$company_SQLupdate .= "where COUNTRY = 'USA' ";


	if (mysql_query($company_SQLupdate)) {
		echo "'UPDATE  tCompany' - Successful<br/><br/>";
	}else{
		echo "'UPDATE tCompany' - Failed";
	}

	

}




?>




	