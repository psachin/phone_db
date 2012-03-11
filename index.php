<html>
<title> Welcome to vector.darkplanet.org<title>
<head> 
  <style type="text/css">
    <!--
	a:link, a:visited, a:active
	{text-decoration: none} to get rid of
	underlined link
      -->
  </style>
</head>

<!--
<frameset cols="10%,50%">
  <frame src="index.php">
  <frame src="serverlog.html">
</frameset>
-->

<body bgColor="#585858" LINK="#949494" VLINK="#ffffff" ALINK="#00CCFF"> 
<table  
   WIDTH="90%" 
   HEIGHT="100%" 
   BORDER="0" 
   CELLSPACING="0"
   CELLPADDING="0" 
   SUMMARY="Array API"
   ALIGN="center"
>

<tr Align="center" height="15%">
  <td width=15%> &nbsp </td>  
  <td width=70%> <h1>Welcome to vector.darkplanet.org </td>
  <td width=20%> &nbsp </td>
</tr>

<tr height=70%>
  <td Align=left> <h3> Links </h3>
    <a href="serverlog.html">serverlog</a><br>
    <a href="./manual/index.html">httpd_manual</a><br>
    <a href="./phlak/index.htm">phlak</a><br>
    <a href="./Oreillybookshelf/index.html">Oreillybookshelf</a><br>
    <a href="./songs">songs</a><br>
    <a href="./movies">movies</a><br>
    <a href="./iso">iso</a><br>
    <a href="/usr/local/bin/nagios-install/share/index.html">nagios</a><br>
  </td>
  <td  Align=center> 
    <a href="freebsd/freeBSD8-1.html" alt="free-bsd-logo"
       onMouseOver="document.logo.src='images/folder_linux.png' "
       onMouseOut="document.logo.src='images/folder_locked.png' ; " >
      <img height=128 width=128 name="logo" src="images/freebsd.png" border=0 size=2></a><br><br><br>
    <img height=67 width=564 name="logo" src="./images/4-logo.png" border=0 size=1>
  </td>

  <td  Align=LEFT>     
    <h3> Database <br> </h3>
<!---
    <form >
      <select NAME="Tables from my databases">
	<option "family_pet">family_age
	<option "pet">pet
	<option "other">other
      </select>
      <P><INPUT TYPE="SUBMIT" NAME="pet" VALUE="Submit"></P>
    </form>
--->
<MARQUEE onmouseover=stop(); onmouseout=start(); 
         scrollAmount=2 scrollDelay=1
         direction=up 
         height=200
	 width=200><!-- events code -->
  <P class=events><B>Family Age</B> 
    View family member age...<BR>
    <a href="./family_age.php">Family age</a> </P>
  <P class=events><B>Pet Care </B>
    View Pet database...<BR>
    <a href="./pet.php">Pet Care</a></P>
  <P class=events><B>Member Login</B>
    Become a member...<BR>
    <a href="./members/front_members.php">Member login</a></P>
  <P class=events><B>Phone Number database</B>
    add phone numbers and more...<BR>
    <a href="./phone_db/login.php">Phone number Database</a></P>
  </P><!-- events code -->
</MARQUEE>

  </td>
</tr>

<tr height=10% align="center"> 
  <td colspan="3">
    <form action="info.php" method="POST">
      <input type="submit" value="more info">
    </form>      

  </td>
</tr>

<tr Align="center" height="10%">
  <td>
  <?php
     $name="tasmanian_devil";
     echo "<font size=1>Maintainer:  $name</font>";     
     ?>
  </td>
  <td>
    <p><font size=1.8 p>Neither the author nor anyone
	  connected to or affiliated with this site, may be held
	  liable for loss or damage incurred by using code or
	  following advice presented within these pages.
    </font></p>    
  </td>
  <td> 
       <?php
	  $today = date("l d, Y");
	  $time = date("h:i:s a");       
	  echo "<font size=1>$today <br>  $time</font>";
	  ?>
  </td>
</tr>

</table>
</body>
</html>
