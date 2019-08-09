
<?php

session_start();
	//Connect DataBase
    $conn = mysqli_connect("localhost","root","","UIIT");
    if (!$conn)
      { die("Connection failed:" . mysql_connect_error());}
   
    // Login validation
          $email = $password = $role = $error = "";

if ( isset($_POST['signin']))
{
  $email = $_POST["email"];
  $password = $_POST["password"];
  $role = $_POST["role"];

  $sql = "SELECT * FROM login WHERE email='$email' ";
  $record = $conn->query($sql);
  if($record->num_rows > 0 )
  {
      $row = $record->fetch_assoc();
      if ( ($row["password"]) == ($password) )
        {
	if($row["role"] == $role)
  	{
	  if($role == "admin")
		{
		    $_SESSION['logged_in'] = true;
		    $_SESSION["email"] = $email;
		    {header("location: /Admin.php");}	
		    exit;
		}
	  if($role == "student")
		{
		    $_SESSION['logged_in'] = true;
		    $_SESSION["email"] = $email; 
		    {header("location: /student.php");}
		    exit;
		}
  	}
	else
	{
	  $error = "* Invalid role selection";
	}
            
        }
      else
         {
	$error = " * Invalid password! ";
             //echo "<script>alert('Invalid password') </script>";
         }
   }
   else
   {
         $error=" * Invalid email address!";
         //echo " <script> window.alert('Invalid email address') </script> " ;
   }
}
     //mysql_free_result(resource $result);
     $conn->close();
?>
<!DOCTYPE html>
<html>
<head> <title> UIIT - University Institute Of Information & Technology </title>
<link rel="stylesheet" href="Styles.css">
<script src="validation.js"></script>
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

<h1 style="text-align: center;"> Sign In to your account </h1> <br>

<form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table class="login">

<tr> <td colspan="3"><?php echo "<p class='err'>" . $error . " </p> "; ?></td> </tr>

<tr>
<td>Email: </td>  
  <td colspan="3"> <input type="text" name="email" value="<?php echo $email ?>" required>
  </td>
</tr>

<tr>
<td>Password:</td>
 <td colspan="3"><input type="password" name="password" required>
 </td>
</tr>

<tr>

<td>Sign In as:</td> 
<td colspan="3">
<input type="radio" name="role" value="student" checked> Student
<input type="radio" name="role" value="admin" > Admin
</td>

</tr>

<tr>
<td colspan="4"><input type="submit" name="signin" value="Sign In"></td>
</tr>
</table>
</div>

</form>
<div class="logintxt">
<p>
Sign In to your account or ask administrator for your account setup.
</p>
</div>




<footer>
<p> Copyright 2018 </p>
</footer>
</body>
</html>