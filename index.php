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

<!-- Calling add_to_cart_function -->


<?php

add_to_cart();
?>
<!--Second child -->
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
<div class="row">
    <div class="col-md-10">
        <!--Products -->
        <div class='row'>
        <?php
        if(isset($_GET["category"]))
        {
          $select_products="select * from `products` where category_title='".$_GET['category']."'";
          $result_products=mysqli_query($connect,$select_products);
          $number_of_rows=mysqli_num_rows($result_products);
          if($number_of_rows==0)
          {
            echo "<h3 style='font-weight:800' class = 'text-center text-danger'>No products for this category </h3>
            <img class ='m-auto'style = 'width:300px ;height:300px;' src='assets/imgs/not_found.svg'>";
          }
          else {
            while($row=mysqli_fetch_assoc($result_products))
            {
              echo "
  
              <div class='col-md-4 mb-3'>
                  <div class='card ' style='display:flex;flex-direction:column;align-items:center'>
                      <img src='assets/imgs/product_imgs/".$row["product_image1"]."' class='card-img-top' >
                      <div class='card-body'>
                          <h5 class='card-title'>".$row["product_title"]."</h5>
                          <p class='card-text'>".$row["product_description"]."</p>
                          <a href='index.php?add_to_cart=".$row["product_id"]."' class='btn add-button'>add to card</a>
                          <a href='view_more_product.php?product=".$row["product_title"]."' class='btn view-button'>view more</a>
                      </div>
                  </div>
              </div>
              ";
  
            }
  

          }

        }
        else if(isset($_GET["brand"])) {
          $select_products="select * from `products` where brand_title='".$_GET['brand']."'";
          $result_products=mysqli_query($connect,$select_products);
          $number_of_rows = mysqli_num_rows($result_products);
          if($number_of_rows==0)
          {
            echo "<h3 style='font-weight:800' class = 'text-center text-danger'>No products for this brand </h3>
            <img class ='m-auto'style = 'width:300px ;height:300px;' src='assets/imgs/not_found.svg'>";
          }
          else {
            while($row=mysqli_fetch_assoc($result_products))
            {
              echo "
  
              <div class='col-md-4 mb-3'>
                  <div class='card ' style='display:flex;flex-direction:column;align-items:center'>
                      <img src='assets/imgs/product_imgs/".$row["product_image1"]."' class='card-img-top' >
                      <div class='card-body'>
                          <h5 class='card-title'>".$row["product_title"]."</h5>
                          <p class='card-text'>".$row["product_description"]."</p>
                          <a href='index.php?add_to_cart=".$row["product_id"]."' class='btn add-button'>add to card</a>
                          <a href='view_more_product.php?product=".$row["product_title"]."' class='btn view-button'>view more</a>
                      </div>
                  </div>
              </div>
              ";
  
            }
  
          }

        }
        else {
          $select_products="select * from `products` order by rand()";
          $result_products=mysqli_query($connect,$select_products);
          while($row=mysqli_fetch_assoc($result_products))
          {
            echo "

            <div class='col-md-4 mb-3'>
                <div class='card ' style='display:flex;flex-direction:column;align-items:center'>
                    <img src='assets/imgs/product_imgs/".$row["product_image1"]."' class='card-img-top' >
                    <div class='card-body'>
                        <h5 class='card-title'>".$row["product_title"]."</h5>
                        <p class='card-text'>".$row["product_description"]."</p>
                        <a href='index.php?add_to_cart=".$row["product_id"]."' class='btn add-button'>add to card</a>
                        <a href='view_more_product.php?product=".$row["product_title"]."' class='btn view-button'>view more</a>
                    </div>
                </div>
            </div>
            ";

          }

        } 




        ?> 
        </div>
 <!--End row--->
        
    
    </div>
    <div class="col-md-2 bg-secondary p-0 text-center">
            <ul class="navbar-nav me-auto ">
                <li class="navbar-item m-0 brands ">
                  <a href="" class="nav-link text-light"><h4>Brands</h4> </a>
                </li>
                <?php
                $select_brands="select * from `brands`";
                $result_brands=mysqli_query($connect,$select_brands);
                while($row = mysqli_fetch_assoc($result_brands))
                {
                    echo "
                    <li class='navbar-item m-0'>
                    <a href='index.php?brand=".$row["brand_title"]."' class='nav-link text-light'>".$row["brand_title"]."</a></li>";
                    
                }
                ?>


            </ul>
            <ul class="navbar-nav me-auto ">
                <li class="navbar-item m-0 brands ">
                  <a href="" class="nav-link text-light"><h4>Categories</h4> </a>
                </li>
                <?php
                    $categories_select="select * from `categories`";
                    $result_categories=mysqli_query($connect,$categories_select);
                    while($row = mysqli_fetch_assoc($result_categories))
                    {
                        echo "
                        <li class='navbar-item m-0'>
                    <a href='index.php?category=".$row["category_title"]."' class='nav-link text-light'>".$row['category_title']."</a>
                      </li>
                        ";
                    }
                 ?>


            </ul>
    
    
    </div>




<!-- <footer>
    All rights reserved 
</footer> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>