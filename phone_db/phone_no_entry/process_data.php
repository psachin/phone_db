<?php
/*
  Program name: process_data.php
  Description: Program checks all the form fields for
  blank fields.
*/
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
else 
  require("../user/header.php");
?>
<?php
/* setup array */
include ("array.php");  
/* check for blank $fields */
foreach($_POST as $field => $value)
  {
    if ($field != "mid_name" and $field != "landline")
      {
	if ($value == "")
	  {
	    $blanks[] = $field;
	  }
      }
  }
/* if(isset($blanks)) CODE */
/* check for input pattern */
foreach($_POST as $field => $value)
  {
    if(!empty($value))
      {
	if($field == "first_name" or $field == "mid_name" or $field == "last_name") 
	  {
	    if (!ereg("^[A-Za-z' -]{1,50}$",$value))
	      {
		$errors[]=$field;
	      }
	  }
	if($field == "mob")
	  {
	    if(!ereg("^[0-9)xX( -]{6,10}$",$value))
	      {
		$errors[] = $field;
	      }
	  }
	if($field == "landline")
	  {
	    if(!ereg("^[0-9)xX( -]{6,20}$",$value))
	      {
		$errors[] = $field;
	      }
	  }
      } // end if empty
  } // end foreach
/* if(@is_array($errors)) CODE */
/* test for zero */
foreach($_POST as $field => $value)
  {
    if($field == first_name || $field == last_name || $field == mob)
      {
	if ($value == "0")
	  {
	    $zero[] = $field;
	  }
      }
  }
$size_zero=sizeof($zero);

include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die("cannot connect to mysql db");
$sql="SELECT * FROM phone_book
  	WHERE mob='$_POST[mob]'";
$result=mysqli_query($cxn,$sql)
  or die("Couldn't execute search query.");
$num=mysqli_num_rows($result);



if(@sizeof($blanks) > 0 || @sizeof($errors) > 0 || $num > 0 || $size_zero > 0) 
  {
    /* redisplay form */ 
    if (@sizeof($blanks) > 0)
      {
	echo "<h2 align='center'>following fields are missing:</h2>";
	
	/* display list of missing information */
	echo "<table align='center' BORDER='0'>
  	<tr>
	    <td>";
	foreach($blanks as $value)
	  {
	    echo "$labels[$value], ";
	  }
	echo "</td></tr></table><br>";
      }
    if(@sizeof($errors) > 0)
      {
	echo "<h2 align='center'>following values filled seems to be incorrect:</h2>";
	/* display list of incorrect information */
	echo "<table align='center' BORDER='0'>
	  <tr>		
	    <td>";
	foreach($errors as $value)
	  {
	    echo "{$labels[$value]}, ";
	  }
	echo "</td></tr></table><br>";
      }
    if($size_zero > 0)
      {
	echo "<h2 align='center'>following values are zero. You can left it BLANK.</h2>";
	/* display list of zero fields */
	echo "<table align='center' BORDER='0'>
	  <tr>		
	    <td>";
	foreach($zero as $value)
	  {
	    echo "{$labels[$value]}, ";
	  }
	echo "</td></tr></table><br>";
      }
    if($num > 0)
      {
	echo "<h3 align='center'>Matching entries for :</h3>";
	echo "<h4 align='center'>Mobile : $_POST[mob] </h4>

<table align='center'>
  <tr>
    <th>First Name&nbsp&nbsp&nbsp</th>
    <th>Middle Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
    <th>Last Name&nbsp&nbsp&nbsp</th>
    <th>Mobile No.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th> 
    <th>Residential No.</th>
  </tr>";
    
	while($row = mysqli_fetch_assoc($result))
	  {
	    extract($row);
	    echo "<tr>\n
           <td>$first_name</td>
           <td>$mid_name</td>
           <td>$last_name</td>
           <td>$mob</td>
           <td>$landline</td>
           </tr>";
	    echo "<tr><td colspan='7'></td></tr>\n";
	  }
    echo "</table><br>";
      
      }

    if($num > 0)
      {
	$button="update";
	$path="../db_mgmt/updatephone.php";
	include("display_form.inc");
      }
    else
      {
	$button="submit";
	$path="$_SERVER[PHP_SELF]";
	include("display_form.inc");
      }

/*     if($num > 0) */
/*       { */
/* 	echo " */
/*   <form action='../db_mgmt/updatephone.php' METHOD='POST'> */
/*     <table align='center'> */
/*        <tr> */
/*        <td colspan='2'><b>Would you like to update ?</b></td> */
/*        </tr> */
/*        <tr align='center'> */
/*        <td><input type='button' name='yes' value='yes'></td> */
/*        <td><input type='button' name='no' value='no'></td> */
/*        </tr> */
/*        </table> */
/* </form>"; */
/*       } */



  }
else
  {
    /* DATA CLEAN and ready to be inserted */
    include("insertdata.php");
  }
?>
<?php
require("../user/footer.php");


/* if(isset($blanks)) */
/*   { */
/*     $message_new = "The following fields are blank. */
/*          Please enter the required information: "; */
/*     foreach($blanks as $value) */
/*       { */
/*         $message_new .= "$value, "; */
/*       } */
/*   } */


/* if(@is_array($errors)) */
/*   { */
/*     $message_new = ""; */
/*     foreach($errors as $value) */
/*       { */
/* 	$message_new .= $value." Please try */
/*                                    again<br />"; */
/*       } */
/*   } */

?>