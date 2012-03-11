<?php
/* File: new_member.inc
   display member registration form
*/
?>

<html>
  <head>
    <title>Members Only Login</title>
    <style type="text/css">
   <!--
       .bold_right {font-weight: bold; text-align: right;}
       .gray_banner { font-weight: bold; color: white;
       background-color: gray;
       text-align: center; font-size: 3em;}
       .bold_large {font-size: 1.1em; font-weight: bold;}
     -->
    </style>
    </head>
    <body style="margin: 0">
   <table 
   valign="bottom"
   align="center"
   height="90%"
   width="80%"   
   border="0" 
   cellpadding="5" 
   cellspacing="0">
   
      <tr>
	<td colspan="3" BGcolor="black" class="gray_banner">
	  New Members Registration on Phone-db
	</td>
      </tr>

      
      <td 
	 style="width: 100%"
	 align="center"
	 valign="top">
   
   <p>
   <span class="bold_large">Please fill up the detail to access main page.
   </span>

	</p>
	
	<!-- form for new member to fill in -->
	<form action="new_member.php" method="POST">
	  <table border="0" width="100%">
   
   <?php
   if (isset($message_new))
     {
       echo 
       "<tr>
	       <td style='color: red;
			  font-weight: bold' colspan='2'>
                 <p>$message_new</p>
	       </td>
	      </tr>";
     }
   ?>
   
   <tr>
     <td class="bold_right">Login name</td>
     <td>
       <input type="text" name="login_name"
	      value="<?php echo @$login_name ?>"
	      size="20" maxlength="20">
     </td>
   </tr>
   
   <tr>
     <td class="bold_right">Password</td>
     <td>
       <input type="password" name="password"
	      value="<?php echo @$password ?>"
	      size="20" maxlength="20">
     </td>
   </tr>
   
   <tr>
     <td class="bold_right">First Name</td>
     <td><input type="text" name="first_name"
		value="<?php echo @$first_name ?>"
		size="40" maxlength="40">
     </td>
   </tr>
   
   <tr>
     <td class="bold_right">Last Name</td>
     <td>
       <input type="text" name="last_name"
	      value="<?php echo @$last_name ?>"
	      size="40" maxlength="40">
     </td>
   </tr>
   
   <tr>
     <td class="bold_right">Email Address</td>
     <td><input type="text" name="email"
		value="<?php echo @$email ?>"
		size="55" maxlength="67">
     </td>
   </tr>
   <input type="hidden" name="do" value="new">
   <tr>
     <td>&nbsp;</td>
     <td>
       <BR>
       <input type="submit" value="Become a Member">
     </td>
   </tr>
          </table>
        </form>
      </td>
</tr>

<tr><td colspan="3"
            style="background-color: gray">&nbsp;</td></tr>
</table>
<div style="text-align: center; font-size: .8em">
  All comments and suggestions are appreciated. Please send comments
  to <a href="mailto:sachin@vector.darkplanet.org">
    sachin@vector.darkplanet.org</a>
  </div>

</body>
</html>
