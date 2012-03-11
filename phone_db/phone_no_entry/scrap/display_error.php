<?php
   /*
   display error msg for 
   any blank or incorrect input value.
   */
if(@sizeof($blank_array) > 0) //blank fields are found
  {
    echo "<h2 align='center'>You didn't fill in one or more required
  fields. You must enter:</h2><br>";
    
    /* display list of missing information */
    echo "<table align='center' BORDER='0'>
  <tr>
    <td>";
    foreach($blank_array as $value)
      {
	echo "{$labels[$value]}, ";
      }
    echo "</td></tr></table>";
  }

if(@sizeof($bad_format) > 0) // incorrect fields are found !
  {
    echo "<h2 align='center'>following values filled seems to be incorrect:</h2><br>";
    
    /* display list of incorrect information */
    echo "<table align='center' BORDER='0'>
  <tr>
    <td>";
    foreach($bad_format as $value)
      {
	echo "{$labels[$value]}, ";
      }
    echo "</td></tr></table>";
  }
?>
