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
	
	

	$tCompany_SQLselect = "SELECT  ";
	$tCompany_SQLselect .= "ID, preName, Name FROM ";
	$tCompany_SQLselect .= "tCompany ";
	$tCompany_SQLselect .= "Order By Name" ;



	$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);




	echo "<form  action='CompanyListPeople.php' method='post'> ";

	echo "<select name='companyID'>";

		echo "<option value='0' label='coyvalue' selected='selected'>...select company..</option>";

			

		while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
			
			$ID = $row['ID'];
			$preName = $row['preName'];
			$companyName = $row['Name'];
			$RegType = $row['RegType'];

			$fullCoyName = trim($preName." ".$companyName." ".$RegType);

			
			echo "<option value='".$ID."'>".$fullCoyName."</option>";
		
	}
		 


	mysql_free_result($tCompany_SQLselect_Query);

	echo "</select>";

	echo "<input type='submit'/> ";

	echo "</form> ";


	echo "<br/><hr/><br/>";

	echo "<a href='companyEdit.php'>Select a different company</a> ";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<a href='../index.php'>homepage</a> ";


}



?>




