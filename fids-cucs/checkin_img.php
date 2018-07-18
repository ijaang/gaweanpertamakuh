B
<?php
 $img=$_POST["img"];
 if(!$img){$img=$_GET["img"];}
?>
<html>
 <head>
  <script type="text/javascript" src="js/jquery.min.js"></script>
 </head>
 <body style="background: #000000; overflow:hidden;">
  <table style="width: 100%; height: 100%;" border="0" cellspacing="0" cellpadding="0">
   <tr style="height: 100%; background:white;">
    <td style="FONT-SIZE: 100px; width:100%; color:White;"><img src="<?php echo $img;?>" width="100%" height="100%"></td>
   </tr>
  </table>
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
        var flt=resp.FlightNo;
        var img=resp.ImagePath;
        if(!img){
          if(typeof flt !== 'undefined'){
            window.location.href="checkin.php";
          }else{
            window.location.href="index.php";
          }
        }  
  
      },
      complete: function() {
        setTimeout(repeatAjax,30000); //After completion of request, time to redo it after a second
     }
  });
 }
</script>
 
</html>
