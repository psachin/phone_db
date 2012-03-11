<?php
/* table for front_page of phone_db */
?>

<html>
<head>
<title>Phone database</title>
<link rel="stylesheet" type="text/css" href="style/styleLogin.css">
   </head>
   <body>
   
   <div id="header">
   <h1>Phone Database</h1>
   </div>
   
   <div id="main">
   <img src="images/tifr.jpg">   
   
   <div id="bar">
   <br><br>
   <p>Already a member?</p>
   <br>
   <p>Login</p>
   <form action="login.php" method="POST">
   <table align="center" border="0">

   <!-- 
      before passing data to login.php which inserts data to
      mysql_query, first check for data validation
   -->

   <?php
   if (isset($message))
     {
       echo 
       "<tr>
		 <td align='center' style='color: red'
                     colspan='2'>$message <br/>
		 </td>
		</tr>";
     }
   ?>
   <tr>
   <td class="bold_right">
   <div style="color:white">
   username:
   </td>
   <td>
   <input type="text" name="fuser"
   size="10" maxsize="25">
   </td>
   </tr>
   
   <tr>
   <td class="bold_right">
   <div style="color:white">
   password:
   </td>
   <td>
   <input type="password" name="fpasswd"
   size="10" maxsize="25">
   </td>
   <tr>
   </tr>
   <td align="center" colspan="3">
   <input type="submit" name="do" value="login">
   </td>
   </tr>
</table>
   </form>

   <br>
   <p>Not a member? </p>
   <a href="new_member.php"><b>Register</b></a>
   <p><blink>It`s free !</blink></p>
   </div>
   </div>
   
   <div id="footer">
   <h2>View all phone numbers</h2>
   <h3>Check out our <a href="../phone.php">Phone Catalog</h3>
   </div>


</body>
</html>
