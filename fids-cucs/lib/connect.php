<?php
$host="10.10.10.84";
$user="sa";
$pass="Hello123";
$db="aodb";//"airport_management_system";
$connection=mssql_connect($host,$user,$pass) or die("Cannot connect to DB ".mssql_get_last_message());
mssql_select_db($db) or die(mssql_get_last_message());
?>

