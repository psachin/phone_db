<?php
/* FUNCTION: display_table() */
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
?>

<?php
display_table();		/* call function */
function display_table()	/* actual function */
{
  include("array.php");
    echo "<form action='$_SERVER[PHP_SELF]' method='POST'>
      <table align='center' BORDER='0'>
<tr>
<td align='center' colspan='3'><h2>Search the database</h2></td>
</tr>";
    foreach($labels as $field => $label)
      {
	$good_data[$field]=strip_tags(trim($_POST[$field]));
	echo "<tr>
          <td style='text-align: left;'>
            by {$labels[$field]}
	  </td>
    	  <td> : </td>  
          <td>
	    <input type='text' name='$field'
                   size='25' maxlength='65'
                   value='$good_data[$field]'>
	  </td>
        </tr>";
      }
    echo "<tr>
          <td colspan='3' style='text-align: center'>
	    <input type='submit' value='Search'>
	  </td>
	</tr>
      </table>
    </form>";
}

?>