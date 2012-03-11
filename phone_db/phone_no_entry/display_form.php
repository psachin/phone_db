<?php
/* 
   Program name: displayForm Description: Script displays a form that
   asks for the customer phone number and other details.
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
echo "<h2 align='center' >Please enter your details below</h2><br><br><br>";
echo "<form action='process_data.php' method='POST'>
        <table align='center' cellspacing='0' cellpadding='2'>";

/* Loop that displays the form fields */
foreach($labels as $field => $label)
  {
    echo "<tr>
          <td style='text-align: right;
                     font-weight: bold'> 
	    $label
	  </td>
          <td>
	    <input type='text' name='$field' size='25'
                   maxlength='65' >
	  </td>
          </tr>";
  }

echo "<tr>
       <td colspan='2' style='text-align: center'>
            <input type='submit'
                   value='Submit'>";
echo "</td></tr></table>
        </form>";
?>
<?php
require("../user/footer.php");
?>
