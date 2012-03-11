<?php

   /* 
   check each field except middle name for
   blank fields 
   */

  if($field != "mid_name" && $field != landline)
   {
    if( $value == "" )
    {   
     $blank_array[] = $field;
    }
   }
      
?>
