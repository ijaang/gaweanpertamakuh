<?php
 $ck=$_POST["status"];
 if(!$ck){$ck=$_GET["status"];}
 if(!$ck){$ck="0";}
 include "lib/connect.php";
 function get_client_ip(){
  $ipaddress = '';
  if (getenv('HTTP_CLIENT_IP')){
    $ipaddress = getenv('HTTP_CLIENT_IP');
  }else if(getenv('HTTP_X_FORWARDED_FOR')){
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
  }else if(getenv('HTTP_X_FORWARDED')){
    $ipaddress = getenv('HTTP_X_FORWARDED');
  }else if(getenv('HTTP_FORWARDED_FOR')){
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
  }else if(getenv('HTTP_FORWARDED')){
    $ipaddress = getenv('HTTP_FORWARDED');
  }else if(getenv('REMOTE_ADDR')){
    $ipaddress = getenv('REMOTE_ADDR');
  }else{
    $ipaddress = 'UNKNOWN';
  }
    return $ipaddress;
 }
 $ip=get_client_ip();
 //$ip="172.16.20.201";
 //$ck="0"; 
 //$query ="SELECT distinct top 1  a.LoginINX,c.FlightNo,c.Ket,c.STD,c.Destination,isnull(d.City,'') as City,isnull(b.Counter,'') as Counter,isnull(b.MRL,'')as Mrl,e.ImagePath from UserLogin a LEFT OUTER JOIN ";
 //$query.="Counter b on a.IPAddress=b.IPAddress LEFT OUTER JOIN Flight c on a.FlightNo=c.FlightNo LEFT OUTER JOIN City d on c.Destination=d.Name Left outer join Counter_exception e on b.mrl=e.counter WHERE b.ipdisplay='".$ip."' and CK='".$ck."' ";
 //$query.="and LoginTime > DATEADD(minute,-10,GETDATE())";
 //$query.=" order by a.logininx desc";
 //echo $query;
 //break;
 $query=mssql_init("listfids",$connection);
// echo $query;
 $res=array();
 mssql_bind($query,"@ip",$ip,SQLVARCHAR);
 mssql_bind($query,"@ck",$ck,SQLCHAR);
 $result=mssql_execute($query);
 $row=mssql_fetch_object($result);
 if($row){
  $id=$row->LoginINX;
  $query="update userlogin set ck='1' where logininx='".$id."'";
  //echo $query;
  mssql_query($query); 
 } 
 die(json_encode($row));
 include "lib/disconnect.php";
?>
