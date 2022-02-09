<?php
$con = mysqli_connect('localhost', 'root', '', 'eproject_furniture');
?>

<!DOCTYPE html>
<html lang="en">

<head>
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
  <LINK REL="SHORTCUT ICON" HREF="./img/furniture.png">
</head>

<body>

  <nav id="navbar" class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-branch" href="index1.php?option=home">
        <img style="margin-bottom:0px; margin-left: 0px;" class="rounded-circle" src="./img/logo.png" height="50px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#aaa">
        <span class="navbar navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="aaa">
        <ul class="nav navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" href="index1.php?option=home">Home</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="index1.php?option=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index1.php?option=brands">Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index1.php?option=category">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index1.php?option=contact_us">Contact_us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div style= "min-height:2600px">
  <?php
  session_start();
  if (isset($_GET['option'])) {
    switch ($_GET['option']) {
      case 'home':
        include 'HomePage.php';
        break;
      case 'products':
        include 'Products.php';
        break;
      case 'brands':
        include 'Brands.php';
        break;
      case 'category':
        include 'Category.php';
        break;
      case 'category1':
        include 'Category1.php';
        break;
      case 'detail':
        include 'detail.php';
        break;
      case 'brand1':
        include 'Brand1.php';
        break;
      case 'compare':
        include 'compare.php';
        break;
      case 'contact_us':
        include 'ContactUs.php';
        break;
    }
  } else {
    include 'HomePage.php';
  }
  ?>
</div>



</body>
  <footer style="background-color: black;">
    <?php
    include "./share/footer.php";
    ?>
  </footer>
</html>