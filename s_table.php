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

$sql = "SELECT * FROM student WHERE email='$email' ";
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
 $sql="UPDATE student SET image='$pic' WHERE email='$email' ";
if($conn->query($sql) === TRUE)
{
  header("Location: student.php");
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

<div class="logout">
<a href="student.php"> Home </a>
</div>
</div>

<div class="pp">
<?php
if($row["image"]==NULL)
{
echo "
<form method='post' action='student.php' enctype='multipart/form-data'>
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
<?php echo $row["Arid"] ?><br>
<?php echo $row["Email"] ?><br>
<?php echo $row["Degree"] ?><br>
Semester <?php echo $row["Semester"] ?><br>
CGPA <?php echo $row["CGPA"] ?><br>
</p>
<p>
</div>

<div class="flex4">
<a href=""> Time Table </a>
</div>

<div class="flex4">
<a href="s_lectures.php"> Download Lectures </a>
</div>

<div class="flex4">
<a href="s_degree.php"> Degree Statistics </a>
</div>

<div class="flex4">
<a href="s_attendence.php"> Attendence </a>
</div>

<h1 class="notifications"> Time Table </h1>
<hr>

<table id="customers">
<tr>
 <td> </td>
 <td>8:30 am -9:50 am </td>
 <td>10:00 am - 11:20 am </td>
 <td>11:30 am -12:50 pm </td>
 <td>1:00 pm -2:20 pm </td>
</tr>

<tr>
 <td>Monday </td>
 <td> Human Computer Interaction </td>
 <td> Web Design & Development </td>
 <td> Computer Communication Networks </td>
 <td> --- </td>
</tr>

<tr>
 <td> Tuesday </td>
 <td> Computer Communication Networks </td>
 <td> ---  </td>
 <td> Theory Of Automata </td>
 <td> Computer Org. Language </td>
</tr>

<tr>
 <td> Wednesday </td>
 <td> --- </td>
 <td> --- </td>
 <td> --- </td>
 <td> --- </td>
</tr>

<tr>
 <td> Thursday </td>
 <td> Software Engineering-II </td>
 <td>  Human Computer Interaction   </td>
 <td> Web Design & Development </td>
 <td> Theory Of Automata </td>
</tr>

<tr>
 <td> Friday </td>
 <td>  Software Engineering-II  </td>
 <td> --- </td>
 <td> Computer Org. Language </td>
 <td> ---  </td>
</tr>
</table>







<footer>
<p> Copyright © 2018 </p>
</footer>
</body>
</html>

