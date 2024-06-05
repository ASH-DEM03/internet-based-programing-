<?php include "include/config.php";?>
<?php
    session_start();
    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
            $myproduct=array_column($_SESSION['cart'],'product_description');
            if(in_array($_POST['description'],$myproduct)){
                echo "<script>alert('product already added');
                window.location.href='products.php';
                </script>";
            }else{
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array(
                'product_name'=>$_POST['pname'],
                'product_description'=>$_POST['description'],
                'product_price'=>$_POST['pprice'],
                'quantity'=>1,
                );
                echo "<script>alert('product has added');
                window.location.href='products.php';
                </script>";
            }
        }else{
                $_SESSION['cart'][0]=array(
                'product_name'=>$_POST['pname'],
                'product_description'=>$_POST['description'],
                'product_price'=>$_POST['pprice'],
                'quantity'=>1,
                );
                print_r($_SESSION['cart']);
                echo "<script>alert('product has added');
                window.location.href='products.php';
                </script>";
            }
    }

    if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($_POST['product_description'] == $value['product_description']){
                unset($_SESSION['cart'][$key]);
                header("Location:mycart.php");
            }
        }
    }
    ?>



