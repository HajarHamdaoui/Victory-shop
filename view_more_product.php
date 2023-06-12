<?php
session_start();
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
      body{
        overflow-x:hidden;
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
          <a class="nav-link"  href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num()?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total : <?php total_price();?> </a>
        </li>
        
       
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" name="search_input" type="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-secondary" type="submit" name="search_product" value="search"></input>
      </form>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-2 px-3">
    <ul class ="navbar-nav ">

        <?php 
        if(isset($_SESSION['username'])){
          echo "
          <li class='nav-item'>
          <a href='' class='nav-link'>Welcome ".$_SESSION['username']."</a>
          </li> 
          <li class='nav-item'>
          <a href='user/logout.php' class='nav-link'>Logout</a>
          </li>  ";
        }
        else{
          echo "
          <li class='nav-item'>
          <a href='' class='nav-link'>Welcome guest </a>
          </li>  
          <li class='nav-item'>
          <a href='user/login.php' class='nav-link'>Login</a>
          </li>  ";

        }
        ?>
      
    </ul>
</nav>

<?php
$select_images= "select * from `products` where product_title='".$_GET['product']."'";
$images_result=mysqli_query($connect,$select_images);
$product_result=mysqli_fetch_assoc($images_result);
echo "
<div class = 'row'>
    <div class='col-md-6'>
        <div class='card align-items-center m-3' >
            <img src='assets/imgs/product_imgs/".$product_result['product_image1']."']' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>".$product_result['product_title']."</h5>
                <p class='card-text'>".$product_result['product_description']."</p>
                <p class = 'card-text'><i class='fa-solid fa-hand-holding-dollar' ></i> Price :".$product_result['price']." dh </p>
            </div>
            <div class='card-body' style='height:300px;width:300px'>
                <div class='row mb-3 justify-content-between'>
                    <div class='col-md-6 border border-primary' >
                        <img style='width:100%; height:100%' src='assets/imgs/product_imgs/".$product_result['product_image2']."'>
                    </div>
                    <div class='class col-md-6 border border-primary'>
                        <img style='width:100%; height:100%' src='assets/imgs/product_imgs/".$product_result['product_image3']."' >
                    </div>
                </div>
                <a href='index.php?add_to_cart=".$product_result["product_id"]."' class='btn add-button'>add to card</a>
            </div> 

            
        </div>
    </div>
    <div class ='col-md-6'>
        <h5> Related products : </h5>
    </div>
</div>

"

?>

