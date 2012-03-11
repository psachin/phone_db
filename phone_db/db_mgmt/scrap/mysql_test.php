<HTML>
<HEAD>
<TITLE> PHP SQL Code Tester </TITLE>
<BODY>
<!-- mysql_test.php -->
<?php
$user="php";
$host="localhost";
$password="php";
mysql_connect($host,$user,$password);
mysql_select_db($database);
$result = stripSlashes($query) ;
$result = mysql_query($query);
?>
Results of query <B><?php echo($query); ?></B><HR>
<?php
if ($result == 0):
  echo("<B>Error " . mysql_errno() . ": " . mysql_error() . "</B>");
elseif (mysql_num_rows($result) == 0):
echo("<B>Query executed successfully!</B>");
else:
?>
<TABLE BORDER=1>
   <THEAD>
      <TR>
         <?php
   for ($i = 0; $i < mysql_num_rows($result); $i++) {
     echo("<TH>" . mysql_field_name($result,$i) . "</TH>");
   }
         ?>
      </TR>
   </THEAD>
   <TBODY>
      <?php
      for ($i = 0; $i < mysql_num_rows($result); $i++) {
	echo("<TR>");
	$row_array = mysql_fetch_row($result);
	for ($j = 0; $j < mysql_num_fields($result); $j++) {
	  echo("<TD>" . $row_array[$j] . "</TD>");
	}
	echo("</TR>");
      }
      ?>
   </TBODY>
</TABLE>
<?php
endif
?>
<HR><BR>
<FORM ACTION=query.php METHOD=POST>
   <INPUT TYPE=SUBMIT VALUE="New query">
</FORM>
</BODY>
</HTML>
