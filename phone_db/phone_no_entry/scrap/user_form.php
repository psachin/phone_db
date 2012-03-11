:<?php
   /* Script name: user_form.php
   * Description: Script displays all the information
   *                passed from a form.
   */
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
?>

<?php
include("misc.inc");
	
echo "<table align='center' width='30%' BORDER='0'>";
foreach($labels as $field => $label)
  {
    $good_data[$field]=strip_tags(trim($_POST[$field]));

    if($field == first_name or $field == mid_name or $field == last_name)
      {
	/* convert text to lower case */
	$good_data[$field] = strtolower($good_data[$field]);
      }
    
    echo "<tr>
          <td style='text-align: right'>
            $labels[$field] 
	  </td>
		<td>&nbsp&nbsp: </td>
          <td>
                   $good_data[$field]
	  </td>
        </tr>";
  }
    echo "<tr>
          	</tr>
      </table>";


$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die("cannot connect to mysql db");

$sql="SELECT * FROM phone_book
	WHERE mob='$_POST[mob]'";

$result = mysqli_query($cxn,$sql)
  or die("Couldn't execute select query.");

$num = mysqli_num_rows($result);

/* extract($row); */
/* echo "$num<br>"; */
if ($num > 0)
  {
    $sql = "SELECT * FROM phone_book
                    WHERE mob='$_POST[mob]'";
    $result = mysqli_query($cxn,$sql)
    or die("Couldn't execute select query."); 
    
    $message_new = "<h3 align='center'>$_POST[mob] already entered!</h3>";

  echo "<table align='center' BORDER='0'>
<tr>
<td>
    <form action='process_data.php' method='POST'>
     <input type='submit' value='back' name='ans'></form>
</td>
<td>
    <form action='insertdata.php' method='POST'>
         <input type='submit' value='update' name='ans'>
   </td> 
<td>
         <input type='submit' value='cancel' name='ans'></form>
</form>
   </td> 
</tr></table>";



    echo "<h4 align='center'>Matching entries</h4>
  
<table align='center'>
  <tr>
    <td>First Name&nbsp&nbsp&nbsp</td>
    <td>Middle Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    <td>Last Name&nbsp&nbsp&nbsp</td>
    <td>Mobile No.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td> 
    <td>Residential No.</td>
 
  </tr>
  <tr><td colspan='7'><hr></td></tr>";
    
    while($row = mysqli_fetch_assoc($result))
      {
	extract($row);
	echo "<tr>\n
           <td>$first_name</td>
           <td>$mid_name</td>
           <td>$last_name</td>
           <td>$mob</td>
           <td>$landline</td>
           </tr>";
	echo "<tr><td colspan='7'></td></tr>\n";
      }
  echo "</table>\n";
  echo("$message_new");


  }
else
  {
    
    echo "<table align='center' BORDER='0'>
<tr>
<td>
    <form action='process_data.php' method='POST'>
     <input type='submit' value='back' name='ans'></form>
</td>
<td>
    <form action='insertdata.php' method='POST'>
     <input type='submit' value='submit' name='ans'>
   </td> 
<td>

     <input type='submit' value='cancel' name='ans'></form>
   </td> 
</tr></table>";
  }
?>

<?php
require("../user/footer.php");
?>