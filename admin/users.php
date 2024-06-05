<?php include 'include/config.php'; ?>

<?php include "dheader.php";?>
    <div class="container" >
        <h2>Add Users </h2>
    <table class="table table-condensed">
    <thead>
      <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Usernam</th>
        <th>img</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
            $sql="SELECT * FROM users";
            $result=mysqli_query($conn,$sql);
            $no=1;
            while($row=mysqli_fetch_assoc($result)){
                echo
                "<tr>
                    <td>".$no++."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['username']."</td>
                    <td><img src='img/".$row['img']."' width='100px' height='100px' style='border-radius: 50%'></td>
                    <td><a href='updateusers.php?id=".$row['id']."' class='btn btn-primary'>update</a> <a href='deleteusers.php?id=".$row['id']."'  class='btn btn-danger'>delete</a></td>
                </tr>";
            }
      ?>
    </tbody>
    </table>


<div class="col-md-6 col-md-offset-4 ">
<a href="addusers.php" class="btn btn-success">add user</a>
</div>



</body>
</html>
