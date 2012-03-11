<?php

/* check names for invalid formats. */
   if($field == "first_name" or $field == "mid_name"
        or $field == "last_name" )
{
    if (!ereg("^[A-Za-z' -]{0,50}$",$_POST[$field]) )
    {
         $bad_format[] = $field;
    }
}

?>
