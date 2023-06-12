<!DOCTYPE html>
<?php
include("includes/connect.php");
include("functions/cummon_functions.php");
?>
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
          <a class="nav-link"  href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user/registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num()?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total : <?php total_price();?> </a>
        </li>
        
       
      </ul>

    </div>
  </div>
</nav>
<div class="row align-items-center" style="background-color:#F9F5EB; height:calc(100vh - 82px) ">
        <div class="col-md-6 p-5">
            <h1 style ="color:purple; font-weight:800">Shop with us because you’re worth it!</h1>
            <p style="color:#333">Effectuez votre premier achat via votre site ! </p>
        </div>
        <div class="col-md-6">
            <img src="assets/imgs/dropping.svg" alt="">

        </div>
    </div>