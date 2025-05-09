<?php
require_once '../db_connect.php';
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate fields
    if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Check if email already exists
            $stmt = $pdo->prepare("SELECT * FROM members WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                $error = "Email already exists";
            } else {
                // Insert into database
                $stmt = $pdo->prepare("INSERT INTO members (name, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$name, $email, $hashedPassword]);
                
                // Fetch the inserted ID and start a session
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_name'] = $name;
                
                // Redirect to the homepage
                header("Location: Member-Homepage.php");
                exit();
            }
        } catch(PDOException $e) {
            $error = "Registration failed: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Member Signup Page</title>
    <link rel="stylesheet" href="/css/signup-style.css" />
</head>
<body>
    <div class="container">
        <div style="font-family: Montserrat;  ">
            <img class="logo" src="/images/logo (3).svg"  alt="Logo">
            <h3 style="color: #ffffff; font-size: larger; margin: 0;">Welcome !</h3>
            <h2 style="color: #ffffff; font-weight: 400; font-size: medium; margin: 0;">SIGN UP</h2>
        </div>

        <?php if(isset($error)) { ?>
            <div style="color: red; margin-bottom: 10px;"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

    <form class="form" method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
        </div>

        <div class="remember-forgot">
            <label for="remember">
                <input type="checkbox" id="remember"> Remember me
            </label>
        </div>

        <button type="submit" class="btn">Sign Up</button>

    </form>

        <p>Already have an account? <a href="/html/Member-Login.php">Sign Up</a></p>
    </div>
</body>
</html>