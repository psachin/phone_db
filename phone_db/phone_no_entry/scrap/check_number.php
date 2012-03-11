<?php
   /* 
   check phone for invalid format. 
   */

if ($field == "mob" || $field == "landline")
{
  if(!ereg("^[0-9)( -]{0,20}(([xX]|(ext)|(ex))?[ -]?[0-9]{1,7})?$",$value))
  {
       $bad_format[] = $field;
  }
}
?>
