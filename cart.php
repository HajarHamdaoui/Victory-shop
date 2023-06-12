<?php
include("includes/connect.php");
include("functions/cummon_functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets\css\style.css" rel="stylesheet" >
    <title>Ecommerce Website</title>
    <style>
        .cart-image{
            width:80px;
            height:80px;
            object-fit:contain;
        }
        .image{
          width:300px;
          height:300px;
        }
        .my_container{
          width:100vw;
          height:calc(100vh - 76px);
          display:flex;
          flex-direction:column;
          justify-content:center;
          align-items:center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light m-0">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#"><img class="logo" src="assets\imgs\logo.png" alt=""> <span style="font-weight:800;color:purple">.VictoryShop</span> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num()?></sup></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total : <?php total_price();?> </a>
        </li>
       
      </ul>

    </div>
  </div>
</nav>


            <?php
    global $connect;
    $select_query = "select * from `card` where ip_address='".getIPAddress()."'";
    $select_result1=mysqli_query($connect,$select_query);
    while($row = mysqli_fetch_assoc($select_result1))
    {
      if(isset($_POST['update_product_id'.$row['product_id']]))
      {
        $update_query="update `card` set quantity =".$_POST['quantity_of_product_id_'.$row['product_id']]." where product_id=".$row['product_id'];
        $result_update=mysqli_query($connect,$update_query);

      }
      if(isset($_POST['delete_product_id'.$row['product_id']]))
      {
        $delete_query="delete from `card` where product_id=".$row['product_id'];
        $result_delete=mysqli_query($connect,$delete_query);
      }

    }
   
    $select_result=mysqli_query($connect,$select_query);
    $sum = 0;
    if(mysqli_num_rows($select_result)==0)
    {
      echo "
      <div class='my_container'>
      <h4 class='text-danger'> Empty cart </h4>
      <img class='image' src ='assets/imgs/empty_cart.svg'>
      <a href='index.php' class='bg-secondary text-decoration-none d-flex justify-content-center align-items-center rounded text-light px-3'>Continue Shopping</a>
      </div>
      "
      ;
    }
    else {
      echo "
      <div class='container'>
    <div class='row'>
    <form method='post' >
        <table class='table table-bordered text-center'>
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th colspan = 2>Operations</th>
                </tr>
            </thead>
            <tbody>
      ";
      while($row = mysqli_fetch_assoc($select_result)){
      
        $select_product="select * from `products` where product_id=".$row['product_id'];
        $select_product_result=mysqli_query($connect,$select_product);
        $product=mysqli_fetch_assoc($select_product_result);
        $total_price=$product['price']*$row['quantity'];
        $sum +=$total_price;
        echo "
        <tr>
        <td>".$product['product_title']."</td>
        <td><img class ='cart-image' src='assets/imgs/product_imgs/".$product['product_image1']."' alt=''></td>
        <td class ='d-flex justify-content-center align-items-center'><input type='text' name = 'quantity_of_product_id_".$product['product_id']."' class= 'form-control w-50' value=".$row['quantity']."></td>
        <td>".$total_price."</td>
        <td>
           <input type ='submit' name='update_product_id".$product["product_id"]."' class='bg-secondary rounded text-light px-3' value='update'>
           <input type = 'submit' name ='delete_product_id".$product["product_id"]."' class='bg-secondary rounded text-light px-3' value='remove'>
        </td>
        </tr>
        ";
      
   
                             
    }
    echo "
    </tbody>
    </form>
</table>
<div class='d-flex justify-content-evenly'>
    <h4>Total : <strong><?php echo $sum?></strong>dh</h4>
    <a href='index.php' class='bg-secondary text-decoration-none d-flex justify-content-center align-items-center rounded text-light px-3'>Continue Shopping</a>
    <a href='checkout.php' class='bg-secondary text-decoration-none d-flex justify-content-center align-items-center rounded text-light px-3'>Checking out</a>
</div>
</div>
    ";
    }



?>



</div>
