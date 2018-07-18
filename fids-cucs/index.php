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
 // $query="select mrl from counter where ipdisplay='".$ip."'";
 $query ="exec listfids @ip='192.168.1.88',@ck='1'";
 $result=mssql_query($query);
 $row=mssql_fetch_assoc($result);
 print_r($row);
 $temp = array();
 array_push($temp, $row);
 if($row){$_counter=$row["mrl"];}                                                    
 include "/lib/disconnect.php";
?>
<html>
  <head>
    <meta http-equiv="Cache-Control" content=" no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
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
  <body style="background: #000000;">
    <div style="background:#2b5cc2 url(city_icon/Default.jpg) no-repeat right top; background-size: 100% 100%; width: 100%; height: 100%; font-weight: bold; vertical-align:bottom;"bgcolor="transparent">
      <!-- coba test dihalaman -->
<!-- 
      <td><?php echo $row['FlightNo'];?></td>
          <td><?php echo $row['STD'];?></td>
          <td><?php echo $row['Destination'];?></td>
          <td><?php echo $row['Ket'];?></td> -->

      <!-- akhir coba -->
      <table>
        <tr>
          <td class="style2"></td>
          <td style="FONT-SIZE: 100px; vertical-align:bottom"class="style1">

            <div class="boxyellow">
              <!-- Array ( [0] => Array ( [LoginINX] => 457 [FlightNo] => ak123 [Ket] => [STD] => Jul 17 2018 12:00:00:000AM [LoginTime] => Jul 17 2018 04:26:32:000PM [Destination] => ALL FLIGHT [City] => [Counter] => 10 [Mrl] => [ImagePath] => )  -->

              <div style="color: black; font-size: 20px; font-family: arial; text-align:center; padding-left: 5px; padding-right:auto; padding-top: 60px; text-shadow: 0 0 20px rgba(0,0,0,0.3),0 1px 1px rgba(0,0,0,0.6)$_counter;"></div>
            </div>

            </div>
          </td>
          <td style="FONT-SIZE: 140px; height:100%; vertical-align:bottom; font-family:Arial"class="style3">
            <p id="demo"align="right"style="color:white"></p>
          </td>
        </tr>
      </table>
    </div>
    
  </body>
  <script type="text/javascript">
  function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
      if ((new Date().getTime() - start) > milliseconds){
       break;
      }
    }
  }
  repeatAjax();
  function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  };
  function repeatAjax(){
    jQuery.ajax({
      type: "POST",
      url: "loaddata.php?status=1",
      dataType: "json",
      success: function(resp) {
        //alert(resp.length);
        var flt=resp.FlightNo;
        if(typeof flt !== 'undefined'){
          window.location.href="checkin.php";
        }
      },
      complete: function() {
        setTimeout(repeatAjax,10000); //After completion of request, time to redo it after a second
     }
  });
 }
</script>
 
</html>


