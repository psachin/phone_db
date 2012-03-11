<?php
/* 
   Program: processform.php
   search the record
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
/* heading */
echo "<h1 align='center'>Search record(s)</h1><br>";
/* setup array */
include("array.php");
/* check for blank $fields */
foreach($_POST as $field => $value)
  {
    if ($value == "")
      {
	$blanks[] = $field;
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
	    if(!ereg("^[0-9)xX( -]{1,10}$",$value))
	      {
		$errors[] = $field;
	      }
	  }
	if($field == "landline")
	  {
	    if(!ereg("^[0-9)xX( -]{1,20}$",$value))
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
    if ($value == "0")
      {
	$zero[] = $field;
      }
    
  }
$size_zero=sizeof($zero);

include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die("cannot connect to mysql db");
$sql="SELECT * FROM phone_book 
	WHERE first_name REGEXP '^$_POST[first_name]'
	UNION
	SELECT * FROM phone_book
	WHERE last_name REGEXP '^$_POST[last_name]'
	UNION
	SELECT * FROM phone_book
	WHERE mid_name REGEXP '^$_POST[mid_name]'
	UNION
	SELECT * FROM phone_book
	WHERE mob LIKE '$_POST[mob]'
	UNION
	SELECT * FROM phone_book
	WHERE landline LIKE '$_POST[landline]'";

$result=mysqli_query($cxn,$sql)
   or die("Couldn't execute search query.");
$num=mysqli_num_rows($result);


/* if(@sizeof($blanks) > 0 || @sizeof($errors) > 0 || $size_zero > 0) */
/*   { */
    /* redisplay form */ 
/*     if (@sizeof($blanks) > 0) */
/*       { */
/* 	echo "<h2 align='center'>following fields are missing:</h2>"; */
	
/* 	/\* display list of missing information *\/ */
/* 	echo "<table align='center' BORDER='0'> */
/*   	<tr> */
/* 	    <td>"; */
/* 	foreach($blanks as $value) */
/* 	  { */
/* 	    echo "$labels[$value], "; */
/* 	  } */
/* 	echo "</td></tr></table><br>"; */
/*       } */
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


/* redisplay form */
    echo "<h3 align='center'>Please enter the details.</h3>";
    echo "<form action='$_SERVER[PHP_SELF]' method='POST'>
    <table align='center'>";
    foreach($labels as $field=>$label)
    {
      $good_data[$field] = strip_tags(trim($_POST[$field]));
      echo "<tr>
      <td style='text-align: right; font-weight: bold'>
				      {$labels[$field]}</td>
            <td><input type='text' name='$field' size='25'
                maxlength='50' value='$_POST[$field]'></td>
							   </tr>";
    }
    echo "<tr>
    <td colspan='2' style='text-align: center'>
    <input type='submit' value='search'>";
    echo "</td></tr></table>
    </form>";

if(sizeof($blanks) < 5 AND sizeof($blanks) != 0)/* if all fields are blank, don't show results */
  {
    echo "<h3 align='center'>Similar entry(s) : $num</h3>";
    echo "

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
    
    
    
   
  
?>
<?php
require("../user/footer.php");
?>