   <?php
    include 'libs/database.php';
    $con = db_connect();
    $data = $_POST;
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id= " . $id;
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $info = $row;
    }
    if (isset($_POST['update'])) {
        $now = DATE('Y:m:d H:i:s');
        $sql = "UPDATE products SET  name='" . $data['name'] . "',adder_id='" . $data['adder_id'] . "',
 price='" . $data['price'] . "',color='" . $data['color'] . "',material='" . $data['material'] . "',weight='" . $data['weight'] . "',length='" . $data['length'] . "',width='" . $data['width'] . "',
 height='" . $data['height'] . "',made_in='" . $data['made_in'] . "',summary='" . $data['summary'] . "',quantity='" . $data['quantity'] . "',updated_at='" . $now . "',product_code='" . $data['product_code'] . "' WHERE `id` = " . $_GET['id'];
        if ($result = mysqli_query($con, $sql)) {
            echo 'Edit success';
        }
        if ($data['brand_id'] !== '') {
            $a = $data['brand_id'];
            $sql = "UPDATE products SET brand_name='$a' WHERE id='{$_GET['id']}'";
            $con->query($sql);

            echo "$a";
        } else {
            $b = $data['brand_id'];
            $sql = "UPDATE products SET brand_name='$b' WHERE id='{$_GET['id']}'";
            $con->query($sql);
            //echo "$b";
        }
        if ($data['category_id'] !== '') {
            $c = $data['category_id'];
            $sql = "UPDATE products SET category_name='$c' WHERE id='{$_GET['id']}'";
            $con->query($sql);
            echo "$c";
        } else {
            $d = $info['category_id'];
            $sql = "UPDATE products SET category_name='$d' WHERE id='{$_GET['id']}'";
            $con->query($sql);
        }
        if ($_FILES['product_images']['name'] !== '') {
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
            }
            //check dung lượng
            if ($_FILES['product_images']['size'] > 800000) {
                $flag_ok = false;
                echo 'file size is too big';
            }
            if ($flag_ok) {
                $image = $folder . $_FILES['product_images']['name'];
                move_uploaded_file($_FILES['product_images']['tmp_name'], $folder . $_FILES['product_images']['name']);
            }



            $sql = "UPDATE products SET  product_images='" . $image . "' WHERE `id` = " . $_GET['id'];
            if ($result = mysqli_query($con, $sql)) {
            }
        } else {

            $sql = "UPDATE products SET product_images='" . $info['product_images'] . "' WHERE `id` = " . $_GET['id'];
            if ($result = mysqli_query($con, $sql)) {
            }
        }
        if ($_FILES['product_download']['name'] !== '') {
            $folder2 = "upload/product_download/";


            $file_path2 = $folder2 . $_FILES['product_download']['name'];
            $flag_ok = true;

            //check đuôi

            $file_type = strtolower(pathinfo($file_path2, PATHINFO_EXTENSION));
            //echo $file_type;
            $ex = array('DOCX', 'DOC', 'PDF', 'pdf', 'docx', 'doc');
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


            $now = DATE('Y:m:d H:i:s');
            $sql = "UPDATE products SET  product_download='" . $download . "' WHERE `id` = " . $_GET['id'];
            if ($result = mysqli_query($con, $sql)) {
            }
        } else {
            $now = DATE('Y:m:d H:i:s');
            $sql = "UPDATE products SET  product_download='" . $info['product_download'] . "' WHERE `id` = " . $_GET['id'];
            if ($result = mysqli_query($con, $sql)) {
            }
        }
    }
    ?>

   <!DOCTYPE html>
   <html>

   <head>
       <title>Edit Products</title>
   </head>
   <div class="container-fluid px-4">
       <h1 class="mt-4">Edit Products</h1>
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
                                       <td>Product Code</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="product_code" value="<?php echo $info['product_code'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td>Product Image</td>
                                       <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" accept=".jpg, .png, .gif" type="file" name="product_images" value="<?php echo $info['product_images'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td>For user</td>
                                       <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" accept=".docx,.pdf" type="file" name="product_download" value="<?php echo $info['product_download'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td>Name</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="name" value="<?php echo $info['name'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Price</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="price" value="<?php echo $info['price'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Color</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="color" value="<?php echo $info['color'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Brand</td>
                                       <td>
                                           <select class="form-select" name="brand_id" id="ctg">
                                               <option>select...</option>
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
                                       <td> Category</td>
                                       <td><select class="form-select" name="category_id" id="ctg">
                                               <option>select...</option>
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
                                       </td>
                                   </tr>
                                   <tr>
                                       <td> Adder</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="adder_id" value="<?php echo $info['adder_id'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Material</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="material" value="<?php echo $info['material'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Weight</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="weight" value="<?php echo $info['weight'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Height</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="height" value="<?php echo $info['height'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Length</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="length" value="<?php echo $info['length'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Width</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="width" value="<?php echo $info['width'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Made in</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="made_in" value="<?php echo $info['made_in'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td>Summary</td>
                                       <td> <input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="summary" value="<?php echo $info['summary'] ?>"></td>
                                   </tr>
                                   <tr>
                                       <td> Quantity</td>
                                       <td><input class="form-control input-group mb-3" aria-label="Default" aria-describedby="inputGroup-sizing-default" type="text" name="quantity" value="<?php echo $info['quantity'] ?>"></td>
                                   </tr>

                                   <tr>
                                       <td> <button class="btn btn-secondary" type="submit" name="update">Cập nhật</button></td>
                                   </tr>

                               </table>
                           </form>
                       </div>
                   </table>
               </div>
           </center>
       </div>
   </div>





   </body>

   </html>