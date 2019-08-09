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
<a href="s_table.php"> Time Table </a>
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

<h1 class="notifications"> Lectures </h1>


<div class="uploads">
<h1 class='subjects'> Software Engineering-II </h1>
<table class="lec" id="lectures">
<tr>
  <th> File Name </th> <th> Size (KB's) </th> <th> Download </th>
</tr>
<?php
$sql="SELECT * FROM lectures WHERE Semester='5th' AND Subject= 'SE-II' ";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result) )
{
  $Subject=$row['Subject'];
  $File=$row['file'];
  $Size=$row['size'];
  $Sem=$row['Semester'];
?>
<tr>
  <td> <?php echo $File ?> </td>
  <td> <?php echo $Size ?> </td>
  <form method="post" action="s_lectures.php">
  <td> <input type="submit" name="download" value="Download"> </td>
  </form>
</tr>
<?php } ?>
</table>
</div>


<div class="uploads">
<h1 class='subjects'> Web Design & Developmet </h1>
<table class="lec" id="lectures">
<tr>
  <th> File Name </th> <th> Size (KB's) </th> <th> Download </th>
</tr>

<?php
$sql="SELECT * FROM lectures WHERE Semester='5th' AND Subject= 'Web' ";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result) )
{
  $Subject=$row['Subject'];
  $File=$row['file'];
  $Size=$row['size'];
  $Sem=$row['Semester'];
?>

<tr>
  <td> <?php echo $File ?> </td>
  <td> <?php echo $Size ?> </td>
  <form method="post" action="s_lectures.php">
  <td> <input type="submit" name="download" value="Download"> </td>
  </form>
</tr>

<?php } ?>
</table>
</div>


<div class="uploads">
<h1 class='subjects'> Human Computer Interaction </h1>
<table class="lec" id="lectures">
<tr>
  <th> File Name </th> <th> Size (KB's) </th> <th> Download </th>
</tr>

<?php
$sql="SELECT * FROM lectures WHERE Semester='5th' AND Subject= 'HCI' ";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result) )
{
  $Subject=$row['Subject'];
  $File=$row['file'];
  $Size=$row['size'];
  $Sem=$row['Semester'];
?>
<tr>
  <td> <?php echo $File ?> </td>
  <td> <?php echo $Size ?> </td>
  <form method="post" action="s_lectures.php">
  <td> <input type="submit" name="download" value="Download"> </td>
  </form>
</tr>
<?php } ?>
</table>


</div>
<div class="uploads">
<h1 class='subjects'> Theory Of Automata </h1>
<table class="lec" id="lectures">
<tr>
  <th> File Name </th> <th> Size (KB's) </th> <th> Download </th>
</tr>

<?php
$sql="SELECT * FROM lectures WHERE Semester='5th' AND Subject= 'TOA' ";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result) )
{
  $Subject=$row['Subject'];
  $File=$row['file'];
  $Size=$row['size'];
  $Sem=$row['Semester'];
?>
<tr>
  <td> <?php echo $File ?> </td>
  <td> <?php echo $Size ?> </td>
  <form method="post" action="s_lectures.php">
  <td> <input type="submit" name="download" value="Download"> </td>
  </form>
</tr>
<?php } ?>
</table>
</div>

<div class="uploads">
<h1 class='subjects'> Computer Communication & Networks </h1>
<table class="lec" id="lectures">
<tr>
  <th> File Name </th> <th> Size (KB's) </th> <th> Download </th>
</tr>

<?php
$sql="SELECT * FROM lectures WHERE Semester='5th' AND Subject= 'CCNet' ";
$result=$conn->query($sql);
while($row=mysqli_fetch_array($result) )
{
  $Subject=$row['Subject'];
  $File=$row['file'];
  $Size=$row['size'];
  $Sem=$row['Semester'];
?>
<tr>
  <td> <?php echo $File ?> </td>
  <td> <?php echo $Size ?> </td>
  <form method="post" action="s_lectures.php">
  <td> <input type="submit" name="download" value="Download"> </td>
  </form>
</tr>
<?php } ?>
</table>
</div>


<footer>
<p> Copyright &copy 2018 </p>
</footer>
</body>
</html>

