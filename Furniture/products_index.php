<!DOCTYPE html>
<html>
<head> 
<title>Display Products</title>
</head>
<body>      
<div class="container-fluid px-4">
                        <h1 class="mt-4">Products Management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>   
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Display products area
                           &nbsp; &nbsp; &nbsp;
                           
                            </div>
                            </div>
                            <table id="datatablesSimple" border="1" width="100%">
                           
                               
                                <form method="post" name="f2" >
                                <div class="Login">
        <table class="table table-striped" id="datatable">
                
                <tr role="row">
                    <th>STT</th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>category</th>
                    <th>Adder</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Material</th>
                    <th>Weight</th>
                    <th>Length</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Made in</th>
                    <th>Summary</th>
                    <th>Quantity</th>               
                    <th>Edit</th> 
                             
                
                    
                </tr>
               
            <?php 
        include "libs/database.php";
   $con = db_connect();
  
    $sql="SELECT * FROM products ";   
    $result=mysqli_query($con,$sql);
    $i = 1;

    while ($row=mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
             $html = '';
             foreach ($data as $value) {
                 $html .= '
                 <tr role="row">
                 <td>'.$i.   '</td>
                     <td>'.$value['product_code'].'</td>
                     <td><img style="height:100px" src="'.$value['product_images'].'"></td>
                     <td>'.$value['brand_name'].'</td> 
                     <td>'.$value['category_name'].'</td>
                     <td>'.$value['adder_id'].'</td>
                     <td>'.$value['name'].'</td>
                     <td>'.$value['price'].' </td>
                     <td>'.$value['color'].' </td>
                     <td>'.$value['material'].' </td>
                     <td>'.$value['weight'].' </td>
                     <td>'.$value['length'].' </td>
                     <td>'.$value['width'].' </td>
                     <td>'.$value['height'].' </td>
                     <td>'.$value['made_in'].' </td>
                     <td>'.$value['summary'].' </td>
                     <td>'.$value['quantity'].' </td>
            
                       <td><a href="html.php?option=products_edit&id='.$value['id'].'">Edit</a>|
                       <a href = "products_delete.php?id='.$value['id'].'"> Delete</a></td>
                       
                       
                 </tr>';
                 $i++;
             }
            
        echo $html;
             ?>
</table>
</form>
</div>   


</body>
</html>
