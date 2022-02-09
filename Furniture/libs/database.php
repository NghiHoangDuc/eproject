<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "eproject_furniture");

function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

$db = db_connect();

function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}
function GetLogin($mobile, $password)
{

    $connect = db_connect();
    if (!$connect->connect_error) {
        $sqlSelectAdmin = "SELECT  mobile, password, name, Boss  from admins where mobile = $mobile and password=$password";
        
        $kq = $connect->query($sqlSelectAdmin);
       
        return $kq;
    }
    return 0;
}
