<?php 
	$db_name="audeg9om_printstudio";
	// database host
	$db_host="localhost:3306";
	$db_user="audeg9om";
	$db_password="Sonesh1234!@#$";
	$con=mysql_connect($db_host, $db_user, $db_password,$db_name);
	mysql_select_db($db_name);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// Perform queries 
	$result = mysql_query("SELECT * FROM text_presets");
	if($result === FALSE) { 
	    die(mysql_error()); // TODO: better error handling
	}

	$result_preset_json = '{"text_presets":[';
	$i = 0;
	$qry_to_php = $_POST['presets_fetch_qry'];
	if( $qry_to_php == "text"){
		while($row = mysql_fetch_array($result))
		{
			// $result_preset_json .= ''; 
		    $result_preset_json .= $row[0];
			$result_preset_json .= ',';
			$result_preset_json .= '{"preset_preview":"';
			$result_preset_json .= $row[1];
			$result_preset_json .= '"}';
			$result_preset_json .= ',';

		    $i++;
		}

		$result_preset_json .= '{';
		$result_preset_json .= '}],"preset_length":"';
		$result_preset_json .= $i;
		$result_preset_json .= '"}'; 
		// $result_preset_json .= ',{"length_preset:"'; 
		// $result_preset_json .= $i; 
		// $result_preset_json .= '"}}'; 

		echo$result_preset_json;
	}
	
	mysql_close($con);
?>