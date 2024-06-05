<?php include "dheader.php";?>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM products WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

?>

<?php
if(isset($_POST['update'])){
    $pname=$_POST['pname'];
    $desc=$_POST['desc'];
    $price=$_POST['pprice'];
    $qunity=$_POST['pqunity'];
    $filename=$_FILES['img']['name'];
    $tempname=$_FILES['img']['tmp_name'];
    $upload="img/".$filename;
    move_uploaded_file($tempname,$upload);
    $query="UPDATE products SET pname='$pname',description='$desc',pprice='$price',pimg='$filename',pqunity='$qunity' WHERE id='$id'";
    $result1=mysqli_query($conn,$query);
     if(!$result1){
      echo "error".mysqli_error($conn);
     }
     else{
      header("location:users.php");
     }
}

?>

<div class="col-md-6  col-md-offset-3">
    <h2>Add Products</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pname">Products Name:</label>
    <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $row['pname']?>">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
    <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row['description']?>">
  </div>
  <div class="form-group">
    <label for="pprice">Price:</label>
    <input type="text" class="form-control" id="pprice" name="pprice" value="<?php echo $row['pprice']?>">
  </div>
  <div class="form-group">
    <label for="img">Imge:</label>
    <input type="file" class="form-control" id="img" name="img" value="<?php echo $row['pimg']?>">
  </div>
  <div class="form-group">
    <label for="pqunity">Quantity:</label>
    <input type="text" class="form-control" id="pqunity" name="pqunity" value="<?php echo $row['pqunity']?>">
  </div>
  <button type="submit" class="btn btn-block btn btn-success" style="color:white" name="submit">Submit</button>
</form>


</div>