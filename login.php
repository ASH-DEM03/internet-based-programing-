<?php include "include/config.php";?>

<?php 
session_start();
if (isset($_SESSION['email'])) {
    header("Location:dashboard.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
	<title>Login</title>
    <style>
        body{
            width: 100%;
            height:100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .btn-back{
            position:absolute;
            left: 200px;
            bottom: 100px;
        }
        .btn-back a{
            display:inline-block;
            width: 100px;
        }
       
    </style>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

	$email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);
		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['email'] = $email;
			header("Location:dashboard.php"); 
			exit();
		} else {
			echo "<script>alert('Invalid username or password. Please try again.');</script>";
		}
}
?>

	<div class="all">
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
			<form action="" method="post">
            <label for="email">
                <span>Email</span>
                <input type="email" name="email" id="email">
            </label>
            <label for="password">
                <span>Password</span>
                <input type="password" name="password" id="passowrd">
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit" name="submit">Sign In</button>
			</form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <label>
                    <span>Full Name</span>
                    <input type="text" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" />
                </label>
                <label>
                    <span>Phone</span>
                    <input type="text" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" />
                </label>
                <button type="button" class="submit">Sign Up</button>
                
            </div>
        </div>
        
    </div>
    
</div>

<div class="btn-back">
    <a href="index.php" class="btn btn-primary">back</a>
</div>
    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>