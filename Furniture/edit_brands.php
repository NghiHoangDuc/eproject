<?php
$conn = mysqli_connect('localhost', 'root', '', 'eproject_furniture'); //sửa liên kết db tại đây
$id = $_GET['id'];
$name = $_GET['name'];
$summary = $_GET['summary'];
$logo = $_GET['logo'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Brands</title>
</head>
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Brands</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Admin</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit area
        </div>
        <center>
            <div class="card-body">
                <table id="datatablesSimple" border="1" width="100%">
                    <div class="Login">

                        <form method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Tên thương hiệu</td>
                                    <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="name" value="<?php echo "$name" ?>"></td>
                                </tr>
                                <tr>
                                    <td>Mô tả thương hiệu</td>
                                    <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="summary" value="<?php echo "$summary" ?>"></td>
                                </tr>
                                <tr>
                                    <td>Logo thương hiệu</td>
                                    <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="file" name="Logo"></td>
                                    <td><img style="height: 100px;" src="<?php echo "$logo" ?>"></td>
                                </tr>
                                <tr>
                                    <td><a href="?option=brands"><input type="submit" name="update" value="update" class="btn btn-secondary"></a></td>
                                </tr>
                            </table>
                        </form>

                        <?php
                        if (isset($_POST['update'])) {
                            $Name = '';
                            $Summary = '';
                            if (isset($_POST['name'])) {
                                $Name = $_POST['name'];
                                // echo"Tên nhãn hàng: </br>";
                                // echo"$Name</br>";
                            }
                            if (isset($_POST['summary'])) {
                                $Summary = $_POST['summary'];
                                // echo"miêu tả ngắn gọn nhãn hàng</br>";
                                // echo"$Summary</br>";
                            }
                            if (($_FILES['Logo']['name']) !== '') {
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
                                    echo "<img style=\"height: 100px;\" src='" . $Logo . "'>";
                                    // echo"$Logo";
                                    move_uploaded_file($_FILES['Logo']['tmp_name'], 'img/logo/' . $_FILES['Logo']['name']);
                                }
                                $sql = "UPDATE brands SET name='$Name',summary='$Summary',logo='$Logo',updated_at=now() WHERE id='$id' ";
                                $conn->query($sql);
                            } else {
                                $sql = "UPDATE brands SET name='$Name',summary='$Summary',updated_at=now() WHERE id='$id' ";
                                $conn->query($sql);
                            }
                        }

                        ?>
                    </div>
                </table>
            </div>

        </center>
    </div>
</div>

</html>