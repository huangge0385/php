<?php




echo "<p>this is my 1st page win 3<p>";

$hostname = "localhost";
$username = "root";
$password = "";

$databaseName = "GEHUANG";

$dbConnected = mysql_connect($hostname, $username, $password);
$dbSelected = mysql_select_db($databaseName, $dbConnected);

if ($dbConnected) {
	echo "MySQL connected OK<br/><br/>";
	echo "this file use inner data to connnect";
	if ($dbSelected) {
		echo "DB connected OK<br/><br/>";
	}else{
		echo "DB connection FAILED<br/><br/>";
	}
}else{
	echo "MySQL connection FAILED<br/><br/>";
}

?>




