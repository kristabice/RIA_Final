<?php session_start(); 
?>
<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
 <link href="scss/reset.css" rel="stylesheet"  type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

   <!-- link font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- import google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
 <!-- load lates jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
var str=location.href.toLowerCase();
$(".sidenav  .floatNav a").each(function() {
if (str.indexOf(this.href.toLowerCase()) > -1)  {
 $("a.active").removeClass("active");
$(this).addClass("active");
}
 });
 })

</script>