<?php
session_start();
if( isset($_SESSION['AdminBoss']))  { 
    $_SESSION['AdminBoss'] = NULL;
    header("location: log_in.php"); }  
else  {  
    $_SESSION['AdminBoss'] = NULL;
    header("location: log_in.php");
 }
?>
<br/>
