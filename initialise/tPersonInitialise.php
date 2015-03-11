

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

	$tableName = 'tPerson';
	$CSVfileName = 'csvPerson';

	{
		$personField = array('Salutation' => 'Salutation',
		'FirstName' =>  'FirstName',
		'LastName' => 'LastName',
		'CompanyID' => 'CompanyID',	
		);
	}

	//$personData[0] = array("Ms", "Mary", "Hasiett","2");
	//$personData[1] = array('Mrs', 'Cill', 'Hennesey', '1');	
	$file = fopen($CSVfileName, 'r' );
	$i = 0;
	while (!feof($file)) {
		$thisLine = fgets($file);
		$personData[$i] = explode(',', $thisLine);

		$i++;
	}
	fclose($file);
	
	$numRows = sizeof($personData);

	$person_SQLinsert = "INSERT INTO tPerson(
		".$personField['Salutation'].",
		".$personField['FirstName'].",
		".$personField['LastName'].",
		".$personField['CompanyID'].")";
	
	$person_SQLinsert .= "VALUES ";

	$index = 0;

	while ($index < $numRows) {
		$person_SQLinsert .= "( 
			'".$personData[$index][0]."',
			'".$personData[$index][1]."',
			'".$personData[$index][2]."',
			'".$personData[$index][3]."')";
		if ($index < ($numRows - 1)) {
			$person_SQLinsert .= ",";
		}
		$index++;
	}


	if (mysql_query($person_SQLinsert)) {
		echo "INSERT tPerson Success";
	}
	else{
		echo "INSERT tPerson Failed";
	}


}


