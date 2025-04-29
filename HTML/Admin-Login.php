<?php
session_start();
require_once '../db_connect.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            header("Location: admindash.php");
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } catch(PDOException $e) {
        $error = "Login failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="/css/login-style.css">
</head>
<body>
    <div class="container">
        <div style="font-family: Montserrat; padding: 0; margin: 0;">
            <img class="logo" src="/images/logo (3).svg"  alt="Logo">
            <h3 style="color: #0D3958; font-size: larger;">Welcome Back !</h3>
            <h2 style="color: #0D3958; font-weight: 400; font-size: medium;">LOG IN</h2>
        </div>

        <?php if(isset($error)) { ?>
            <div style="color: red; margin-bottom: 10px;"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>
        

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember-forgot">
                <label for="remember">
                    <input type="checkbox" id="remember"> Remember me
                </label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn" id="gotoadmin">Log In</button>
        </form>

        <p>Don't have an account? <a href="/html/Admin-SignUp.php">Sign Up</a></p>
    </div>
</body>
</html>
