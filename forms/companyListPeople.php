

<?php


//htdocs/initialise/tPersonInitialise.php





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
	$tPerson_SQLselect .= "tPerson.ID, tPerson.Salutation, tPerson.FirstName, tPerson.LastName, " ;
	$tPerson_SQLselect .= "tCompany.preName, tCompany.Name ";
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tPerson ";
	$tPerson_SQLselect .= "LEFT OUTER JOIN tCompany ON ";
	$tPerson_SQLselect .= "tPerson.CompanyID = tCompany.ID ";


	$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);




	echo "<table border ='1'> ";

		echo "<tr>";	

			echo "<td>#</td>";
			echo "<td>Salutation</td>";
			echo "<td>FirstName</td>";
			echo "<td>LastName</td>";
			echo "<td>Company</td>";

		echo "</tr>";


	$index = 1;
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
		$Salutation = $row['Salutation'];
		$FirstName = $row['FirstName'];
		$LastName = $row['LastName'];
		$CompanyPreName = $row['preName'];
		$CompanyName = $row['Name'];

		$CompanyFullName = trim($CompanyPreName.''.$CompanyName );


		
		echo "<tr>";

			echo "<td>".$index."</td>" ;
			echo "<td>".$Salutation."</td>" ;
			echo "<td>".$FirstName."</td>" ;
			echo "<td>".$LastName."</td>" ;
			echo "<td>".$CompanyFullName ."</td>" ;

		echo "</tr>";


		$index++;
	}

	mysql_free_result($tPerson_SQLselect_Query);


}




?>




