<?php include 'include/config.php'; ?>

<?php include "dheader.php";?>
    <div class="container" >
        <h2>Add Products </h2>
    <table class="table table-condensed">
    <thead>
      <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>img</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
            $sql="SELECT * FROM products";
            $result=mysqli_query($conn,$sql);
            $no=1;
            while($row=mysqli_fetch_assoc($result)){
                echo
                "<tr>
                    <td>".$no++."</td>
                    <td>".$row['pname']."</td>
                    <td>".$row['description']."</td>
                    <td>".$row['pprice']."</td>
                    <td><img src='img/".$row['pimg']."' width='150px'></td>
                    <td>".$row['pqunity']."</td>
                    <td><a href='updateproducts.php?id=".$row['id']."'  class='btn btn-primary'>update</a> <a href='deleteproducts.php?id=".$row['id']."'  class='btn btn-danger'>delete</a></td>

                </tr>";
            }
      ?>
    </tbody>
    </table>


<div class="col-md-6 col-md-offset-4 ">
<a href="addproducts.php" class="btn btn-success">add products</a>
</div>



</body>
</html>
