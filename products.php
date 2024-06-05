<?php include "include/header.php"; ?>
<?php 
$sql="SELECT * FROM products";
$result=mysqli_query($conn, $sql);
?>
<h1 style="text-align:center">Our Products</h1>

<div class="products-container">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            echo "<img src='img/" . $row['pimg'] ."'>";
            echo "<h3>" . $row['description'] . "</h3>";
            echo "<h3>" . $row['pprice'] . "</h3>";
            echo "<form action='action.php' method='post'>";
            echo "<input type='hidden' name='pname' value='" . $row['pname'] . "'>";
            echo "<input type='hidden' name='description' value='" . $row['description'] . "'>";
            echo "<input type='hidden' name='pprice' value='" . $row['pprice'] . "'>";
            echo "<input type='hidden' name='pqunity' value='1'>";
            echo "<button type='submit' class='btn btn-primary' name='add'>Add to Cart</button>";
            echo "</form>";
            echo "</div>";
        }
    }
    ?>
</div>

<?php include "include/footer.php"; ?>
