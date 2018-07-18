<?php
date_default_timezone_set("Asia/Bangkok");
 
include "lib/connect.php";
$query="select max(logininx) as temp from userlogin";
$result=mssql_query($query) or die(mssql_get_message());
$row=mssql_fetch_assoc($result);
$id=0;
if ($row){
  $id=(int)$row["temp"];
  $id=$id+1;
}
$query="insert into userlogin(logininx,userid,logintime,flightno,ipaddress,ck) values ('".$id."','21','".date("Y-m-d H:i:s")."','AK0124','192.168.5.70','0')";
mssql_query($query);

include "lib/disconnect.php";
?>