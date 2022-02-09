<?php
include "libs/database.php";
$con = db_connect();

?>
<?php
    if (isset($_POST['add'])) {

    $product_code = $_POST['product_code'];
    //
    $folder = "upload/product_images/";


    $file_path = $folder . $_FILES['product_images']['name'];
    $flag_ok = true;

    //check đuôi

    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    //echo $file_type;
    $ex = array('JPG', 'PNG', 'JPEG', 'GiF');
    if (in_array($file_type, $ex)) {
        $flag_ok = false;
        echo 'Invalid file';
        exit;
    }
    //check dung lượng
    if ($_FILES['product_images']['size'] > 800000) {
        $flag_ok = false;
        echo 'file size is too big';
        exit;
    }
    if ($flag_ok) {
        $image = $folder . $_FILES['product_images']['name'];
        move_uploaded_file($_FILES['product_images']['tmp_name'], $folder . $_FILES['product_images']['name']);
    }

    //

    $folder2 = "upload/product_download/";


    $file_path2 = $folder2 . $_FILES['product_download']['name'];
    $flag_ok = true;
    
    //check đuôi

    $file_type = strtolower(pathinfo($file_path2, PATHINFO_EXTENSION));
    //echo $file_type;
    $ex = array('DOC', 'PDF', 'doc', 'pdf','docx','DOCX');
    if (!in_array($file_type, $ex)) {
        $flag_ok = false;
        echo 'Invalid file';
       
    }
    //check dung lượng
    if ($_FILES['product_download']['size'] > 800000) {
        $flag_ok = false;
        echo 'file size is too big';
       
    }
    if ($flag_ok) {
        $download = $folder2 . $_FILES['product_download']['name'];
        move_uploaded_file($_FILES['product_download']['tmp_name'], $folder2 . $_FILES['product_download']['name']);
    }
    $brand_id = $_POST['brand_id'];
    $category_id = $_POST['category_id'];
    $adder_id = $_SESSION['Admin_name'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $material = $_POST['material'];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $made_in = $_POST['made_in'];
    $summary = $_POST['summary'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products(product_code,product_images,product_download,brand_name,category_name,adder_id,name,price,color,material,weight,length,width,height,made_in,summary,quantity) 
        VALUES ('$product_code','$image','$download','$brand_id','$category_id','$adder_id','$name','$price','$color','$material','$weight','$length','$width','$height','$made_in','$summary','$quantity') ";
    $result = mysqli_query($con, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Add Products</title>
    </head>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add area
            </div>
            <center>
                <div class="card-body">
                    <table id="datatablesSimple" border="1" width="100%">
                        <form method="post" name="f2" enctype="multipart/form-data">
                            <div class="Login">

                                <table>
                                    <tr>
                                        <td>Product Code</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="product_code"></td>
                                    </tr>
                                    <tr>
                                        <td>Product Image</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" accept=".jpg, .png, .gif" type="file" name="product_images"></td>
                                    </tr>
                                    <tr>
                                        <td>for user</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="file" name="product_download"></td>
                                    </tr>
                                    <tr>
                                        <td>Brand Name</td>
                                        <td>
                                            <select class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-select" name="brand_id" id="ctg">
                                                <option value="select:">select...</option>
                                                <?php
                                                $con = db_connect();
                                                $list = $con->query("SELECT name FROM brands");
                                                if ($list->num_rows > 0) {
                                                    while ($item = $list->fetch_assoc()) {
                                                        echo "<option value=\"{$item['name']}\">{$item['name']}</option>";
                                                    }
                                                }
                                                $con->close();
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Category Name</td>
                                        <td><select class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-select" name="category_id" id="ctg">
                                                <option value="select:">select...</option>
                                                <?php
                                                $con = db_connect();
                                                $list = $con->query("SELECT name FROM categories ");
                                                if ($list->num_rows > 0) {
                                                    while ($item = $list->fetch_assoc()) {
                                                        echo "<option value=\"{$item['name']}\">{$item['name']}</option>";
                                                    }
                                                }
                                                $con->close();
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="name"></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="price"></td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="color"></td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="material"></td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="weight"></td>
                                    </tr>
                                    <tr>
                                        <td>Length</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="length"></td>
                                    </tr>
                                    <tr>
                                        <td>Width</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="width"></td>
                                    </tr>
                                    <tr>
                                        <td>Height</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="height"></td>
                                    </tr>
                                    <tr>
                                        <td>Made in</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="made_in"></td>
                                    </tr>
                                    <tr>
                                        <td>Summary</td>
                                        <td><textarea class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="summary"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="number" name="quantity"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-success" type="submit" name="add">Add</button>
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

</body>

</html>