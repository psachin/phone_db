<?php
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
?>

<?php
    echo "<form align='center'
	    action='$path' method='POST'>
      <table align='center' BORDER='0'>";
    foreach($labels as $field => $label)
      {
	$good_data[$field]=strip_tags(trim($_POST[$field]));
	echo "<tr>
          <td style='text-align: right;
                     font-weight: bold'>
            {$labels[$field]}
	  </td>
          <td>
	    <input type='text' name='$field'
                   size='25' maxlength='65'
                   value='$good_data[$field]'>
	  </td>
        </tr>";
      }
    echo "<tr>
          <td colspan='2' style='text-align: center'>
	    <input type='submit' value='$button'>
	  </td>
	</tr>
      </table>
    </form>";
?>