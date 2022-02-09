<?php
$lk = mysqli_connect('localhost', 'root', '', 'eproject_furniture');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add brands</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add brands</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add brands area
            </div>
            <center>
                <div class="card-body">
                    <table id="datatablesSimple" border="1" width="100%">

                        <form method="POST" enctype="multipart/form-data">
                            <div class="Login">
                                <table>
                                    <tr>
                                        <td>Brands Name</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="Name"></td>
                                    </tr>
                                    <tr>
                                        <td>Brands Infor</td>
                                        <td><textarea class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="Summary"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Brands Logo</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" accept=".jpg, .png, .gif" type="file" name="Logo"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="btn btn-secondary" type="submit" name="Submit"></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </table>
                </div>
            </center>
        </div>
    </div>
</body>

</html>
<?php
$conn = $lk;
if ($conn->connect_errno) {
    echo 'lỗi kết nối';
}

if (isset($_POST['Submit'])) {
    $Name = '';
    $Comm = '';
    $Logo = '';
    if (isset($_POST['Name'])) {
        echo 'Tên Logo là:' . $_POST['Name'] . "</br>";
        $Name = $_POST['Name'];
    }
    if (isset($_POST['Summary'])) {
        echo 'Thông tin thương hiệu:' . $_POST['Summary'] . "</br>";
        $Comm = $_POST['Summary'];
    }

    $folder = "upload/logo/";
    $file_path = $folder . $_FILES['Logo']['name'];
    $flag_ok = true;
    //check file bị trùng
    if (file_exists($file_path)) {
        $file_ok = false;
        echo 'file đã tồn tại';
    }
    //check đuôi
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    //echo $file_type;
    $ex = array('JPG', 'PNG', 'JPEG', 'GiF');
    if (in_array($file_type, $ex)) {
        $flag_ok = false;
        echo 'file không hợp lệ';
    }
    //check dung lượng
    if ($_FILES['Logo']['size'] > 800000) {
        $flag_ok = false;
        echo 'dung lượng file quá lớn';
    }
    if ($flag_ok) {
        $Logo = $folder . $_FILES['Logo']['name'];
        move_uploaded_file($_FILES['Logo']['tmp_name'], $folder . $_FILES['Logo']['name']);

        echo "$Logo";
    }
    $sql = "INSERT INTO brands(name,summary,logo,created_at) values('$Name','$Comm','$Logo',now()) ";
    $conn->query($sql);
}
?>