<?php include "dheader.php";?>

<?php
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $filename=$_FILES['img']['name'];
  $tempname=$_FILES['img']['tmp_name'];
  $upload="img/".$filename;
  move_uploaded_file($tempname,$upload);
  $query="INSERT INTO users (name,email,username,password,img) VALUES ('$name','$email','$username','$password','$filename')";
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
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="img">Imge:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <button type="submit" class="btn btn-block btn btn-success" style="color:white" name="submit">Submit</button>
</form>


</div>
</body>
</html>