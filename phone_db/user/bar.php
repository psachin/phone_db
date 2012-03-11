<?php
session_start();
if (@$_SESSION["auth"] != "yes" OR 
    @$_SESSION["phlogname"] == $login_name AND
    @$_SESSION["sessid"] == $PHPSESSIONID)
  {
    header("Location: ../login.php");
    exit();
  }
?>
<h1>Mug Shot</h1>
<div id="img">
  <img src="images/photo.jpg" height="37%" width="100%" alt="image">
  </div>
<h1>Details</h1>
<ul>
   <li>I am tasmanian devil.</li>
   <li>I have two systems named Vector and Zyro.<br>
Vector is the elder one.</li>
   <li>My favorite colour is black</li>
</ul>

