<?php include "dheader.php";?>
<?php
$id=$_GET['id'];
$sql="SELECT * FROM users WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

?>

<?php
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $filename=$_FILES['img']['name'];
    $tempname=$_FILES['img']['tmp_name'];
    $upload="img/".$filename;
    move_uploaded_file($tempname,$upload);
    $query="UPDATE users SET name='$name',email='$email',username='$username',password='$password',img='$filename' WHERE id='$id'";
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
    <h2>Add Users</h2>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Full Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']?>">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']?>">
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']?>">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']?>">
  </div><div class="form-group">
    <label for="img">Imge:</label>
    <img src="img/<?php echo $row['img'];?>" width="150 px" alt="">
    <input type="file" class="form-control" id="img" name="img" value="<?php echo $row['img']?>">
  </div>
  <button type="submit" class="btn btn-block btn btn-success" style="color:black" name="update">Update</button>
</form>