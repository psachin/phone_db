<?php
session_start();
session_destroy();
unset($_SESSION["sessid"]);
unset($_SESSION);
$_SESSION=array();
require("config.php");
header("Location:../login.php");
?>