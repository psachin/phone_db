<?php
/* 
  ../phone_db/new_member.php
*/
session_start();
include("misc.inc");

switch(@$_POST["do"])
  {
  case "new":
    
   /* Check for blanks */
   
    foreach($_POST as $field => $value)
      {
	
	if ($value == "")
	  {
	    $blanks[] = $field;
	  }
       
      }
   
   if(isset($blanks))
  {
    $message_new = "The following fields are blank.
         Please enter the required information: ";
    foreach($blanks as $value)
      {
        $message_new .= "$value, ";
      }
    extract($_POST);
    include("new_member.inc");
    exit();
  }
   
   /* Validate data */
   
   foreach($_POST as $field => $value)
     {
       
       if(!empty($value))
	 {
	   if(eregi("name",$field) and
	      !eregi("login",$field))
	     {
	       if (!ereg("^[A-Za-z' -]{1,50}$",$value))
		 {
		   $errors[]="$value is not a valid name.";
		 }
	     }
	   
	   if(eregi("street",$field) or
	      eregi("addr",$field) or eregi("city",$field))
	     {
	       if(!ereg("^[A-Za-z0-9.,' -]{1,50}$",$value))
		 {
		   $errors[] = "$value is not a valid
                          address or city.";
		 }
	     }
	   if(eregi("state",$field))
	     {
	       if(!ereg("[A-Za-z]{2}",$value))
		 {
		   $errors[]="$value is not a valid state.";
		 }
	     }
	   if(eregi("email",$field))
	     {
	       if(!ereg("^.+@.+\\..+$",$value))
		 {
		   $errors[] = "$value is not a valid
                         email address.";
		 }
	     }
	   if(eregi("zip",$field))
	     {
	       if(!ereg("^[0-9]{5,5}(\-[0-9]{4,4})?$",
			$value))
		 {
		   $errors[]="$value is not a valid
                       zipcode.";
		 }
	     }
	   if(eregi("phone",$field)
	      or eregi("fax",$field))
	     {
	       if(!ereg("^[0-9)(xX -]{7,20}$",$value))
		 {
		   $errors[] = "$value is not a valid
                         phone number. ";
		 }
	     }
	   
	 } // end if empty
     } // end foreach
   
   if(@is_array($errors))
     {
       $message_new = "";
       foreach($errors as $value)
	 {
	   $message_new .= $value." Please try
                                   again<br />";
	 }
       extract($_POST);
       include("new_member.inc");
       exit();
     }
   /* clean data */
   $cxn = mysqli_connect($host,$user,$passwd,$dbname);
   
   foreach($_POST as $field => $value)
     {
       if($field != "Button" and $field != "do")
	 {
           if($field == "password")
	     {
	       $password = strip_tags(trim($value));
	     }
           else
	     {
	       $fields[]=$field;
	       $value = strip_tags(trim($value));
	       $values[] =
		 mysqli_real_escape_string($cxn,$value);
	       $$field = $value;
	     }
	 }
     }
   /* check whether user name already exists */
   $sql = "SELECT login_name FROM ph_member
                    WHERE login_name = '$login_name'"; 
   $result = mysqli_query($cxn,$sql)
     or die("Couldn't execute select query.");
   
   $num = mysqli_num_rows($result);
   
   if ($num > 0)
     {
       $message_new = "$login_name already used.
                         Select another User Name.";
       include("new_member.inc");
       exit();
     }
   /* Add new member to database */
   
   else
     {
       
       $today = date("Y-m-d"); 
       $cxn = mysqli_connect($host,$user,$passwd,$dbname);

       $md5_passwd=md5($password);
       $sql="INSERT INTO ph_member
(login_name,create_date,passwd,last_name,first_name,email)
VALUES 
('$login_name','$today','$md5_passwd','$last_name','$first_name','$email')";
       
       $result = mysqli_query($cxn,$sql)
       or die("Couldn't execute insert query. $cnx,$sql");

/*        $fields_str = implode(",",$fields); */
/*        $values_str = implode('","',$values); */
/*        $fields_str .=",create_date"; */
/*        $values_str .='"'.",".'"'.$today; */
/*        $fields_str .=",passwd"; */
/*        $values_str .= '"'.","."md5"."('".$password."')"; */
/*        $sql = "INSERT INTO ph_member "; */
/*        $sql .= "(".$fields_str.")"; */
/*        $sql .= " VALUES "; */
/*        $sql .= "(".'"'.$values_str.")"; */
/*        $result = mysqli_query($cxn,$sql) */
/* 	 or die("Couldn't execute insert query. $cnx,$sql"); */
       
        $_SESSION["auth"]="yes"; 
       
        $_SESSION["phlogname"] = $login_name; 
       
       /* send email to new member 
	  $emess = "A new member Account has been set up. ";
	  $emess.= "Your new member ID and password are: ";
	  $emess.= "\n\n\t$login_name\n\t$password\n\n";
	  $emess.="We appreciate your interest in Pet";
	  $emess.= " Store at PetStore.com. \n\n";
	  $emess.= "If you have any questions or problems,";
	  $emess.= " email webmaster@petstore.com";
	  $ehead="From: member-desk@petstore.com\r\n"; 
	  $subj = "Your new member Account from Pet Store";
	  $mailsnd=mail("$email","$subj","$emess","$ehead");
       */
       
       header("Location: user/index.php");
     }
    break;
      
  default:
    include ("new_member.inc");
    
  }

?>