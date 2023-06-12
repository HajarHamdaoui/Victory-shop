<?php
include("../includes/connect.php") ?>
<?php 
if(isset($_POST['submit'])){
    $product_title=$_POST["product_title"];
    $product_description=$_POST["product_description"];
    $product_keywords=$_POST["product_keywords"];
    $product_category=$_POST["product_category"];
    $product_brand=$_POST["product_brand"];
    $product_image1=$_FILES['product_image1']["name"];
    $product_image2=$_FILES["product_image2"]["name"];
    $product_image3=$_FILES["product_image3"]["name"];
    $product_image1_tmp=$_FILES["product_image1"]["tmp_name"];
    $product_image2_tmp=$_FILES["product_image2"]["tmp_name"];
    $product_image3_tmp=$_FILES["product_image3"]["tmp_name"];
    $product_price=$_POST["product_price"];
    $product_status='true';
    if(empty($product_title)or empty($product_description)or empty($product_keywords)or empty($product_category)or empty($product_brand)or empty($product_image1)or empty($product_image2)or empty($product_image3)or empty($product_price))
    {
        echo "<script>alert('Please fill all the data ')</script>";
    } else{
        move_uploaded_file($product_image1_tmp,"../assets/imgs/product_imgs/$product_image1");
        move_uploaded_file($product_image2_tmp,"../assets/imgs/product_imgs/$product_image2");
        move_uploaded_file($product_image3_tmp,"../assets/imgs/product_imgs/$product_image3");


        $insert_products="insert into `products` (product_title,product_description,product_keywords,category_title,brand_title,product_image1,product_image2,product_image3,price,date,state) values ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $insert_result=mysqli_query($connect,$insert_products);
        if($insert_result){
            echo "<script>alert('Product added successfully')</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets\css\style.css" rel="stylesheet" >

</head>
<body class= "bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product title </label>
                <input type="text" name="product_title" id="product_title" class= "form-control" placeholder="enter product title ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product description </label>
                <input type="text" name="product_description" id="product_description" class= "form-control" placeholder="enter a description for your product ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product keywords  </label>
                <input type="text" name="product_keywords" id="product_keywords" class= "form-control" placeholder="enter keywords for your product ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="product_category" class="form-select">
                    <?php
                     $select_categories= "select * from `categories`";
                     $result_categories= mysqli_query($connect,$select_categories);
                     while($row =mysqli_fetch_assoc($result_categories))
                     {
                        echo "<option value='".$row['category_title']."'>".$row['category_title']."</option>";
                     }
                    ?>
                    
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="product_brand" class="form-select">
                    <?php
                     $select_brands= "select * from `brands`";
                     $result_brands= mysqli_query($connect,$select_brands);
                     while($row =mysqli_fetch_assoc($result_brands))
                     {
                        echo "<option value='".$row['brand_title']."'>".$row['brand_title']."</option>";
                     }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product image 1  </label>
                <input type="file" name="product_image1" id="product_image1" class= "form-control" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product image 2  </label>
                <input type="file" name="product_image2" id="product_image2" class= "form-control" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product image 3  </label>
                <input type="file" name="product_image3" id="product_image3" class= "form-control" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Product price  </label>
                <input type="text" name="product_price" id="product_price" class= "form-control" placeholder="enter the price of your product ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input class= "bg-secondary w-100 text-light p-2 " style = "font-weight:800; font-size:20px" type="submit" name="submit" id="submit" value = "submit" class= "form-control" >  
            </div>
            



        </form>

    </div>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
    
</body>
</html>