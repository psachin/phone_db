<?php
session_start();
if (@$_SESSION["auth"] != "yes")
  {
    header("Location: ../login.php");
    exit();
  }
  require("../user/header.php");
?>

   <h1>Technical Details</h1>
   <p>
I am too lazy to write any details. find it for yourself.
   </p>
<table cellspacing="0" cellpadding="10">
   <tr>
      <th>Tool</th>
      <th>Version</th>
      <th>Description</th>
   </tr>
   <tr>
      <td>Apache</td>
      <td>2.2</td>
      <td>Powerful web server</td>
  </tr>
  <tr>
      <td>PHP</td>
      <td>5.2.10</td>
      <td>Scripting language for web applications</td>
   </tr>
   <tr>
      <td>MySQL</td>
      <td>5.0.84-log</td>
      <td>Powerful database system</td>
   </tr>
   <tr>
      <td>Gallery</td>
      <td>2.3-full</td>
      <td>Web based photo gallery</td>
   </tr>
</table>

<?php
  require("footer.php");
?>
