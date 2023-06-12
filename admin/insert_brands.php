<?php
include("../includes/connect.php") ;
if(isset($_POST["insert_brands"]))

{
    $brand_title=$_POST["brand_title"];
    if(empty($brand_title)){
        echo "<script> alert('Type a valid name') </script>";
    }
    else {
        $select_query="select * from `brands` where brand_title='$brand_title' ";
        $result_select=mysqli_query($connect,$select_query);
    
        if(mysqli_num_rows($result_select)>0){
            echo "<script> alert('brand already exists ') </script>";
        }
        else {
            $insert_query="insert into `brands`(brand_title) values ('$brand_title')";
            $result=mysqli_query($connect,$insert_query);
            
            if($result)
            {
                echo "<script> alert(`brand {$_POST["brand_title"]} has been added successufully`) </script>";
            }
        
        }
    }


}
?>
<form action="" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-plus"></i></span>
        <input type="text" class="form-control" placeholder="insert brands"  name = "brand_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <input type="submit" class="form-control bg-secondary text-light border-0" style = "font-weight:800" value="insert brands" name ="insert_brands"  aria-describedby="basic-addon1">
    </div>
</form>