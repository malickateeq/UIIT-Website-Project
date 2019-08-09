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
$msg= "";
$sql = "SELECT * FROM admin WHERE Email = '$email' ";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
  $row = $result->fetch_assoc();
}

//Upload Files

if (isset($_POST['submit']))
{
 $fname=basename($_FILES['fname']['name']);
 $file_path = 'lectures/'.$fname ;
 $size = $_FILES['fname']['size'];
 $tmp_file_name= $_FILES['fname']['tmp_name'];
 move_uploaded_file($tmp_file_name, $file_path);
 $sub=$_POST["subject"];
 $sql="INSERT INTO Lectures (Semester, Subject, Section, file, size) 
	        VALUES ('5th' ,'$sub', 'A', '$fname','$size' ) ";

if($conn->query($sql) === TRUE)
{
  $msg="* File uploaded successfully!";
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
<a href="admin.php"> Home </a>
</div>

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

<h1 class="notifications"> Upload Lectures </h1>
<hr>

<?php echo "<div class='err'>".$msg.'</div>'; ?> 

<form method="post" action="upload_lec.php" enctype="multipart/form-data">
<table>

<tr>
  <td colspan="4" style="text-align: center;"> <input type="file" name="fname"></td>
  
  <td>
  <select name="subject">
     <option value="HCI"> Human Computer Interaction </option>
     
     <option value="COL"> Computer Organization Language </option>
     
     <option value="SE-II"> Software Engineering-II </option>
     
     <option value="TOA"> Theory Of Automata </option>
     
     <option value="Web"> Web Design & Development </option>
     
     <option value="CCNet"> Computer Communication & Networks </option>  
   </select>
  </td>

  <td> <input type="submit" name="submit" value="Upload">   </td>
</tr>

</table>
</form>



<footer>
<p> Copyright © 2018 </p>
</footer>
</body>
</html>