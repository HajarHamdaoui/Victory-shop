<!DOCTYPE html>
<?php
include("../functions/cummon_functions.php");
include("../includes/connect.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container-fluid m-3">
        <h4 class="text-center">
            Registration Form
        </h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">username : </label>
                <input type="text" name="username" id="username" class= "form-control" placeholder="enter your username ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">email : </label>
                <input type="text" name="email" id="product_title" class= "form-control" placeholder="enter your email ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">image  </label>
                <input type="file" name="userimage" id="userimage" class= "form-control" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">password  </label>
                <input type="password" name="password" id="password" class= "form-control" autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Confirm password  </label>
                <input type="password" name="password_confirm" id="password" class= "form-control" autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">phone number  </label>
                <input type="text" name="phonenumber" id="phonenumber" class= "form-control" placeholder="enter your phone number ..." required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">address  </label>
                <input type="text" name="address" id="address" class= "form-control" placeholder="enter your address ..." required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto d-flex justify-content-center align-items-center">
                <input class ="w-50 m-auto" type="submit" value ="submit" name="submit">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                already have an account ? <a class = "text-decoration-none" href="login.php"> <strong> log in </strong></a>

            </div>
        </div>
    </div>
    <?php


    if(isset($_POST["submit"]))
    {   
        $name=$_POST["username"];
        $email=$_POST["email"];
        $ip_address=getIPAddress();
        $image=$_FILES["userimage"]["name"];
        $image_tmp=$_FILES["userimage"]["tmp_name"];
        $password=$_POST["password"];
        $hash_password=password_hash($password,PASSWORD_DEFAULT);
        $password_confirm=$_POST["password_confirm"];
        $phonenumber=$_POST["phonenumber"];
        $address=$_POST["address"];
        $select_query="select * from `user` where username='".$name."' or user_email='".$email."'";
        $result_select=mysqli_query($connect,$select_query);
        $rows_num=mysqli_num_rows($result_select);
        if($rows_num>0)
        {
            echo "<script>alert('username or email already exist')</script>";  
        }
        else if($password!=$password_confirm)
        {
            echo "<script>alert('password doesn't match ')</script>";
        }

        else{

            move_uploaded_file($image_tmp,"../assets/imgs/userImages/$image");
            $insert_query="insert into `user` (username, user_password, user_email, user_ip, user_image, user_address, user_mobile) values ('$name','$hash_password','$email','$ip_address','$image','$address','$phonenumber') ";
            $result_insert=mysqli_query($connect,$insert_query);
        }
        $select_cart_items="select * from `card` where ip_address='".$ip_address."'";
        $select_result=mysqli_query($connect,$select_cart_items);
        if(mysqli_num_rows($select_result)>0)
        {
            $_SESSION['username']=$name;
            echo "<script>window.open('../checkout.php','_self')</script>";
        }
        else{
            echo "<script>window.open('../index.php','_self')</script>";

            
        }


    }


     ?>

    
</body>
</html>