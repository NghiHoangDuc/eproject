<?php
require_once('libs/database.php');
require_once('libs/functions.php');


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkForm();
    if (isFormValidated()) {
        $category = [];
        $category['id'] = $_POST['id'];
        $category['name'] = $_POST['name'];
        update_category($category);
        redirect_to('category_index.php');
    }
} else {
    if (!isset($_GET['id'])) {
        redirect_to('category_index.php');
    }
    $id = $_GET['id'];
    $category = find_category_by_id($id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit category</title>
</head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit area
            </div>
            <div class="card-body">
                <table id="datatablesSimple" border="1" width="100%">
                    <form method="post" name="f2">
                        <div class="Login">

                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <table>

                                    <tr> <input  type="hidden" name="id" value="<?php echo isFormValidated() ? $category['id'] : $_POST['id'] ?>">
                                    </tr>
                                    <label for="name">Category name </label>
                                    <input type="text" id="name" name="name" value="<?php echo isFormValidated() ? $category['name'] : $_POST['name'] ?>">
                                    <br><br>
                                    <div class="form-groups">
                                        <input type="submit" class="btn btn-secondary" name="submit" value="Edit">
                                    </div>
                                </table>
                            </form>


                        </div>

            </div>


</body>

</html>