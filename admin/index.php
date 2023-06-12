<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Admin dashboard</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
    .logo{
        width:60px;
        height:60px;
        object-fit: contain;
    }
    
        </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar nav-expand-lg">
            <div class="container-fluid ">
                <div>
                    <img src="../assets/imgs/logo.png" class="logo" >
                    <span style="font-weight: 800; color:rgb(74, 24, 121);">.Victory</span>
                </div>

                <nav class="navbar nav-expand-lg mx-3 text-center">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="" class="nav-link text-light" style= "font-weight:800"> Welcome guest</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <div class="container-fluid text-center bg-secondary text-light p-3">
    <i class="fa-solid fa-gear"></i> Manage details 
    </div>
    <div class="container-fluid bg-light">
        <div class="row d-flex">
            <div class="col-md-2">
                <img src="../assets/imgs/admin.jpg" style ="width:80px; height:80px"alt=""><p> Admin Name</p>
            </div>
            <div class="col-md-10 p-4 ">
                <ul class ="d-flex" style="list-style:none; gap:0.5em ;">
                    <li ><a class = "text-decoration-none text-secondary" href="index.php?insert_categories" >Insert categories</a></li>
                    <li ><a class = "text-decoration-none text-secondary" href="" >View categories</a></li>
                    <li ><a class = "text-decoration-none text-secondary" href="insert_product.php" >Insert products</a></li>
                    <li ><a class = "text-decoration-none text-secondary" href="" >View products</a></li>
                    <li ><a class = "text-decoration-none text-secondary" href="index.php?insert_brands" >Insert Brands</a></li>
                    <li ><a class = "text-decoration-none text-secondary" href="" >View Brands</a></li>
                </ul>
         
            </div>
        </div>
    </div>
    <div class="container-fluid p-4">
        <?php
        if(isset($_GET["insert_categories"]))
        {
            include("insert_categories.php");
        }
        if(isset($_GET["insert_brands"]))
        {
            include("insert_brands.php");
        }

         ?>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
 
</body>
</html>