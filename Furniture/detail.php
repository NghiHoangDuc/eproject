<?php
$con = mysqli_connect('localhost', 'root', '', 'eproject_furniture');
$id = $_GET['id'];

$sql = "SELECT*FROM products WHERE id='$id'";
$kq = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="stylee.css" rel="stylesheet">
</head>
<center>
    <p style="font-size: 60px;">Product details </p>
</center>

<body>



        <ul style="float: left; margin-top: 155px; margin-left: 400px; margin-top: 120px;font-size: 25px; ">
            <?php
            foreach ($kq as $v) :
        
                
                   
                
                                    echo "<li>Product code: " . $v['product_code'] . " </li>";
                                    echo "<li>Name: " . $v['name'] . "</li>";
                                    echo "<li>Brand name: " . $v['brand_name'] . " </li>";
                                    echo "<li>Category name: " . $v['category_name'] . " </li>";
                                    echo "<li>Price: " . $v['price'] . " VND </li>";
                                    echo "<li>Height: " . $v['height'] . " mm </li>";
                                    echo "<li>Width: " . $v['width'] . " mm </li>";
                                    echo "<li>Length: " . $v['length'] . " mm </li>";
                                    echo "<li>Weight: " . $v['weight'] . " kg</li>";
                                    echo "<li>Material: " . $v['material'] . " </li>";
                                    echo "<li>Color: " . $v['color'] . " </li>";
                                    echo "<li>Quantity: " . $v['quantity'] . " </li>";


                                endforeach;

                                    ?> 
                        <img style="height: 300px; margin-top: 120px; " src="<?= $v['product_images']  ?>">
               
        </ul>
  
    <a href="<?= $v['product_download'] ?>" download><button class="btn"><i class="fa fa-download"></i> Download info </button></a>

</body>

</html>