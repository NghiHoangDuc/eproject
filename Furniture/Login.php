<?php
session_start();
$cn = mysqli_connect("localhost", "root", "", "abc12");

if (isset($_SESSION['loggedin'])) {
    header("location: Welcpme.php");
}

if (isset($_POST['Login'])) {
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $Password = sha1($_POST['Password']);

    $sqlselect = "SELECT USERNAME, PASSWORD_HASH FROM abc12users WHERE USERNAME = '$UserName' AND PASSWORD_HASH = '$Password'";
    $kq = $cn->query($sqlselect);
    if (isset($kq) && is_object($kq)) {
        if ($kq->num_rows > 0) {
            $_SESSION['loggedin'] = true;
            header("location: Welcpme.php");
        }
    } else {
        if ($UserName == NULL) {
            echo "nhập username chưa mà đòi? Mời nhập lại";
        }
        if ($Password == NULL) {
            echo "nhập pass chưa mà đòi Mời nhập lại";
        }
    }
    // Remember
    if (isset($_POST["Remember"])) {
        setcookie("member_login", 'YES', time() + (7200));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" name="f2">
        <table>
            <p>Login form</p>
            <tr>
                <td>UserName: </td>
                <td><input type="text" name="UserName"></input></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="Password"></input></td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="Remember">Remember me!</input>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="Login"></input>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>