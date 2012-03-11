<?php
/* 
   Program: phone.php
   Desc:    Displays all phone numbers with additional info 
 */
session_start();
if (@$_SESSION["auth"] != "yes" OR 
    @$_SESSION["phlogname"] == $login_name AND
    @$_SESSION["sessid"] == $PHPSESSIONID)
  {
    header("Location: ../login.php");
    exit();
  }
else 
  require("header.php");
?>

<?php
include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die ("couldn't connect to server: database is --> sachin");

$query = "SELECT * FROM phone_book ORDER BY first_name";

$result = mysqli_query($cxn,$query)
  or die ("Couldn't execute query.");
$num=mysqli_num_rows($result);
  /*  ----------------------------------------------------------------------------------------------------- */ 
  /* Display results in a table */
  echo "<h1 align='center'>Phone database on vector.darkplanet.org</h1>
  <h3 align='center'>total ($num) records </h3>
<table cellspacing='4' celpadding='20' align='center'>
  <tr>
    <th></th>
    <th>First name&nbsp&nbsp&nbsp&nbsp</th>
    <th>Middle name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
    <th>Last name&nbsp&nbsp&nbsp&nbsp</th>
    <th>Mobile No.&nbsp&nbsp&nbsp&nbsp&nbsp</th>
    <th>Residential phone.&nbsp&nbsp&nbsp&nbsp</th>
  </tr>";
$count=0;
while($row = mysqli_fetch_assoc($result))
  {
    $count=++$count;
    extract($row);
    echo "<tr>\n
	   <th>$count&nbsp</th>
           <td>$first_name</td>
           <td>$mid_name</td>
           <td>$last_name</td>
           <td>$mob</td>
           <td>$landline</td>
           </tr>\n";
  }
echo "</table>\n";

?>
<?php
require("footer.php")
?>
