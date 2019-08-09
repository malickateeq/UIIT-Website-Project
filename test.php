
<!DOCTYPE html>
<html>
<body>

<?php

$servername = "localhost" ;
$username = "root" ;
$password = "" ;
$db = "UIIT" ;

// 	Create connection with DB
$conn = mysqli_connect($servername, $username, $password, $db);
// 	Check connection
if (!$conn)
{die("Connection failed: " . mysql_connect_error());}
//	echo "Conncted successfully" ;
// 	To close the connection $conn->close(); OR mysqli_close($conn);
// 	To create Database
//	$sql = "CREATE DATABASE UIIT" ; 
//	if ($conn->query($sql) == TRUE) {
//	echo "Database created successfully";
//	}
//	else
//	echo "DB Creation failed";
//	INSERT VALUES

//	$sql = "INSERT INTO login (email,password,role)
//	VALUES (ateeq@uiit.com,123,student)";
//	$conn->query($sql);

// SELECT values
$sql = "SELECT * FROM login";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row

    while($row = $result->fetch_assoc()) 
{

        echo "Email: " . $row["email"]. " - Password: " . $row["password"]. " Role: " . $row["role"]. "<br>";
    }
} else {
    echo "0 results";
}

?>

</body>
</html>