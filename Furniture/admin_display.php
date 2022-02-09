<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display Admin</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Admin Management</h1>
        <?php
        include 'libs/database.php';
        $con = db_connect();
        if (isset($_SESSION['AdminBoss']) && $_SESSION['AdminBoss'] == "1") {
        } else {
            echo "<h2>Have no right to access</h2>";
            exit;
        }
        ?>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Supper Admin</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Display admin area &nbsp; &nbsp; &nbsp;
        </div>
    </div>
    <table id="datatablesSimple" border="1" width="100%">
        <form method="post" name="f2">
            <div class="Login">
                <table class="table table-striped" id="datatable">
                    <tr role="row">
                        <th>ID</th>
                        <th>Admin Name</th>
                        <th>Date of Birth</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Create at</th>
                        <th>Update at</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `admins` ORDER BY `ss_id`";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[]  = $row;
                    }
                    $html = '';
                    foreach ($data as $value) {
                        $html .= '
                 <tr role="row">
                     <td>' . $value['ss_id'] . '</td>
                     <td>' . $value['name'] . '</td>
                     <td>' . $value['dob'] . '</td>
                     <td>' . $value['mobile'] . '</td>
                     <td>' . $value['email'] . '</td>
                     <td>' . $value['created_at'] . '</td>
                     <td>' . $value['updated_at'] . '</td>
                     <td><a class="alert-link" href="html.php?option=edit&id=' . $value['ss_id'] . '"><i class="fas fa-edit"></i></a></td>
                     <td><a onclick = "return confirm (\'confirm delete admin?\')"  class="alert-link" href="html.php?option=delete&id=' . $value['ss_id'] . '"><i class="fas fa-trash"></i></a></td>
                   
                 </tr>';
                    }
                    echo $html;
                    ?>
                    <tr><a href="html.php?option=sign_up"><button class="btn btn-secondary" type="button">Sign up</button></a></tr>
                </table>
            </div>
        </form>
    </table>
</body>

</html>