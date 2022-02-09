<?php
include 'libs/database.php';
$data = $_POST;
$id = $_GET['id'];
$con = db_connect();
$login = NULL;
if (isset($_SESSION['AdminMobileLogin'])) {
    $login = $_SESSION['AdminMobileLogin'];
}
$sql = "SELECT * FROM `admins` WHERE `ss_id`= " . $id;
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $info = $row;
}
if (isset($_POST['update'])) {
    if (isset($_GET['id'])) {
        $con = db_connect();
        $now = DATE('Y:m:d H:i:s');
        $sql = "UPDATE admins SET name='" . $data['name'] . "',dob='" . $data['dob'] . "',mobile='" . $data['mobile'] . "',email='" . $data['email'] . "',updated_at='" . $now . "' WHERE ss_id = " . $_GET['id'];
        if ($result = mysqli_query($con, $sql)) {
            echo "Update success";
        } else {
            echo "<h1>Error!</h1>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Admin</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Supper Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit area
            </div>
            <center>
                <div class="card-body">
                    <table id="datatablesSimple" border="1" width="100%">
                        <form method="post" name="f2">
                            <div class="Login">

                                <form method="POST">
                                    <table>
                                        <tr>
                                            <td>Admin Name</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="name" value="<?php echo $info['name'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="date" name="dob" value="<?php echo $info['dob'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="mobile" value="<?php echo $info['mobile'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="email" value="<?php echo $info['email'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="password" name="password" value="<?php echo $info['password'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Re_password</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="password" name="re_password" value="<?php echo $info['password'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-secondary" type="submit" name="update">Update</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </form>
                    </table>
                </div>
            </center>
        </div>
    </div>
</body>

</html>