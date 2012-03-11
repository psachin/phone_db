<?php
/* 
   db_mgmt/updatedata.php
   update data into db
*/
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
/*   require("../user/header.php") */
?>

<?php
include("misc.inc");

foreach($labels as $field => $label)
  {
    $good_data[$field]=strip_tags(trim($_POST[$field]));
    
    if($field == first_name or $field == mid_name or $field == last_name)
      {
	/* convert text to lower case */
	$good_data[$field] = strtolower($good_data[$field]);
      }
  }    
    /* echo "$good_data[first_name] "; */
    /* echo "$good_data[mid_name] "; */
    /* echo "$good_data[last_name] <br>"; */
    
    $cnx = mysqli_connect($host,$user,$passwd,$dbname)
      or die("could'nt connect to server");
    
$query="UPDATE phone_book SET 
first_name='$good_data[first_name]',
mid_name='$good_data[mid_name]',
last_name='$good_data[last_name]',
landline='$good_data[landline]'
WHERE
mob='$good_data[mob]'";

$result=mysqli_query($cnx,$query)
  or die("could'nt update data");

/* deals if landline=0 turns it into NULL */
$query2="UPDATE phone_book SET landline=NULL WHERE landline='0'";
$result=mysqli_query($cnx,$query2)
  or die("could'nt insert data");


if(mysqli_affected_rows($cxn) > 0)
  {
    echo "<h3 align='center'>Following data was successfully updated<br></h3>";
    
    echo "<table align='center' width='30%' BORDER='0'>";
    foreach($good_data as $field => $label)
      {
	
	echo "<tr>
          <td style='text-align: right'>
          $labels[$field] 
	  </td>
	  <td>
	  &nbsp&nbsp: 
	  </td>
          <td>
          $good_data[$field]
	  </td>
        </tr>";
      }
    echo " </table>";
    
    echo "<br>
<table align='center' BORDER='0'>
  <tr>
    <td>
      <form align='center' action='../phone_no_entry/display_form.php' method='POST'>
	<input type='submit' value='Insert another phone number' name='insert'>
      </form>
    </td>
  </tr>
</table>";
    
  }
else
  {
    echo "No record updated";
    exit();
  }
?>

<?php
require("../user/footer.php");
?>
