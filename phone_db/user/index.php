<?php
       /* 
	  Desc:    Displays the new member welcome page. Greets
	  member by name and gives user choice to enter
	  restricted section or go back to main page.
       */
       
session_start();
/* if (@$_SESSION["auth"] != "yes" || @$_SESSION["phlogname"] == $login_name) */
if (@$_SESSION["auth"] != "yes" OR 
    @$_SESSION["phlogname"] == $login_name)
  {
    header("Location: ../login.php");
    exit();
  }
else
  {
    require("header.php");
  }
include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die ("Couldn't connect to server.: from New_member.php");
$sql = "SELECT last_name, first_name FROM ph_member
          WHERE login_name='{$_SESSION['phlogname']}'";
$result = mysqli_query($cxn,$sql)
  or die("Couldn't execute query");

$row = mysqli_fetch_assoc($result)
  or die("cannot fetch assoc array");
  
extract($row);

$query = "SELECT * FROM phone_book";
$result2 = mysqli_query($cxn,$query)
  or die("Couldn't execute query for result2");
$num_row=mysqli_num_rows($result2);
?>

<h1>Welcome <?php echo $first_name?></h1>
<p>
Welcome to vector.darkplanet.org !. Your new Member Account lets you enter the Members Only
section of our web site. You can add, update or delete exiting phone records. The database is 
shared by all the members, so any existing member can view/manage all the records. Be 
careful while deleting records, you might end up deleting other member`s record.
</p>


<p>Glad you could join us!</p>
<h2>Manage Database</h2>
<ul>
<li><a href="phone.php">View all phone numbers (<?php echo $num_row;?>).</a></li>
  <li><a href="../phone_no_entry/display_form.php">add/update phone number.</a></li>
  <li><a href="../db_mgmt/delete_data.php">delete phone number.</a></li>
  <li><a href="../db_mgmt/processform.php">search phone number.</a></li>
  </ul>
  
  <h2>Manage Album</h2>
<i>Now you can create your own personalized album.</i><br>
Request your admin for an account OR view album using password "guest".
<ul>
<li><a href="../gallery2/main.php">Gallery.</a></li>
</ul>
  <p>
  On this website, you can find a load of information about me
  and the different things I am interested in. You can also find
  out about my <i>future</i> project(s). As of now this site is 
  not fully developed but I am always trying to add new stuff. Hope
  users may find this site useful and any suggestion from your part 
  is most appreciated.
   </p>

  <?php
  require("footer.php");
?>
