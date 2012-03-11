<?php
session_start();  
if (@$_SESSION["auth"] != "yes" OR 
    @$_SESSION["phlogname"] == $login_name AND
    @$_SESSION["sessid"] == $PHPSESSIONID)
  {
    header("Location: ../login.php");
    exit();
  }
require("config.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML
4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<title><?php echo $config_sitename; ?></title>
<link href="stylesheet.css" rel="stylesheet">
  </head>
  <body>

  <div id="header">

  </div>

  <div id="menu">
  <a href="<?php echo $user_dir; ?>/index.php">Home</a>
  &bull;
<a href="<?php echo $user_dir; ?>/logout.php">Logout</a>
  &bull;
<a href="<?php echo $user_dir; ?>/about.php">About</a>
  &bull;
<a href="<?php echo $user_dir; ?>/faq.php">FAQ</a>
  &bull;
<a href="<?php echo $user_dir; ?>/tech.php">Technical
  Details</a>
  </div>

  <div id="container">
  
  <div id="bar_r">
  <?php  require("bar_r.php"); ?>
  </div>

  <div id="bar">
  <?php  require("bar.php"); ?>
  </div>
  
  <div id="main">
  

  
  
