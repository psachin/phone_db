<?php
/* Program: family_age.php
 * Desc:  calculate age of a family member
 */
?>
<html>
<head><title>date_of_birth</title></head>
<body>
<?php
  $user="sachin";
  $host="localhost";
  $password="sachin";
  $database = "sachin_birth";

  $cxn = mysqli_connect($host,$user,$password,$database)
         or die ("couldn't connect to server: database");

  $query = "select *,
  curdate(), (year(curdate()) - year(dob) -
  (right(curdate(),5) < (right(dob,5)))) as age,
  ((((12-Month(dob))+month(curdate())) - (dayofmonth(curdate()) <
  dayofmonth(dob))) * (month(dob) > month(curdate()))) as months,
  dayofmonth(dob) from num_of_year";


  $result = mysqli_query($cxn,$query)
            or die ("Couldn't execute query.");


  /* Display results in a table: num_of_year */
  echo "<h1>Family Age</h1>";
  echo "<table cellspacing='15'>";
  echo "<tr><td colspan='5'><hr /></td></tr>";

     echo "<tr>\n
           <td>Name</td>\n
           <td>Date of Birth</td>\n
           <td>Gender</td>\n
	   <td>Age</td>\n
	   <td>Months</td>\n
	   
           </tr>\n";
  echo "<tr><td colspan='5'><hr /></td></tr>";
  
  while($row = mysqli_fetch_assoc($result))
  {
    extract($row);
    echo "<tr>\n
           <td>$name</td>\n
           <td>$dob</td>\n
           <td>$gender</td>\n
     	   <td>$age</td>\n
	   <td>$months</td>\n
           </tr>\n";
     echo "<tr><td colspan='5'><hr /></td></tr>\n";
  }
  echo "</table>\n";

?>
</body>
</html>
<!--
  select *curdate(),(year(curdate())-year(dob))-(right(curdate(),5) <
  (right(dob,5))) as age from num_of_year order by age";
-->
