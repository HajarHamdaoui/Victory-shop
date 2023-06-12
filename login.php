<?php
session_start();
include("../includes/connect.php"); 
include("../functions/cummon_functions.php")?>
<!DOCTYPE html>
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
            Log in  Form
        </h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">username : </label>
                <input type="text" name="username" id="username" class= "form-control" placeholder="enter your username ..." autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">password  </label>
                <input type="password" name="password" id="password" class= "form-control" autocomplete="off" required>  
            </div>
            <div class="form-outline mb-4 w-50 m-auto d-flex justify-content-center align-items-center">
                <input class ="w-50 m-auto" type="submit" value ="submit" name="submit">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                Don't have an account ? <a class = "text-decoration-none" href="registration.php"> <strong> Register</strong></a>
            </div>
        </form>
    </div>

</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $select_query="select * from `user` where username ='".$username."'";
    $result_query=mysqli_query($connect,$select_query);
    $num_rows=mysqli_num_rows($result_query);
    $row=mysqli_fetch_assoc($result_query);
    $select_cart="select * from `card` where ip_address = '".getIPAddress()."'";
    $result_cart=mysqli_query($connect,$select_cart);
    if($num_rows>0 )
    {
    if(!password_verify($password,$row["user_password"]))
    {
        echo "<script>alert('Incorrect username or password')</script>";

    }

    else{
        echo "<script>alert('login successfuly')</script>";
        $_SESSION['username']=$username;
        if(mysqli_num_rows($result_cart)==0)
        {
            echo "<script>window.open('profile.php','_self')</script>";
        }
        else{
            echo "<script>window.open('payment.php','_self')</script>";
        }

    }
}
}

?>
