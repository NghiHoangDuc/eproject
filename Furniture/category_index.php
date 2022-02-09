<?php
require_once('libs/database.php');
require_once('libs/functions.php');
if (isset($_POST['Delete'])) {
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        delete_category($_POST['id']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Display category</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category Management</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Display category area
            &nbsp; &nbsp; &nbsp;

        </div>
    </div>
    <table id="datatablesSimple" border="1" width="100%">


        <form method="post" name="f2">
            <div class="Login">
                <table class="table table-striped" id="datatable">
                    <?php
                    $category_added = find_all_category();
                    $count = mysqli_num_rows($category_added);
                    for ($i = 0; $i < $count; $i++) {
                        $category = mysqli_fetch_assoc($category_added);
                    ?>

                        <tr>
                            <td><?php echo $category['name']; ?></td>
                            <td><a href="<?php echo 'html.php?option=category_update&id=' . $category['id']; ?>" class="btn btn-secondary">Edit</a></td>


                            <td>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                    <input type="submit" name="Delete" class="btn btn-secondary" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    mysqli_free_result($category_added);
                    ?>
                </table>
                <br><br><br><br>
            </div>



</body>

</html>