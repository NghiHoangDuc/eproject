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
   <title>Category</title>
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
  
      <center>
         <p style="font-size: 60px;">Brands available in store</p>
      </center>
      <?php
      $sql = "SELECT * FROM categories";
      $kq = $con->query($sql);
      foreach ($kq as $v) :
         $vname = $v['name'];
         $sql1 = "SELECT * FROM products WHERE category_name = '$vname' LIMIT 8";
         $kqsql1 = $con->query($sql1);
      ?>
         <center>
            <div style="clear:left">
               <a href="index1.php?option=category1&name=<?= $vname ?>">
                  <p style="font-size: 30px; color:black;"><?= $vname ?></p>
               </a></br>
            </div>
         </center>
         <?php
         foreach ($kqsql1 as $c) :
            $cid = $c['id'];
            $cname = $c['name'];
            $cimg = $c['product_images'];

         ?>



            <a href="index1.php?option=detail&id=<?= $cid ?>">


               <div style="float:left;  " class="col-3">
                  <img style="height:200px; width:200px; margin-top: 20px; margin-left: 10px;" src="<?= $cimg ?>">
                  <p style="font-size: 20px; color:black; font-family: 'Overpass', sans-serif; margin-left: 60px; "> <?= $cname ?> </p>

               </div>

            </a>


      <?php

         endforeach;
      endforeach;
      ?>
   
</body>

</html>