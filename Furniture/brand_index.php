<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display Brands</title>
</head>

<body>
    <div>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brands Management</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Admin</li>
            </ol>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Display brands area
                &nbsp; &nbsp; &nbsp;

            </div>
        </div>
        <table id="datatablesSimple" border="1" width="100%">


            <form method="post" name="f2">
                <div class="Login">
                    <table class="table table-striped">
                        <tr role="row">
                            <th>
                                STT
                            </th>
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Logo
                            </th>
                            <th>
                                Create at
                            </th>
                            <th>
                                Update at
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>

                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'eproject_furniture'); // thay đổi db tại đây
                        if ($conn->connect_errno) {
                            echo 'lỗi kết nối';
                        }

                        $sql = "SELECT * FROM brands";
                        $kq = $conn->query($sql);
                        $i = 1;
                        while ($row = mysqli_fetch_array($kq)) {
                            echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["summary"] . "</td>";
                            echo "<td><img style=\"width:100px;\" src='" . $row["logo"] . "'></td>";
                            echo "<td>" . $row["created_at"] . "</td>";
                            echo "<td>" . $row["updated_at"] . "</td>";
                            echo "<td><a  href='html.php?option=edit_brands&id=" . $row['id'] . "&name=" . $row['name'] . "&summary=" . $row['summary'] . "&logo=" . $row['logo'] . "' >edit</a></td>";
                            echo "<td><a href='delete_brands.php?id=" . $row['id'] . "&name=" . $row['name'] . "&summary=" . $row['summary'] . "&logo=" . $row['logo'] . "'>delete</a></td>";
                            $i++;
                        }
                        ?>
                    </table>
                </div>
            </form>
        </table>
    </div>
    </div>
    </main>
    </div>
    <div>
        <a href="html.php?option=add">
            <input type="button" name="Thêm nhãn hàng" value="Thêm nhãn hàng">
        </a>
    </div>
    </br></br></br>

</body>

</html>