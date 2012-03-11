<?php
session_start();
if (@$_SESSION["auth"] != "yes" || @$_SESSION["phlogname"] == "login_name") 
  {
    header("Location: ../login.php");
    exit();
  }
else
  require("../user/header.php");
?>
   <h1>About Me</h1>
   <p>
   My name is Sachin C Patil, the developer and maintainer of this database. When home I spent on an average 8-12 hrs on my
computer doing nothing. <i>thats what my parents say</i>
   </p>
   <h2>About my systems</h2>
   <p>
  Zyro is the yongest and fastest. It has 2.2GHz of clock rate with 2GB of RAM.
  Zyro include two harddisks, one is SATA having 3GBps transfer rate made by HITACHI and second
  the oldest one is IDE purchased from a scrap shop of Lamington Road(Mumbai) manufactured by SEAGATE.
  It has 40 GB of storage space. My Slackware resides in this and most of my other projects too. Though old,
it works fine without complaining. I cant afford to loose it. Total in all I have 200GB of storage space on Zyro.</p>
<p>
Vector has it name form oldest and most robust GNU/Linux OS named vector Linux. Vector Linux is most appreciated when it 
comes to older machines. The cabinet of vector was donated by my neighbour. Vector has only 334 MHz of CPU speed <i>can you belive it ?</i>
  and just 128 MB of RAM, and the most amazing part is that its "headless". I SSH into vector and do all my maintainance work. Besides Vector 
runs my Apache web server with PHP,CGI and MySQL database server. So when turned ON, Vector has to handle more load that Zyro. I use Vector to test 
new kernel versions and to learn device driver programming.

<p>Right now both systems are updated with 2.6.36.2 kernel.</p>
   </p>
   <h3>Even more</h3>
   <p>
Here you can read about my projects. and any update about this site. Installed gallery2 which can help with 
photo management. Hope it works.

   </p>
<?php
  require("footer.php");
?>
