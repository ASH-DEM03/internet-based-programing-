<?php 
include "include/header.php";
session_start();
?>
<div class="container col-sm-8 col-sm-offset-2">
    <h2>Your Products</h2>
    <br>
    <table class="table table-condensed" id="table" style="width:1000px">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $grandTotal = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    // Ensure the values are treated as numbers
                    $productPrice = floatval($value['product_price']);
                    $quantity = intval($value['quantity']);
                    $productTotal = $productPrice * $quantity;
                    $grandTotal += $productTotal;
                    echo "<tr>
                            <td>" . $no++ . "</td>
                            <td>" . htmlspecialchars($value['product_name']) . "</td>
                            <td>" . htmlspecialchars($value['product_description']) . "</td>
                            <td><input type='text' name='product_price' class='iprice form-control' value='" . htmlspecialchars(number_format($productPrice, 2)) . "' readonly></td>
                            <td><input type='number' class='iquantity form-control' value='" . htmlspecialchars($quantity) . "' min='1' onchange='subTotal()'></td>
                            <td class='itotal'>" . number_format($productTotal, 2) . "</td>
                            <td>
                                <form action='action.php' method='post'>
                                    <input type='hidden' name='product_description' value='" . htmlspecialchars($value['product_description']) . "'>
                                    <button type='submit' class='btn btn-danger' name='remove'>Remove</button>
                                </form>
                            </td>
                        </tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <div class="container col-sm-4 col-sm-offset-8" id="total">
        <h3>Total</h3>
        <h3 id="gtotal"><?php echo number_format($grandTotal, 2); ?></h3>
        <br>
            <script>
                totalinvoice=document.getElementById('gtotal').innerText;
                document.write("<a class='btn btn-success' href='test.php?x="+totalinvoice+"'>Make Purchase</a>");
            </script>
    </div>
</div>

<script>
    function subTotal() {
        let iprice = document.getElementsByClassName("iprice");
        let iquantity = document.getElementsByClassName("iquantity");
        let itotal = document.getElementsByClassName("itotal");
        let gtotal = document.getElementById("gtotal");
        let grandTotal = 0;
        
        for (let i = 0; i < iprice.length; i++) {
            let price = parseFloat(iprice[i].value.replace(/,/g, ''));
            let quantity = parseInt(iquantity[i].value);
            let total = price * quantity;
            itotal[i].innerText = total.toFixed(2);
            grandTotal += total;
        }
        
        gtotal.innerText = grandTotal.toFixed(2);
    }
    subTotal();
    
</script>
