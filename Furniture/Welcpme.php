<?php
session_start();
echo"fhjklsdg";

if(isset($_POST['logout'])){
    unset($_SESSION['loggedin']);
    header("location: Login.php");
    setcookie ("member_login",'YES',time()-(7200));
}


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    </br><button type = "submit" name = "logout">dang xuat </button>
</form>
</body>
</html>