
<html>
  <head>
    <meta http-equiv="Cache-Control" content=" no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
      .boxyellow{
         width: 200px; 
         height: 200px; 
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
       .text{
         font-size: 120px; 
         font-family: arial; 
         padding-left: 50px;
         font-weight:bold;
         color:white;
       }
    </style>
  </head>
  <body style="background: #000000;">
   <div>
    <div>
     <div>
      <div style="height: 28%; background:white">
       <table  style="width: 100%; height: 100%;"border="0"cellspacing="0"cellpadding="0">
        <tr style="height: 100%;">
         <td style="FONT-SIZE: 100px; width:90%; color:White" id="logo"></td>
        </tr>
       </table>
      </div>
     <div style="background: #033266; height: 30%;">
      <table  style="width: 100%; height: 90%;" border="0"cellspacing="0"cellpadding="0">
       <tbody>
        <tr style="height: 50%;">
         <!-- <td style="FONT-SIZE: 100px; width:80%; color:White"><font style="FONT-SIZE:100px; border-style:none; width:80%; background: #033266; color:white; font-weight:bold" id="fltno"><?php echo $_flight;?></font></td> -->
         <td style="FONT-SIZE: 100px; width:80%; color:White" class="text" id="fltno"></td>
         <td style="FONT-SIZE: 120px; width:20%; color:White"align="center"rowspan="2">
          <div class="boxyellow">
	             <div id="counter" style="color: black; font-size: 100px; font-family: arial; padding-left: 7px; padding-top: 40px; text-shadow: 0 0 20px rgba(0,0,0,0.3),0 1px 1px rgba(0,0,0,0.6);"></div>
          </div>
	       </td>
	      </tr>
      	<tr style="height: 50%;">
      	 <td class="text" id="std"></td>
      	</tr>
       </tbody>
      </table>
     </div>
     <div id="imgcity" style="background:#2b5cc2  no-repeat right top;  background-size: 50% 100%; height: 42%;">
      <table style="width: 100%; height: 100%;"border="0">
       <tbody>
        <tr>
	         <td width="100%" id="destination" class="text">
            	 <!--  <table>
            	   <tbody>
            	    <tr style="height: 50%;">
            	     <td style="FONT-SIZE: 100px; color:White"><b>&nbsp;BANDUNG        </b></td>
            	    </tr>
            	    <tr style="height: 50%;">
            	     <td style="FONT-SIZE: 100px; color:White"><b>&nbsp;CUSTOMER SERVICE          </b></td>
            	    </tr>
            	   </tbody>
            	  </table> -->
	       </td>
	     </tr>
       </tbody>
      </table>
     </div>
      <div id="ket" style="FONT-SIZE: 100px; width:80%; color:White" class="text"></div>
    </div>
   </div>
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
  function getUrlParameter(name) 
      {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
      };
  function repeatAjax()
  {
    jQuery.ajax({
                    type: "POST",
                    url: "loaddata.php?status=1",
                    dataType: "json",
                    success: function(resp) {
                      //alert(resp.length);
                      var flt=resp.FlightNo; 

                      // mematikan variabel image
                      var img=resp.ImagePath;

                      // menambahkan destination
                      // var destination1=resp.Destination;
                      // codingan img
                      if(img){
                        window.location.href="checkin_img.php?img="+img;
                      }
                      // akhir codingan img

                      // if(destination1 == "ALL FLIGHT"){
                      //   var dest = document.getElementById("destination");
                      //   dest.innerHTML=resp.Destination;
                      // }
                      else{
                        if(typeof flt !== 'undefined')
                        // editan pertama (matikan logo, gambar kota,  )
                        {
                          // var logo = document.getElementById("logo");
                          // logo.innerHTML="<img src='mas_icon/"+flt.substr(0,2)+".jpg'>";

                          var flight = document.getElementById("fltno");
                          flight.innerHTML=flt;
                          var counter = document.getElementById("counter");
                          counter.innerHTML=resp.Mrl;
                          var std = document.getElementById("std");
                          std.innerHTML=resp.STD.substr(11,6);          //+":"+resp.STD.substr(2,2);

                          // var city = document.getElementById("imgcity");
                          // city.style.backgroundImage="url('city_icon/"+resp.City+".jpg')";

                          var dest = document.getElementById("destination");
                          dest.innerHTML=resp.Destination;
                          var ket = document.getElementById("ket");
                          ket.innerHTML=resp.Ket;
                        }
                        // akhir editan pertama
                        else{
                          window.location.href="index.php";
                        }
                      }
                    },
                    complete: function() {
                      setTimeout(repeatAjax,10000); //After completion of request, time to redo it after a second
                   }
                });
}
</script>
 
</html> 
  
