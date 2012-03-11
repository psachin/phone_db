<?php
 /* Program: New_member.php for /phone_db/
  * Desc:    Displays the new member welcome page. Greets
             member by name and gives user choice to enter
  *          restricted section or go back to main page.
  */

session_start();

if (@$_SESSION['auth'] != "yes")
  {
    header("Location: login.php");
    exit();
  }

include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die ("Couldn't connect to server.: from New_member.php");
$sql = "SELECT last_name, first_name FROM ph_member
          WHERE login_name='{$_SESSION['phlogname']}'";
$result = mysqli_query($cxn,$sql)
  or die("Couldn't execute query");

$num_row=mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result)
  or die("cannot fetch associative array");
extract($row);
/* echo "$num_row"; */
echo "<html>
        <head><title>New Member Welcome</title></head>
        <body>
          <h2 style='margin-top: .7in; text-align: center'>
	    Welcome $first_name $last_name</h2>\n";
?>

<p align='center'>
  Your new Member Account lets you enter the Members Only
  section of our web site. 
</p>

<div style='text-align: center'>
<p style='margin-top: .5in; font-weight: bold'>
  Glad you could join us!</p>
<form action='member_page.php' method='POST'>
  <input type='submit'
         value='Enter the Members Only Section'>
</form>

<form action='login.php' method='POST'>
  <input type='submit' value='Logout'>
</form>
</div>
</body>
</html> 

