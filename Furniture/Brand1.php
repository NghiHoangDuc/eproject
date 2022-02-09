<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produts/Brand</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="./style.css" rel="stylesheet">
</head>
<?php
$name = $_GET['name'];
$sql = "SELECT*FROM products WHERE brand_name = '$name'  ";
$kq = $con->query($sql); ?>

<body>
    <center>
        <p style="font-size: 40px;">All products under the brand <?= $name ?> </p>
    </center>
    <div class="row">

        <?php
        foreach ($kq as $v) :
            $vid = $v['id'];

        ?>
            <div style = "margin-left: 50px;">
                <a style="font-size: 20px; color:black; margin-bottom:auto; margin-top: 50px; margin-left: 10px;" href="index1.php?option=detail&id=<?= $vid ?>">
                    <div class="col-3">
                        <img style="height:300px; width:300px; " src="<?= $v['product_images'] ?>" alt="img">

                    </div>
                    <p><?= $v['name'] ?></p>
                </a>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</body>

</html>