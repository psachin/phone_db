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
   <h1>links</h1>
<ul>
<li>    <a href="<?php $config_basedir;?>/serverlog.html">serverlog</a></li>
<li>    <a href="<?php $config_basedir;?>/manual/index.html">httpd_manual</a></li>
<li>    <a href="<?php $config_basedir;?>/phlak/index.htm">phlak</a></li>
<li>    <a href="<?php $config_basedir;?>/Oreillybookshelf/index.html">Oreillybookshelf</a></li>
<li>    <a href="<?php $config_basedir;?>/songs">songs</a></li>
<li>    <a href="<?php $config_basedir;?>/movies">movies</a></li>
<li>    <a href="<?php $config_basedir;?>/iso">iso</a></li>
</ul>

  <h1>more</h1>
  <ul>
  <li>My interests</li>
  <li>My dogs</li>
  <li>My website</li>
  </ul>
