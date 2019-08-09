<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "UIIT";
// Create connection with DB
$conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn)
{die("Connection failed to DataBase: " . mysql_connect_error());}
?>