<?php
header('Content-Type: text/html; charset=UTF-8');
$cn = mysqli_connect("localhost", "root", "", "abc12");

if (isset($_POST['Registration'])) {
    $_POST['Password'] = sha1($_POST['Password']);
    $sql = "INSERT INTO `abc12users` (`USERNAME`, `PASSWORD_HASH`, `PHONE`) 
 VALUES ('" . $_POST['UserName'] . "' ,'" . $_POST['Password'] . "' , '" . $_POST['PhoneNumber'] . "' )";

    if ($result = mysqli_query($cn, $sql)) {
        echo "Sign up success, User name: " . $_POST['UserName'];
        $cn->close();
    } else {
        echo "<h1>Có lỗi xảy ra</h1>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <form method="post" name="f2">
        <table>
            <p>Registration form</p>
            <tr>
                <td>UserName: </td>
                <td><input type="text" name="UserName"></input></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="Password"></input></td>
            </tr>
            <tr>
                <td>Phone Number: </td>
                <td><input type="text" name="PhoneNumber"></input></td>
            </tr>
            </tr>
            <td>
                <input type="submit" name="Registration"></input>
            </td>
            </tr>
        </table>
    </form>
</body>

</html>