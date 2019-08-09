<?php
session_start();
include "db_connect.php";

if( isset($_POST["subscribe"]) )
{
  $e = $_POST["email"];
  $sql= "INSERT INTO subscribers (email) VALUES ('$e')";
  $conn->query($sql);
}


?>

<!DOCTYPE html>
<html>
<head> 
<title> UIIT - University Institute Of Information & Technology </title>
<link rel="stylesheet" href="Styles.css">
<meta name="viewport" content="width: device-width, initial-scale: 1.0">
</head>

<body>

<header>
<div class="logo">
<a href="UIIT_homepage.php">UIIT </a>
</div>

<div class="slag">
University Institute Of Information & Technology
</div>
</header>
<hr>

<div class="nav">
<ul>
<li> <a href="About_UIIT.php"> About UIIT </a> </li>
<li> <a href="Admissions.php"> Admissions </a> </li>
<li> <a href="UIIT_login.php"> Log In </a> </li>
</ul>
</div>


<h1 class="bold_h1"> UIIT Today </h1>
<p class="sub_h"> The latest news from UIIT </p>


<div class="fullwidth">
<img src="Pics/blur.jpg">
<div class="img_text">

“UIIT is a place where creative things happen naturally at the intersection of many different disciplines, and such an intersection is where I work and play.”</div>
</div>


<div class="post4">
<div class="p4pic"> <img src="pics/t5.jpg"> </div>
<div class="p4text">
<span class="h"> Trip to trial 5 </span><br><br>
A trip towards the sky touching mountains of margalla
</div></div>


<div class="post4">
  <div class="p4pic"> <img src="pics/coding.jpg"> </div>
  <div class="p4text">
  <span class="h"> coding compeetion </span><br><br>
  Over 200 students participate in the coding competetion
  </div>
</div>



<div class="post4">
<div class="p4pic"> <img src="pics/cleaning.jpg"> </div>
<div class="p4text">
<span class="h"> Environmental cleaning day </span><br><br>
Promote the aweraness about the importance of cleaning environment
</div></div>

<div class="post4">
<div class="p4pic"> <img src="pics/m.jpg"> </div>
<div class="p4text">
<span class="h"> Meeting </span><br><br>
A meeting is conducted to discuss about the current affairs of UIIT
</div></div>

<a href="">
<div class="cbutton">
More About UIIT
</div>
</a>

<div class="sub">
Get daily news updates from UIIT Report <br>
<form method="post" action="UIIT_homepage.php">
<br><input type="email" name="email" placeholder="your_email@email.com">
<input type="submit" name="subscribe" value="Subscribe">
</form>
</div>

<div class="post_card">
<h1 class="bold_h1"> UIIT Events </h1>
<p class="sub_h"> What’s happening on campus </p>

<div class="post_event">
 <div class="post_event_pic"> <img src="pics/atif.jpg"> </div>
<div class="post_event_date">
<b>25</b><br>Jan
</div>
  <div class="post_event_text">
    <span class="h"> Concert </span><br><br>
    Musical night with Atif Aslam's voice, get ready for the blast
<br><br><span style="font-size: 15px; font-weight:normal;">10:00 PM</span>
  </div>
</div>

<div class="post_event">
  <div class="post_event_pic"> <img src="pics/qasim.jpg"> </div>
<div class="post_event_date">
<b>08</b><br>Feb
</div>
  <div class="post_event_text">
  <span class="h"> Seminar </span><br><br>
  Motivational speaker & life coach Qasim Ali Shah
<br><br><span style="font-size: 15px; font-weight:normal;">02:00 PM</span>
  </div>
</div>

<div class="post_event">
<div class="post_event_pic"> <img src="pics/dinner.jpg"> </div>
<div class="post_event_date">
<b>17</b><br>Feb
</div>
<div class="post_event_text">
<span class="h"> UIIT Annual Dinner </span><br><br>
UIIT students & teachers arrange an event 
<br><br><span style="font-size: 15px; font-weight:normal;">06:30 PM</span>
</div></div>


<div class="post_event">
<div class="post_event_pic"> <img src="pics/sw.png"> </div>
<div class="post_event_date">
<b>10</b><br>Mar
</div>
<div class="post_event_text">
<span class="h"> Sports Week </span><br><br>
UIIT Sports Week opening ceremony
<br><br><span style="font-size: 15px; font-weight:normal;">11:00 AM</span>
</div></div>


<a href="">
<div style="margin-top:100px;" class="cbutton">
More UIIT Events
</div>
</a>

</div>


<footer>
<p> &copy; 2010-<?php echo date("Y");?> </p>
</footer>

</body>
</html>