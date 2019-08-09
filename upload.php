<?php
include "db_connect.php";

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0 )
{
$fileName = $_FILES['userfile']['name'];
$tmpName = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$fp = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);

fclose($fp);

if(!get_magic_quotes_gpc())
{
$fileName = addslashes($fileName);
}

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

$conn->query($query) or die('Error, query failed');

echo "<br>File $fileName uploaded<br>";
}
?>

<html>
<body>

<form method="post" enctype="multipart/form-data">

<input type="hidden" name="MAX_FILE_SIZE" value="2000000">

<input name="userfile" type="file" id="userfile">

<input name="upload" type="submit" id="upload" value="Upload">

</form>

	
</body>
</html>