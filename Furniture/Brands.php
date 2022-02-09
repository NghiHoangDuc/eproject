
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand</title>
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
<center><p style = "font-size: 60px;">Brands available in store</p></center>
<div class="row">
<?php
$sql = "SELECT * FROM brands";
$kq = $con -> query($sql);
foreach ($kq as $v) :
?>
   <a  style="font-size: 20px; color:black; margin-bottom:50px; margin-left: 150px;" href = "index1.php?option=brand1&name=<?= $v['name'] ?>" class="col-3">
      <div class="col-3" >
         <img style="height:180px; width:180px; " src="<?= $v['logo'] ?>" alt="img">
         
      </div>
     <p><?= $v['name'] ?></p>
   </a>
<?php
endforeach;
?>
 </div>
</body>
</html>