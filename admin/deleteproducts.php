<?php   include "include/config.php";?>

<?php 
$id=$_GET['id'];
$sql="DELETE FROM products WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(!$result){
    echo"error";
}
else{
    header("location:adminproducts.php");
}
?>