<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!= true)
{
  //not logged in move to login page
  header("Location: UIIT_login.php");
  exit;
}
include 'db_connect.php';

$email = $_SESSION["email"];

$sql = "SELECT * FROM admin WHERE Email = '$email' ";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
  $row = $result->fetch_assoc();
}

//Upload Image
if (isset( $_POST['submit']) )
{
 $pic=basename($_FILES['pic']['name']);
 $tmp_pic_name= $_FILES['pic']['tmp_name'];
 $pic_path = 'include/'.$pic ;
 move_uploaded_file($tmp_pic_name, $pic_path);
 $sql="UPDATE admin SET image='$pic' WHERE Email='$email' ";
if($conn->query($sql) === TRUE)
{
  header("Location: admin.php");
} 
else
{ echo "Error occured....!" . mysqli_error($conn); }
}

?>


<!DOCTYPE html>
<html>
<head> <title> UIIT - University Institute Of Information & Technology </title>
<link rel="stylesheet" href="Styles.css">
<meta name="viewport" content="width: device-width, initial-scale: 1.0">
</head>
<body>

<div class="bar">
<p class="welcome">

Welcome <?php echo $row["Name"] ?>, to online student portal of UIIT

</p>
<div class="logout">
<a href="logout.php"> Logout </a>
</div>
</div>

<div class="pp">

<?php
if($row["image"]==NULL)
{
echo "
<form method='post' action='admin.php' enctype='multipart/form-data'>
<input type='file' name='pic' id='pic'>
<input type='submit' name='submit' value='Upload'>
</form>
";
}
else
{
$i="include/".$row["image"];
echo "<img src='$i' />";
}
?>
</div>

<div class="inf">

<span class="name"> <?php echo $row["Name"] ?> </span><br>
<p class="info">
<?php echo $row["Designation"] ?><br>
<?php echo $row["Email"] ?><br>
</p>
<p>
</div>

<div class="flex4">
<a href=""> Set Time Tables </a>
</div>

<div class="flex4">
<a href="upload_lec.php"> Upload Lectures </a>
</div>

<div class="flex4">
<a href=""> Degree Statistics </a>
</div>

<div class="flex4">
<a href=""> Update Attendence </a>
</div>

<h1 class="notifications"> Important Notifications </h1>
<hr>

<div class="n1">
Web project submission last date is 15 Jan 2018.
Get ready for the demos. 
</div>

<div class="n_pic">
<a href="pics/evo.jpg" target="_blank"><img src="pics/evo.jpg"></a>
<div class="n_pic_txt"> 
EVO distribution under Prime Minister Laptop Scheme (Phase-III)
 </div> 

<div class="n_dwnld"> <a href=""> Download EVO receiving form </a> </div>

</div>







<footer>
<p> Copyright © 2018 </p>
</footer>
</body>
</html>