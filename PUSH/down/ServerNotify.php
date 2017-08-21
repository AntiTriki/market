<?php
session_name('livees'); 
session_start();
date_default_timezone_set('America/La_Paz');
?>
  <script src="../../jquery-1.7.1.min.js"></script>
<style>
html,body{font-family: 'Roboto', sans-serif;
	font-size: 12px;
	/*font-style: italic;*/
	color: #000;
	background-color:#E4E4E7;
	margin: 0 0;
	
}
a{ text-decoration:none}
.curved_div {
    
	border-radius: 5px;
    /*behavior:url(border-radius.htc);*/
}
</style>
<link rel="stylesheet" href="gstyle_buttons_final.css" type="text/css"  media="screen">
<script>
 $(document).ready(function() {
 	 $("#notify").load("server_send_notify.php");
   var refreshId = setInterval(function() {
      $("#notify").load('server_send_notify?randval='+ Math.random());
   }, 60000);
   $.ajaxSetup({ cache: false });
});
</script>
<div id="notify"></div>