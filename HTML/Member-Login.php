<?php
require_once '../db_connect.php';
require_once "user_operations.php";
session_start();

if (isset($_SESSION['member_id'])) {
    header("Location: Member-Homepage.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($identifier) || empty($password)) {
        $error = 'Please enter your name/email and password';
    } else {
        $result = $memberOps->authenticateMember($identifier, $password);
        if ($result['status'] === 'success') {
            header("Location: Member-Homepage.php");
            exit();
        } else {
            $error = $result['message'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Member Login Page</title>
    <link rel="stylesheet" href="/css/signup-style.css" />
</head>
<body>
    <div class="container">
        <div style="font-family: Montserrat;">
            <img class="logo" src="/images/logo (3).svg" alt="Logo">
            <h3 style="color: #ffffff; font-size: larger; margin: 0;">Welcome Back!</h3>
            <h2 style="color: #ffffff; font-weight: 400; font-size: medium; margin: 0;">LOGIN</h2>
        </div>

        <?php if($error): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form class="form" method="POST" action="">
            <div class="form-group">
                <label for="identifier">Name or Email</label>
                <input type="text" id="identifier" name="identifier" placeholder="Enter your name or email" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />
            </div>

            <div class="remember-forgot">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember"> Remember me
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <p>Don't have an account? <a href="Member-SignUp.php">Sign Up</a></p>
    </div>
</body>
</html>