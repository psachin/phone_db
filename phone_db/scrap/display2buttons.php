<?php
/* Program name: displayTwoButtons.php
 * Description: Program displays a form with two
 *                buttons.
 */
?>
<html>
<head><title>Two Buttons</title></head>
<body>
<?php
echo "<form action='process2buttons.php' method='POST'>
   Last Name: <input type='text' name='last_name'
                             maxlength='50'><br>
         <input type='submit' name='display_button'
                value='Show Address'>
         <input type='submit' name='display_button'
                value='Show Phone Number'>
   </form>";
?>
</body></html>
