<?php
/* table for front_page of phone_db */
?>

<html>
<head>
<style type="text/css">
<title>Phone database</title>
</style>
</head>
<body>
<table 
   height="100%" 
   width="100%" 
   border="0"
   celpadding="0"
   celspacing="0">
  <tr>

   <!--
   <td 
   align="center"
   height="10%" 
   width="100%" 
   colspan="2">
   <h1>vector.darkplanet.org</h1>
   </td>
   -->

  </tr>
  <tr height="">
    <td
   valign="bottom"
   align="center"
   height="8%" 
   width="80%">
   <h4>Phone Database</h4>
   </td>
    <td>&nbsp<td>
  </tr>
  <tr>
   
   <td align="center">


	<img src="./images/tifr.jpg"
	     alt="tifr"
	     height="550" width="750">
   
   </td>


    <td align="center" style="background-color: black">
     <div style="color:white ; link:white ">
   Already a member
       <p style="text-align: center; font-size: 15pt">
	 <b>Login <br></b></p>

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
   
   <tr>
   <td colspan="2" align="center">
   <br>
   <p style="color:white">
   Not a member? </p>
   <a href="new_member.php" style="color:white"><b>Register</b></a>
   <p style="color:white"><blink>It's free !</blink></p>
   </td>
   </tr>
   
</table>
   </form>
   
   
   
   <td>
   
   
   </tr>
   <tr>
   <td 
   valign="top"
   align="center"
   height="10%" 
   width="">
   <p><h3>View all phone numbers</h3>
   Check out our  <a href="../phone.php">Phone Catalog.</a>
   </td>
   <td>&nbsp</td>
   </tr>
   
  <table>
</body>
</html>
