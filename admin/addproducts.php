<?php include "dheader.php";?>

<?php
if(isset($_POST['submit'])){
  $pname=$_POST['pname'];
  $desc=$_POST['desc'];
  $price=$_POST['pprice'];
  $qunity=$_POST['pqunity'];
  $filename=$_FILES['img']['name'];
  $tempname=$_FILES['img']['tmp_name'];
  $upload="img/".$filename;
  move_uploaded_file($tempname,$upload);
  $query="INSERT INTO products (pname,description,pprice,pimg,pqunity) VALUES ('$pname','$desc','$price','$filename','$qunity')";
  $result1=mysqli_query($conn,$query);
   if(!$result1){
    echo "error".mysqli_error($conn);
   }
   else{
    header("location:adminproducts.php");
   }
}
?>
<div class="col-md-6  col-md-offset-3">
    <h2>Add Products</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pname">Products Name:</label>
    <input type="text" class="form-control" id="pname" name="pname">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
    <input type="text" class="form-control" id="desc" name="desc">
  </div>
  <div class="form-group">
    <label for="pprice">Price:</label>
    <input type="text" class="form-control" id="pprice" name="pprice">
  </div>
  <div class="form-group">
    <label for="img">Imge:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="form-group">
    <label for="pqunity">Quantity:</label>
    <input type="text" class="form-control" id="pqunity" name="pqunity">
  </div>
  <button type="submit" class="btn btn-block btn btn-success" style="color:white" name="submit">Submit</button>
</form>


</div>
</body>
</html>