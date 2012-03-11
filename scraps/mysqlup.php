<?php
/* Program: mysqlup.php
 * Desc:   to test if mysql is up
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
  $database2 = "sachin";

  $cxn = mysqli_connect($host,$user,$password,$database)
         or die ("couldn't connect to server: database");
  $cxn2 = mysqli_connect($host,$user,$password,$database2)
         or die ("couldn't connect to server: database2");

//  $name = "sachin"; // sachin was typed in a form by user

    $query0 = "SELECT * FROM  num_of_year WHERE name='$name'";
    $query1 = "select *,
    curdate(),(year(curdate())-year(dob))-(right(curdate(),5) <
    (right(dob,5))) as age from num_of_year order by age";
    $query2 = "select *,
    curdate(),(year(curdate())-year(birth))-(right(curdate(),5) <
    (right(birth,5))) as age from pet order by age";
     
     
  $result = mysqli_query($cxn,$query0)
            or die ("Couldn't execute query0.");
  $result1 = mysqli_query($cxn,$query1)
            or die ("Couldn't execute query1.");
  $result2 = mysqli_query($cxn2,$query2)
            or die ("Couldn't execute query2.");

  /* Display results in a table: num_of_year */
  echo "<h1>Family Age</h1>";
  echo "<table cellspacing='15'>";
  echo "<tr><td colspan='4'><hr /></td></tr>";

     echo "<tr>\n
           <td>Name</td>\n
           <td>Date of Birth</td>\n
           <td>Gender</td>\n
	   <td>Age</td>\n
	   
           </tr>\n";
  echo "<tr><td colspan='4'><hr /></td></tr>";
  
  while($row = mysqli_fetch_assoc($result1))
  {
     extract($row);
//     $d_o_b = date($dob);

    echo "<tr>\n
           <td>$name</td>\n
           <td>$dob</td>\n
           <td>$gender</td>\n
     	   <td>$age</td>\n
           </tr>\n";
     echo "<tr><td colspan='4'><hr /></td></tr>\n";
  }
  echo "</table>\n";

  /*  ----------------------------------------------------------------------------------------------------- */ 
  /* Display results in a table: pet */
  echo "<h1>Pet Database</h1>";
  echo "<table cellspacing='15'>";
  echo "<tr><td colspan='9'><hr /></td></tr>";

     echo "<tr>\n
           <td>Name</td>\n
           <td>Owner</td>\n
           <td>species</td>\n
	   <td>sex</td>\n
	   <td>birth</td>\n
	   <td>Age</td>\n
	   <td>death</td>\n
	   
           </tr>\n";
  echo "<tr><td colspan='7'><hr /></td></tr>";
  
  while($row = mysqli_fetch_assoc($result2))
  {
    extract($row);
    echo "<tr>\n
           <td>$name</td>\n
           <td>$owner</td>\n
           <td>$species</td>\n
           <td>$sex</td>\n
           <td>$birth</td>\n
           <td>$age</td>\n
     	   <td>$death</td>\n
           </tr>\n";
     echo "<tr><td colspan='7'><hr /></td></tr>\n";
  }
  echo "</table>\n";

?>
</body>
</html>
