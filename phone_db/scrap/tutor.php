<?php
   session_start();
?>

<html>
<title>Phone number Catalog</title>
<head align="center"><h1>Phone number Catalog</h1></head>
<body>

<?php
define("org","vector.darkplanet.org");
$name="sachin";
$mob=9920488086;

echo "Name is: $name<br>
      Mob: $mob<br>
      Org: ";
echo org;

$n1 = 1;
$n2 = 2;
$sum = $n1 + $n2;

echo "<br>
      sum: $sum";

$price = 25;
$f_price = sprintf("%01.2f",$price);
echo "<br>Price : $f_price<br />";

unset($name);
echo @$name;
$name2 = @$name;

$string1="Hello";
$string2="World";
$joinstring=$string1.$string2;
$string3="my age is $price.";
echo "$string3";

//$age=12;
   if(isset($age))
   {
   if ($age < 13)
	      $status = "child";
	      elseif ($age >= 13)
   $status = "adult";
   echo "<br>Status: $status";
   }
   else
   {
   echo "<br>Variable 'age' not set !<BR><br>";
   }
   
for($i=1;$i<=10;$i++)
{
  echo "$i. Hello World!<br>";
}



	      function format_name()
	      {
	      $first_name = "Goliath";
	      $last_name = "Smith";
	      
	      $name = $last_name.", ".$first_name;
	      echo "$name";
	      }
	      format_name();
	      


function compute_salestax($amount,$custState)
{
  switch ( $custState )
  {
    case "OR" :
      $salestaxrate = 0;
      break;
    case "CA" :
      $salestaxrate = 1.0;
      break;
    default:
      $salestaxrate = .5;
      break;
  }
  $salestax = $amount * $salestaxrate;
  echo "<br>$salestax<br>";
}
$cost = 2000.00;
$custState = "CA";
compute_salestax($cost,$custState);

// arrays

$capitals['CA'] = "Sacramento";
$capitals['TX'] = "Austin";
$capitals['OR'] = "Salem";

echo "$capitals[CA]";

/* 
* $query="INSERT INTO phone_book value(
*	       '$_POST[first_name]',
*	       '$_POST[last_name]',
*	       '$_POST[mob]',
*	       '$_POST[landline]',
*	       '$_POST[mid_name]')";


*$result=mysqli_query($cnx,$query)
*	or die("could'nt insert data");
*/



  echo "<form action='nextpage.php' method='POST'>
          <input type='hidden' name='PHPSESSID'
                 value='$PHPSESSID'>
          <input type='submit' value='Next Page'>
    </form>";

$PHPSESSID = session_id();
echo "$PHPSESSID";
$_SESSION["sessid"]=$PHPSESSID;

if(@$_SESSION["sessid"] != $PHPSESSID)
  {
    echo "GO TO HELL";
  }
else
  {
    echo "WELCOME MASTER";
  }



$today=date("D");
echo "Weekday: $today";

echo "$do";			/* $do is hidden variable in PHP */

$cnx=mysqli_connect("localhost","sachin","sachin","sachin")
  or die("DUMB !");
$sql="SELECT first_name, last_name FROM ph_member
WHERE login_name='sachin'";
$result=mysqli_query($cnx,$sql)
  OR die("boooo...");
$row=mysqli_fetch_row($result);
extract($row);
echo $first_name;


?>
</body>
</html>
