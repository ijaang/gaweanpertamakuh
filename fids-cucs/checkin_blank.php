<?php
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
 $query="select * userlogin where ipaddress='".$ip."'";
 $result=mssql_query($query);
 
 include "lib/disconnect.php";
?>
<html>
  <head>
    <meta http-equiv="Cache-Control" content=" no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
      window.setTimeout ("waktu()",1000);
      function waktu(){
        var tanggal=new Date();
        setTimeout("waktu()",1000);
        var hours=tanggal.getHours();
        var minutes=tanggal.getMinutes();
        if (hours.toString().length==1){
          hours = "0"+ hours
        }
        if (minutes<=9){
          minutes = "0"+ minutes
        }
      }
    </script>
    <style type="text/css">
     .style1
     {
       height: 694px;
       width: 1154px;
     }
     .style2
     {
       width: 41px;
       height: 710px;
     }
     .style3
     {
       width: 356px;
       height: 694px;
     }
     .boxyellow{
       width: 300px; 
       height: 300px; 
       background: yellow; 
       border-radius: 9px; 
       border-bottom: 2px solid #a69400; 
       background: #fff200;
       background: -moz-linear-gradient(top, #fff200 0%, #f9dc00 99%);
       background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fff200), color-stop(99%,#f9dc00));
       background: -webkit-linear-gradient(top, #fff200 0%,#f9dc00 99%);
       background: -o-linear-gradient(top, #fff200 0%,#f9dc00 99%);
       background: -ms-linear-gradient(top, #fff200 0%,#f9dc00 99%);
       background: linear-gradient(to bottom, #fff200 0%,#f9dc00 99%);
       filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff200', endColorstr='#f9dc00',GradientType=0 );   
     }
    </style>
  </head>
  <body style="background: #000000;"onload="waktu()">
    <div style="background:#2b5cc2 url(city_icon/kno-malam.jpg) no-repeat right top; background-size: 100% 100%; width: 100%; height: 100%; font-weight: bold; vertical-align:bottom;"bgcolor="transparent">
      <table>
        <tr>
          <td class="style2"></td>
          <td style="FONT-SIZE: 100px; vertical-align:bottom"class="style1">
            <div class="boxyellow">
              <div style="color: black; font-size: 160px; font-family: arial; text-align:center; padding-left: 5px; padding-right:auto; padding-top: 60px; text-shadow: 0 0 20px rgba(0,0,0,0.3),0 1px 1px rgba(0,0,0,0.6);">A1</div>
            </div>
          </td>
          <td style="FONT-SIZE: 140px; height:100%; vertical-align:bottom; font-family:Arial"class="style3">
            <p id="demo"align="right"style="color:white"></p>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>


