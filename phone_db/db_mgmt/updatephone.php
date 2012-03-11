<?php
/* Program name: updatephone.php
 * Description: Program checks the phone number for incorrect format. Updates
 *                 the phone number in the database for the specified mobile number.
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
    if ($value == "0")
      {
	$zero[] = $field;
      }
    
  }
$size_zero=sizeof($zero);

include("misc.inc");
$cxn = mysqli_connect($host,$user,$passwd,$dbname)
  or die("cannot connect to mysql db");
$sql="SELECT * from phone_book WHERE mob='$_POST[mob]'";

$sql1="SELECT first_name,mid_name,last_name,landline from phone_book
	WHERE mob='$_POST[mob]'
	UNION
	SELECT first_name,mid_name,last_name,landline from phone_book
   	WHERE first_name='$_POST[first_name]'
	AND last_name='$_POST[last_name]'
	AND mid_name='$_POST[mid_name]'
	AND mob='$_POST[mob]'
	AND landline='$_POST[landline]'";

$sql2="SELECT mob FROM phone_book
  	WHERE first_name='$_POST[first_name]'
	AND last_name='$_POST[last_name]'
	AND mid_name='$_POST[mid_name]'
	AND mob='$_POST[mob]'
	AND landline='$_POST[landline]'
	UNION
	SELECT mob from phone_book
	WHERE mob='$_POST[mob]'";


$result=mysqli_query($cxn,$sql)
  or die("Couldn't execute search query.");
$result1=mysqli_query($cxn,$sql1)
  or die("Couldn't execute search query1.");
$result2=mysqli_query($cxn,$sql2)
  or die("Couldn't execute search query2.");

$num=mysqli_num_rows($result);
$num1=mysqli_num_rows($result1);
$num2=mysqli_num_rows($result2);



if(@sizeof($blanks) > 0 || @sizeof($errors) > 0 || $size_zero > 0) 
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
	echo "<h3 align='center'>Similar entry(s) :</h3>";
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
    
    
    /* redisplay form */
    echo "<h3 align='center'>Please enter new data below.</h3>";
    echo "<form action='updatephone.php' method='POST'>
    <table align='center'>";
    foreach($labels as $field=>$label)
    {
      $good_data[$field] = strip_tags(trim($_POST[$field]));
      echo "<tr>
      <td style='text-align: right; font-weight: bold'>
				      {$labels[$field]}</td>
            <td><input type='text' name='$field' size='25'
                maxlength='65' value='$_POST[$field]'></td>
							   </tr>";
    }
    echo "<tr>
    <td colspan='2' style='text-align: center'>
    <input type='submit' value='Update'>";
    echo "</td></tr></table>
    </form>";
    exit();
  }

elseif($num1 > 0 and $num2 > 0)
  {
    include("updatedata.php");
    exit();
  }
else
  {
    echo "<h3>Mobile number changed please add as a new entry!</h3> ";
    echo "<a href='../phone_no_entry/display_form.php'><h2>BACK</h2><a>";
    exit();
  }

/*     $good_data['phone'] = strip_tags(trim($_POST['phone'])); */
/*     $good_data['phone'] = ereg_replace('[)( .-]','',$good_data['phone']); */
/*     include("misc.inc"); */
/*     $cxn = mysqli_connect($host,$user,$password,$database) */
/*       or die ("Couldn't connect to server"); */
/*      $query = "UPDATE Phone SET phone='$good_data[phone]' */
/*                       WHERE lastName='$_POST[last_name]' */
/*        AND firstName='$_POST[first_name]'"; */
/*      $result = mysqli_query($cxn,$query) */
/*        or die ("Couldnt execute query "); */
/*      if(mysqli_affected_rows($cxn) > 0) */
/*        { */
/* 	 echo "<h3> The phone number for {$_POST['first_name']} */
/* 	 {$_POST['last_name']} has been updated</h3>"; */
/*        } */
/*      else */
/*        echo "No record updated"; */
/*   } */
?>
<?php
require("../user/footer.php");
?>
