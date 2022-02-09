<?php
$servername = 'localhost';
$username = 'root';
$password = '';

$connect = new mysqli($servername, $username, $password);
if ($connect->connect_error) {
    echo "connect fail!";
    return $connect;
}

$db = "CREATE DATABASE abc12";
$kq = $connect->query($db);
if ($kq != NULL) {
    echo "Create database success";
    $connect->close();
}

$cn = mysqli_connect("localhost", "root", "", "abc12");

$sql = "CREATE TABLE abc12users ( 
`USERNAME` VARCHAR(100) UNIQUE , 
`PASSWORD_HASH` CHAR(40) , 
`PHONE` VARCHAR(10) ) ";

$kqsql = $cn->query($sql);
if ($kqsql === TRUE) {
    echo "Create table success";
} else {
    echo "Create table fail" . $cn->error;
}
