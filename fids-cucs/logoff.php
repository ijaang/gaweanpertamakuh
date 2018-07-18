<?php
date_default_timezone_set("Asia/Bangkok");
 
include "lib/connect.php";
$id="1";
$query="update userlogin set logouttime='".date("Y-m-d H:i:s")."',ck='2' where logininx='".$id."'";
mssql_query($query);

include "lib/disconnect.php";
?>