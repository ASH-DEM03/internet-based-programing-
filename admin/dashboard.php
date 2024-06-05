<?php include 'include/config.php'; ?>

<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];


$sql = "SELECT name,img FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = strtoupper($row['name']);
$photo = $row['img'];
?>

<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit(); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">

    <title></title>
</head>
<body>
    <div class="menu">
        <ul>
            <li class="profile">
                <div class="img">
                    <img src="img/<?php echo $photo ?>">
                </div>
                <h2><?php echo $name;?></h2>
            </li>
            <li>
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <p>Dashbord</p>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class="fas fa-user-group"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="products.php">
                    <i class="fas fa-table"></i>
                    <p>Products</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <p>Settings</p>
                </a>
            </li>
            <li class="log-out">
                <form action="#" method="post">
                    <button type="submit" name="logout">  <i class="fas fa-sign-out"></i></button>
                </form>
           

            </li>
            
        </ul>
    </div>


    <div class="welcome">
<h3>WELCOME <?php echo $name;?></h3>
</div>  