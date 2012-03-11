<?php
/* 
   Program: delete_data.php
*/
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
include("array.php");
include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die("cannot connect to mysql db");

if(@sizeof($_POST[interest]) > 0)
  {
    $_SESSION['interest']=$_POST[interest];
    foreach($_POST[interest] as $mob)
      {
	//	echo "$mob<br>";
	foreach($labels as $field => $value)
	  {
	    $query="SELECT * FROM phone_book WHERE
			mob='$mob'";
	    $result=mysqli_query($cxn,$query)
	      or die("cannot execute query");
	    
	    while($row=mysqli_fetch_assoc($result))
	      {
		extract($row);
		echo"
		<table width='30%' BORDER='0' BGcolor='#eee'>
		<tr>
		<td width='50%'>$labels[$field]</td>
		<td width='1%'> : </td>
		<td align='left'>${$field}</td>
		</tr>
		</table>
		";
	      }
	  }
	echo "<br>";
      }

    
    echo "
<form action=delete.php METHOD='POST'>
<table align='center'>
<tr>
<th colspan='2'>confirm delete ?</th>
</tr>
<tr align='center'>
<td><input type='submit' name=name[yes] value=yes></td>
<td><input type='submit' name=name[no] value=no></td>
</tr>
</table>
</form>
";

  }
else
  {
  echo "<i>No record(s) where selected !</i><br>";
  echo"<a href='delete_data.php'>GO BACK</a>";
  }


?>

<?php
require("../user/footer.php");
?>