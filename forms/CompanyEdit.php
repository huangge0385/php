<?php




include('../../htConfig/dbConfig.php');
$dbSuccess = false;
$dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);

if ($dbConnected) {
	$dbSelected = mysql_select_db($db['database'], $dbConnected);
	if ($dbSelected) {
		$dbSuccess = true;
	}
}



if ($dbSuccess) {
	
	$tPerson_SQLselect = "SELECT ";
	$tPerson_SQLselect .= "ID, preName, Name ";
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tCompany ";
	$tPerson_SQLselect .= "ORDER BY Name ";

	$tCompany_SQLselect_Query = mysql_query($tPerson_SQLselect);



	echo "<form action='companyEditForm.php' method = 'post'> ";
	echo "<select name='companyID'> ";

		echo "<option value='0' label='coyvalue' selected='selected'>wow..u can select company now</option> ";


	
	while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
		$ID = $row['ID'];
		$PreName = $row['preName'];
		$CompanyName = $row['Name'];

		$CompanyFullName = trim($PreName.''.$CompanyName );

		echo "<option value='".$ID."'>".$CompanyFullName."</option>" ;

	

	


	
	}

	mysql_free_result($tCompany_SQLselect_Query);

	echo "</select>";

	echo "<input type='submit'/> ";

	echo "</form> ";



}

echo "<br/><hr/><br/>";

echo "<a href='../index.php'>home page</a>";


?>




