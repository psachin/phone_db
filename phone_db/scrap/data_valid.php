<?php
   /*
   data_validation
   */  

//   data_valid();

   data_valid2();

   function data_valid()
   {
   if ($_POST[first_name] == "")
   {
   echo "You did not enter your first name.
         First Name is required.<br>\n";
   exit();
   }
   elseif($_POST[mid_name] == "")
   {
   echo "You did not enter your mid name.
         Middle Name is required.<br>\n";
   exit();
   }
   elseif($_POST[last_name] == "")
   {
   echo "You did not enter your last name.
         Last Name is required.<br>\n";
   exit();
   }   
   elseif($_POST[mob] == "")
   {
   echo "You did not enter your Mobile no.
         Mobile is required.<br>\n";
   exit();
   }   
   elseif($_POST[landline] == "")
   {
   echo "You did not enter your Residential No.
         Residential No. is required.<br>\n";
   exit();
   }
   else
   echo " Welcome to the Members Only club.
	 You may select from the menu below.<br>\n";
   }
   
function data_valid2()
{
   foreach($_POST as $value)
{
   if ( $value == "" )
   {
   echo "Warning: One or more fields are empty !<br>\n";
   exit();
   }
}
echo "Welcome";

}

?>
