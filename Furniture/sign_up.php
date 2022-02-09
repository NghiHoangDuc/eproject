    <?php
    include 'libs/database.php';
    if (isset($_POST['register'])) {

        $data = $_POST;
        $password = "";
        $email  = "";
        $password = "";
        $errors = [];
        $re_password = "";

        //Validate name
        if (!isset($_POST['name'])) {
            $errors['name'] = "Chưa nhập tên!";
        } else if (
            !is_string($_POST['name']) || strlen($_POST['name']) < 5
            ||  strlen($_POST['name']) > 55
        ) {
            $errors['name'] = $_POST['name'] . "Tên Admin không hợp lệ!";
        }

        //Validate dob
        if (isset($_POST['dob'])) {
            if ($_POST['dob'] < 1950 / 01 / 01 || $_POST['dob'] > 2021 / 01 / 01) {
                echo 'Nhập lại ngày hợp lệ';
                $errors['name'] =  "Email không hợp lệ!";
            }
        }

        //Validate số đt
        if (!isset($_POST['mobile'])) {
            $errors['mobile'] = "Chưa nhập mobile!";
        } else if ($_POST['mobile'] < 100000000  || $_POST['mobile'] > 999999999) {
            $errors['mobile'] = "Số điện thoại không hợp lệ!";
        }

        //Validate email
        $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        $email = $_POST['email'];
        if (!isset($_POST['email'])) {
            $errors['email'] = "Chưa nhập email!";
        } else if (!preg_match($partten, $email))
            $errors['name'] =  "Email không hợp lệ!";

        //Validate adminpassword
        if (!isset($_POST['password']) || $_POST['password'] < 100000) {
            $errors['password'] = "Chưa nhập mật khẩu!";
        }
        $password = $_POST['password'];
        if (!isset($_POST['re_password'])) {
            $errors['re_password'] = "Chưa nhập lại mật khẩu!";
        }
        $re_password = $_POST['re_password'];
        if ($password != $re_password) {
            $errors['password'] = "Nhập lại mật khẩu không đúng!";
        }
        if (count($errors) > 0) {
            $err_str = '<ul>';
            foreach ($errors as $err) {
                $err_str .= '<li>' . $err . '</li>';
            }
            $err_str .= '</ul>';
            echo  $err_str;
        } else {
            if (isset($_POST["password"])) {
                $password = $_POST['password'];
               // $password = md5($_POST['password']);
            }
            $con = db_connect();
            $now = DATE('Y:m:d H:i:s');
            $sql = "INSERT INTO `admins` (`name`, `dob`, `mobile`, `email`,`password`,`Boss`,`created_at`) 
        VALUES ('" . $data['name'] . "', '" . $data['dob'] . "', '" . $data['mobile'] . "', '" . $data['email'] . "', '" . $password . "','" . $data['Boss'] . "', '" . $now . "')";
            if ($result = mysqli_query($con, $sql)) {
                echo "Sign up success";
            } else {
                echo "<h1>Có lỗi xảy ra Click vào <a href='admin_register.php'>đây</a> để về trang đăng kí</h1>";
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Sign up</title>
    </head>

    <body>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sign Up</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Supper Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Sign up area
                </div>
                <center>
                    <div class="card-body">
                        <table id="datatablesSimple" border="1" width="100%">
                            <form method="post" name="f2">
                                <div class="Login">
                                    <table>
                                        <tr>
                                            <td>Admin Name</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="name"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="date" name="dob"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone number</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="mobile"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Decentralization</td>
                                            <td><select  class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default"  name="Boss">
                                            
                                            <option value="select:">1</option>
                                            <option value="select:">0</option>



                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="password" name="password"></td>
                                        </tr>
                                        <tr>
                                            <td>Re_password</td>
                                            <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="password" name="re_password"></td>
                                        </tr>
                                        <td>
                                            <button class="btn btn-success" type="submit" name="register">Sign up</button>
                                        </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </table>
                    </div>
                </center>
            </div>
        </div>
        </div>
        </div>
    </body>

    </html>