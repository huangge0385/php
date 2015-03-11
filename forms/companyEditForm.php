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
	
	$companyID = $_POST['companyID'];

	if ($companyID == 0) {
		header("Location: companyEdit.php");
	}

	$tCompany_SQLselect = "SELECT * ";
	$tCompany_SQLselect .= "FROM ";
	$tCompany_SQLselect .= "tCompany ";
	$tCompany_SQLselect .= "WHERE ID ='".$companyID."'" ;



	$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);




	echo "<form name='postCompany' action='CompanyUpdate.php' method='post'> ";
	echo "<input type='hidden' name='companyID' value='".$companyID."'/> " ;

			echo "<table border ='1'> ";

			echo "<tr>";	

				echo "<td>#</td>";
				echo "<td>Name</td>";
				echo "<td>RegTye</td>";
				echo "<td>StreetA</td>";
				echo "<td>StreetB</td>";
				echo "<td>StreetC</td>";
				echo "<td>Town</td>";
				echo "<td>County</td>";
				echo "<td>Postcode</td>";
				echo "<td>COUNTRY</td>";

			echo "</tr>";

	while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
		$current_ID = $row['ID'];
		$current_preName = $row['preName'];
		$current_Name = $row['Name'];
		$current_RegType = $row['RegType'];

		$current_StreetA = $row['StreetA'];
		$current_StreetB = $row['StreetB'];
		$current_StreetC = $row['StreetC'];
		$current_Town = $row['Town'];
		$current_County = $row['County'];
		$current_Postcode = $row['Postcode'];
		$current_COUNTRY = $row['COUNTRY'];

			echo "<tr>";
				echo "<td><input type='text' name='preName' value='".$current_ID."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_preName."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_Name."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_RegType."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_StreetA."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_StreetB."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_StreetC."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_Town."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_County."'/></td>" ;
				echo "<td><input type='text' name='preName' value='".$current_COUNTRY."'/></td>" ;

			echo "</tr>";
		
	}
			echo "</table>";
			echo "<input type='submit' value='Save' />  ";

		echo "</form>";


	mysql_free_result($tCompany_SQLselect_Query);

	echo "<br/><hr/><br/>";

	echo "<a href='companyEdit.php'>Select a different company</a> ";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<a href='../index.php'>homepage111</a> ";


}



?>




