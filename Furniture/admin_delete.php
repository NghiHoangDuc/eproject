<?php
include 'libs/database.php';
$id = $_GET['id'];
$con = db_connect();
$login = NULL;
if (isset($_SESSION['AdminMobileLogin'])) {
  $login = $_SESSION['AdminMobileLogin'];
} 

$sql = "DELETE FROM `admins` WHERE `ss_id`='" . $id . "'";
$result = mysqli_query($con, $sql);
echo "</br></br>Delete success</br>";
?>
<a href="html.php?option=display"><button class="btn btn-success">Back to list</button></a>