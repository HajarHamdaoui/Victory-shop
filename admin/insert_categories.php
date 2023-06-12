<?php
include("../includes/connect.php") ;
if(isset($_POST["insert_cat"]))

{
    $category_title=$_POST["category_title"];
    if(empty($category_title)){
        echo "<script> alert('Type a valid name') </script>";
    }
    else {
        $select_query="select * from `categories` where category_title='$category_title' ";
        $result_select=mysqli_query($connect,$select_query);
    
        if(mysqli_num_rows($result_select)>0){
            echo "<script> alert('category already exists ') </script>";
        }
        else {
            $insert_query="insert into `categories`(category_title) values ('$category_title')";
            $result=mysqli_query($connect,$insert_query);
            
            if($result)
            {
                echo "<script> alert(`category {$_POST["category_title"]} has been added successufully`) </script>";
            }
        
        }
    }


}
?>

<form action="" method="post">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-circle-plus"></i></span>
        <input type="text" class="form-control" placeholder="insert category"  name = "category_title" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <input type="submit" class="form-control bg-secondary text-light border-0" style = "font-weight:800"value="insert category" name="insert_cat" aria-describedby="basic-addon1">
    </div>
</form>