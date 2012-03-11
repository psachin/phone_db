<?php
/* 
   Program: phone.php
   Desc:    Displays all phone numbers with additional info 
 */
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
/* else */
/*   require("../user/header.php"); */
?>

<?php
include("array.php");
echo "<h1 align='center'>Phone database on vector.darkplanet.org</h1><br>";
echo "
<form action='processform.php' method='POST'>
<table align='center' BORDER='0'>
<tr>
<td align='center' colspan='3'><h2>Search the database</h2></td>";
/*  Loop that displays the form fields */
foreach($labels as $field => $label)
  {
   echo "<tr>
          <td style='text-align: left;'> 
	    by $label
	  </td>
    <td> : </td>  
    <td>
	    <input type='text' name='$field' size='25'
                   maxlength='65' >
	  </td>
          </tr>";
  }

echo "<tr>
       <td colspan='3' align='center'>
            <input type='submit' value='Search'>
       </td>
     </tr>
</table>
</form>";

?>
<?php
   require("../user/footer.php");
?>
