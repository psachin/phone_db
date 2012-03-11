<html>
<title> Welcome to vector.darkplanet.org<title>
<head></head>

<body bgColor="#585858" VLINK="#ffffff"> 
<table  WIDTH="100%" 
	STYLE="height: 100%; " 
	BORDER="0" 
	CELLSPACING="0"
	CELLPADDING="0" 
	//SUMMARY="Array API"
>

<tr>
  <td Align=center> 
    <a href="images/freebsd.png"
       onMouseOver="document.logo.src='images/folder_linux.png' ; "
       onMouseOut="document.logo.src='images/folder_locked.png' ; " >
      <img height=128 width=128 name="logo" src="images/freebsd.png"
	   border=0 size=2></a><br><br>
    
  <td Align=center> <h1>Welcome to vector.darkplanet.org </td>
  <td> &nbsp </td>
</tr>

<tr>
  <td Align=center> <h3> Links </h3>
    <a href="serverlog.html">serverlog</a><br>
    <a href="./manual/index.html">httpd_manual</a><br>
    <a href="./phlak/index.htm">phlak</a><br>
    <a href="./Oreillybookshelf/index.html">Oreillybookshelf</a><br>
    <a href="./songs">songs</a><br>
    <a href="./movies">movies</a><br>
    <a href="./iso">iso</a><br>
  </td>
  <td  Align=center> <img height=67 width=564 name="logo"
      src="images/4-logo.png" border=0 size=1>
  </td>
  <td  Align=center>     
    <h3> Database: <br> </h3>
      <a href="./family_age.php">Family age</a><br>
      <a href="./pet.php">Pet Care</a>
  </td>
</tr>

<tr>
  <td colspan="3">
    <hr size=1 color=#000000> 
    <font size=2>
    Additional information: <br><br>
    ftp<br> 
    users : anonymous:none, sachin, root <br>
    telnet<br>
    users : sachin, root <br>
    ssh<br> 
    users : sachin, root<br>
    </font>
    
</tr>

<tr>
  <td colspan="3">
      <p><center><font size=2 p>Neither the author nor anyone
	    connected to or affiliated with this site, may be held
	    liable for loss or damage incurred by using code or
	    following advice presented within these pages.</font></p>

      <form action="sample.php" method="POST">
	<input type="submit" value="more info">
      </form>
</tr>

<tr>
  <td colspan="2">
  <?php
     $name="tasmanian_devil";
     echo "Maintained by:  $name";     
     ?>
  
  <td> 
       <?php
	  $today = date("l d, Y");
	  $time = date("h:i:s a");       
	  echo "$today <br>  $time";
	  ?>
</tr>


</table>
</body>
</html>
