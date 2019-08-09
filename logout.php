<?php

session_start();
if (isset($_SESSION['logged_in'])) {
unset($_SESSION['logged_in']);
}

// go to login page

header('Location: UIIT_login.php');


?>