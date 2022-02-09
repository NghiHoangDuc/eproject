<?php
include 'libs/database.php';
$con = db_connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products/Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="./style.css" rel="stylesheet">
</head>

<body>
   
        <?php

        $name = $_GET['name'];

        $sql = "SELECT*FROM products WHERE category_name = '$name' ";
        $kq = $con->query($sql);
        ?>
        <center>
            <div style="clear:left">
                <a href="index1.php?option=category1&name=<?= $name ?>">
                    <p style="font-size: 30px; color:black;"><?= $name ?></p>
                </a></br>
            </div>
        </center>
     <div class="row">    
        <?php
        foreach ($kq as $v) :
            $vid = $v['id'];

        ?>
            <a style="font-size: 20px; color:black; margin-bottom:auto; margin-top: 50px; margin-left: 10px;" href="index1.php?option=detail&id=<?= $vid ?>">
                <div class="col-3">
                    <img style="height:200px; width:200px; margin-top: 20px; margin-left: 10px;" src="<?= $v['product_images'] ?>" alt="img">
                    <p><?= $v['name'] ?></p>
                </div>
            </a>
        <?php
        endforeach;
        ?>
    </div>
</body>

</html>