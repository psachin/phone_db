<?php
/* dblogin.php */
$user;
$session_id;

function dblogin($u, $p)
{
  global $user, $session_id;
  $con = mysqli_connect("localhost","sachin","sachin") or die(mysqli_error());
  mysqli_select_db('session',$con) or die(mysqli_error());


  $res=mysql_query("select id, decode(pass,'session') as pass from user where
  name='". addslashes($u). "';",$con) or die(mysql_error());
  if(mysqli_num_rows($res) != 1) {
    printf("<center><h1>User %s not found</h1><br><a href=\"dbloginform.html\">Go to login page</a></center>\", $username);
             return false;
             }

  if(mysqli_result($res,0,"pass") != $p) {
             printf("<center><h1>Login attempt rejected for %s!</h1><br /><a
  href=\"dbloginform.html\">Go to login page</a></center>", $username);
             return false;
             }


  $uid = mysql_result($res,0,"id");
  $t = sprintf("%.12f",microtime(true));
  $done = false;
  while(!$done) {
             $done = true;
             mysql_query("insert into session_log values ($t,$uid, ?$_
 SERVER[REMOTE_ADDR]',1, now(), now());",$con) or $done=false;
             if(!$done)
                          $t = sprintf("%.12f",microtime(true));
             }

 $user=$u;
 $session_id=$t;
 mysql_close($con);
 return true;
 }
 
 if(dblogin($_POST['username'], $_POST['passwd']))
            printf("<center><b>Welcome %s! Your session id is %s</
 b><br/>\n",$user, $session_id);
	                 print("<a href="./dbloginstatus.php">Check session status!</

 a><br /><a href="./dbprotectedimage.php">View Image</a><br /><a
 href="./dblogout.php">Logout</a></center>");
 ?>

