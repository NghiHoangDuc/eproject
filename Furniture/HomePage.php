<?php
$con = mysqli_connect('localhost', 'root', '', 'eproject_furniture');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
    <div class="fullwidthabanner; carousel-inner;" id="banner">
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/anh1.png" style=" height: 800px;">
                    <div class="carousel-caption">
                        <!-- <h1 class="display-2">WELCOME TO MISS NGAN PANDA ENGLISH CLASS</h1> -->
                        <!-- <h3>Beautifying your home is our honor</h3> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/anh2.jpg" style="width: 100%; height: 800px;">
                    <div class="carousel-caption">
                        <!-- <h1 class="display-2">Equipping for a comfortable life</h1>
                        <h3>The true value of beauty - beauty must be durable, eye-catching and optimal</h3> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/color2.jpg" style="width: 100%; height: 900px;">
                    <div class="carousel-caption">
                        <h1 class="display-2">When living space is a work of art</h1>
                      

                    </div>
                </div>
            </div>
        </div>
    </div>
    </br></br></br>
    <center>
        <p style="font-size: 60px;">NEW PRODUCTS </p>
    </center>
    </br></br></br>


    <div class="row">
        <?php
        $sql = "SELECT*FROM products LIMIT 20";
        $kq = $con->query($sql);
        foreach ($kq as $v) : 
            $vid = $v['id'];
        ?>

            <a style="font-size: 25px; color:black; margin-bottom:auto;" href="index1.php?option=detail&id=<?= $vid ?>">
                <div class="col-3">
                    <img style="height:300px; width:300px; margin-left:46px ;" src="<?= $v['product_images'] ?>" alt="img">
                </div>


                <center>
                    <p><?= $v['name'] ?></p>
                </center>

            </a>

        <?php
        endforeach;
        ?>
    </div>

</body>

</html>