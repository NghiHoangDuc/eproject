<?php
$conn= mysqli_connect('localhost','root','','eproject_furniture'); // chỉnh db tại đây
$id=$_GET['id'];
$sql="DELETE FROM products WHERE id='$id'";
$conn->query($sql);
header('location: html.php?option=products_display');
?>
