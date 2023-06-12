<?php  
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}
// add to cart function 
 function add_to_cart(){
    global $connect;

    if(isset($_GET["add_to_cart"]))
    {
        $select_query="select * from `card` where product_id='".$_GET["add_to_cart"]."' and ip_address='".getIPAddress()."'";
        $result_query=mysqli_query($connect,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0)
        {
            echo "<script> alert('Product already exist in the cart')</script>";
        }
        else{
            $insert_query="insert into `card` (product_id,ip_address,quantity) values (".$_GET['add_to_cart'].",'".getIPAddress()."',1)";
            $insert_result=mysqli_query($connect,$insert_query);
            
            echo("<script>alert('Item added to cart')</script> ");

        }

        echo("<script>window.open('index.php','_self')</script>");
    }
 }

// get number of cart items 
function cart_item_num(){
    global $connect;
    $select_query="select * from `card` where ip_address='".getIPAddress()."'";
    $result_query=mysqli_query($connect,$select_query);
    $cart_items=mysqli_num_rows($result_query);
    echo($cart_items);



}
// total price 
function total_price(){
    global $connect;
    $ip_address=getIPAddress();
    $cart_query="select * from `card` where ip_address='$ip_address'";
    $result_cart=mysqli_query($connect,$cart_query);
    $prices=[];
    while($row=mysqli_fetch_array($result_cart)){
        $product_id = $row["product_id"];
        $product_query="select * from `products` where product_id=$product_id";
        $result_product=mysqli_query($connect,$product_query);
        $product_row=mysqli_fetch_assoc($result_product);
        array_push($prices,$product_row["price"]);
    }
    $total = array_sum($prices);
    echo $total."dh";
   
}
?>