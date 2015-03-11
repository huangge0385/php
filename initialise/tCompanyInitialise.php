<?php


//htdocs/initialise/tComanyInitialise.php





include('../../htConfig/dbConfig.php');
$dbSuccess = false;
$dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);

if ($dbConnected) {
	$dbSelected = mysql_select_db($db['database'], $dbConnected);
	if ($dbSelected) {
		$dbSuccess = true;
	}
}




if ($dbSuccess) 
{

	$tableName = 'tCompany';
	$CSVfileName = 'csvCompany';

	$tCompanyField = array('ID' => 'ID',
		'preName' =>  'preName',
		'Name' => 'Name',
		'Regtype' => 'Regtype',
		'StreetA' => 'StreetA',
		'StreetB' => 'StreetB',
		'StreetC' => 'StreetC',
		'Town' => 'Town',
		'County' => 'County',
		'Postcode' => 'Postcode',
		'COUNTRY' => 'COUNTRY',	
		);
	

	//$personData[0] = array("Ms", "Mary", "Hasiett","2");
	//$personData[1] = array('Mrs', 'Cill', 'Hennesey', '1');	
	$file = fopen($CSVfileName, 'r' );
	$i = 0;
	while (!feof($file)) {
		$thisLine = fgets($file);
		$tCompanyData[$i] = explode(',', $thisLine);

		$i++;
	}
	
	fclose($file);
	
	$numRows = sizeof($tCompanyData);

	$tCompany_SQLinsert = "INSERT INTO ".$tableName."(
		".$tCompanyField['preName'].",
		".$tCompanyField['Name'].",
		".$tCompanyField['Regtype'].",
		".$tCompanyField['StreetA'].",
		".$tCompanyField['StreetB'].",
		".$tCompanyField['StreetC'].",
		".$tCompanyField['Town'].",
		".$tCompanyField['County'].",
		".$tCompanyField['Postcode'].",
		".$tCompanyField['COUNTRY'].")";
	
	$tCompany_SQLinsert .= "VALUES ";

	$index = 0;

	while ($index < $numRows) {
		$tCompany_SQLinsert .= "( 
			'".$tCompanyData[$index][0]."',
			'".$tCompanyData[$index][1]."',
			'".$tCompanyData[$index][2]."',
			'".$tCompanyData[$index][3]."',
			'".$tCompanyData[$index][4]."',
			'".$tCompanyData[$index][5]."',
			'".$tCompanyData[$index][6]."',
			'".$tCompanyData[$index][7]."',
			'".$tCompanyData[$index][8]."',
			'".$tCompanyData[$index][9]."')";
		if ($index < ($numRows - 1)) {
			$tCompany_SQLinsert .= ",";
		}
		$index++;
	}

	if (mysql_query($tCompany_SQLinsert)) {
		echo "INSERT tCompany Success";
	}
	else{
		echo "INSERT tCompany Failed<br/>love you always";
	}

}




?>


