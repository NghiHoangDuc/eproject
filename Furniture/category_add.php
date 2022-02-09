<?php
require_once('libs/database.php');
require_once('libs/functions.php');
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkForm();
}
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()) {
    $category = [];
    $category['name'] = $_POST['name'];
    $result = insert_category($category);
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Add Category</title>
</head>

<div class="container-fluid px-4">
    <h1 class="mt-4">Add Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Admin</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Add category area
        </div>
        <div class="card-body">
            <table id="datatablesSimple" border="1" width="100%">


                <form method="POST">
                    <div class="Login">
                        <table>
                            <tr> <label for="name"> Category name </label>
                                <input class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" id="name" name="name" value="<?php echo isFormValidated() ? '' : $_POST['name']; ?>">
                                <?php
                                foreach ($errors as $key => $value) {
                                    if (!empty($value)) {
                                        echo '<li>', $value, '</li>';
                                    }
                                }
                                ?>
                            </tr>

                            </br>
                            <tr>
                                <input class="btn btn-secondary" type="submit" name="submit" value="Add">
                            </tr>
                </form>
            </table>


            
        </div>
        </section>
        <!--    --><?php
                    //    include_once('share/footer.php');
                    //    
                    ?>

        </body>

</html>