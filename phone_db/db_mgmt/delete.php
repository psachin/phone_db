<?php
/* delete.php */
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
else 
  require("../user/header.php");
?>

<?php
if(current($_POST[name]) == "yes")
  {
    include("misc.inc");
    $cxn = mysqli_connect($host,$user,$passwd,$dbname)
      or die("cannot connect to mysql db");

    foreach($_SESSION[interest] as $mob => $value)
      {
	$query="DELETE FROM phone_book WHERE mob='$mob'";
	$result=mysqli_query($cxn,$query)
	  or die("could not delete data");
      }
    
    if(mysqli_affected_rows($cxn) > 0)
      {
	echo"DATA DELETED !";
	echo"<br><a href='delete_data.php'>GO BACK</a>";
      }
  }
else
  {
    echo " NO DATA DELETED";
    echo"<br><a href='delete_data.php'>GO BACK</a>";
  }

?>

<?php
require("../user/footer.php");
?>