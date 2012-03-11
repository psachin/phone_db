<?php
if (@$_SESSION["auth"] != "yes" OR 
    @$_SESSION["phlogname"] == $login_name AND
    @$_SESSION["sessid"] == $PHPSESSIONID)
  {
    header("Location: ../login.php");
    exit();
  }
?>

</div>
<div id="base">  
<?php  require("base.php");?>
</div>
</body>
</html>
