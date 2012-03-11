<?php
/* 
   data process prg for login _info
   cming form login.inc

   Note: initial value of $do=login
   refer /htdocs/members/front_member.php

   WARNING: data is directly fed to mysqli_query
   data validation is must
   write it.
*/
session_start();
include ("misc.inc");

switch(@$_POST["do"])
  {
  case "login":
    $cxn = mysqli_connect($host,$user,$passwd,$dbname)
      or die ("Couldn't connect to server. from login.php");
    $sql = "SELECT login_name FROM ph_member
                WHERE login_name='$_POST[fuser]'";
    $result = mysqli_query($cxn,$sql)
      or die("Couldn't execute query. from $result: login.php");
    /* query for login name in db */
    $num=mysqli_num_rows($result);
    
    if($num > 0) /* login_name was found */
      {
	$sql = "SELECT login_name FROM ph_member
		WHERE login_name='$_POST[fuser]'
		AND passwd=md5('$_POST[fpasswd]')";
	
	$result2= mysqli_query($cxn,$sql)
	  or die("could'nt execute result2");
	/* query for passwd in db */
	$num2=mysqli_num_rows($result2);
	
	if($num2 > 0) /* passwd was found  */
	  {
	    $_SESSION["auth"]="yes";
	    $phlogname=$_POST["fuser"];
	    $_SESSION["phlogname"]= $phlogname;
	    $PHPSESSIONID=session_id();
	    $_SESSION["sessid"]=$PHPSESSIONID;


	    /* 
	       insert login time in db: sachin.login 
	       and show header page
	    */
	    $today = date("Y-m-d h:i:s");	    
	    $sql = "INSERT INTO ph_login (login_name,login_time)
			VALUES('$phlogname','$today')";
	    $result = mysqli_query($cxn,$sql)
	      or die("Can't insert login_name and login_time");

	    /* New_member will welcome */
	    header("Location: user/index.php");
	  }
	else	/* passwd is not correct */
	  {
	    /* generate $message */
	    $message="Incorrect password !";
	    /* instead dont even show that the user exit */
	    /* send user back to login_form.inc displaying $message*/
	    include("login.inc");
	  }
      }
    elseif($num == 0) 		/* login name was not found */
      {
	/* generate $message */
	$message="Username don't exit !";
	/* send user back to main page */
	include("login.inc");
      }
    break;

    
  default:
    /* redirect user to main page */
    include("login.inc");
    break;
  }
?>