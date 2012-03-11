<?php
/* 
   Program: phone.php
   Desc:    Displays all phone numbers with additional info 
 */
?>
<html>
<head><title>Phone database</title></head>
<body>
<?php
  $user="sachin";
  $host="localhost";
  $password="sachin";
  $database = "sachin";

  $cxn = mysqli_connect($host,$user,$password,$database)
         or die ("couldn't connect to server: database is --> sachin");

//  $name = "sachin"; // sachin was typed in a form by user

$query = "SELECT * FROM phone_book ORDER BY first_name";

  $result = mysqli_query($cxn,$query)
            or die ("Couldn't execute query.");

  /*  ----------------------------------------------------------------------------------------------------- */ 
  /* Display results in a table: pet */
  echo "<h1>Phone database on vector.darkplanet.org</h1>
  
<table>
  <tr>
    <td>First name&nbsp&nbsp&nbsp&nbsp</td>
    <td>Last name&nbsp&nbsp&nbsp&nbsp</td>
    <td>Mobile No.&nbsp&nbsp&nbsp&nbsp&nbsp</td>
    <td>Residential phone.&nbsp&nbsp&nbsp&nbsp</td>
    <td>Middle name</td>

    
  </tr>
  <tr><td colspan='7'><hr /></td></tr>";
  
  while($row = mysqli_fetch_assoc($result))
  {
    extract($row);
    echo "<tr>\n
           <td>$first_name</td>\n
           <td>$last_name</td>\n
           <td>$mob</td>\n
           <td>$landline</td>\n
           <td>$mid_name</td>\n

           </tr>\n";
     echo "<tr><td colspan='7'><hr /></td></tr>\n";
  }
  echo "</table>\n";

?>
</body>
</html>
