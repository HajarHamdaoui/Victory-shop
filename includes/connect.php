
<?php 
$connect=mysqli_connect("localhost","root","","myshop");
if(!$connect)
{
    die(my_sqli_error($connect));
}
?>