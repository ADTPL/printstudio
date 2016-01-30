<?php
//database name
$db_name="audeg9om_printstudio";
// database host
$db_host="localhost:3306";
$db_user="audeg9om";
$db_password="Sonesh1234!@#$";

$query_str = $_POST['preset_json'];
$query_str_preset_preview = $_POST['preset_preview'];

echo$query_str;

$dbconnect = mysql_connect("$db_host","$db_user","$db_password");
//verifying succcessful connection to the database
if(!$dbconnect){
	echo"failed to connect to databse";
	exit();
}
if(! mysql_select_db("$db_name")){
	echo"Unable to locate database";	
}

$submitDetails = "INSERT INTO text_presets ( preset_value, preset_preview )
					  VALUES( '$query_str', '$query_str_preset_preview');";
$insert_qry= mysql_query($submitDetails);


?>