<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptorium - Library Management</title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
    <div class="sidebar">
        <span>SCRIPTORIUM <br><small>A LIBRARY MANAGEMENT SYSTEM</small></span>
         </div>
    
    
    <div class="background"></div>
    <div id="welcome-page" class="container" onclick="showRoles()" >
        <div class="welcome-content">
        <p><img class="logo" src="/images/logo (3).svg" alt="logo"></p>
        </div>
    </div>
    <div class="motto-container">
        <blockquote class="motto">
            Within these shelves lies the wisdom of ages 
            <br>Where every page whispers knowledge, and every book is a doorway to endless discovery.
        </blockquote>
    </div>
    <div class="footer-container">
        <footer>
            <p>&copy; 2025 Scriptorium Library. All Rights Reserved.</p>
        </footer>
    </div>


    <div id="role-page" class="container hidden"  id="role-container">
        <div class="role-content"> 
        <h2>Select Role</h2>
        <div class="role-selection">
            <div class="role-box" onclick="redirectTo('Admin-Login.php')">
                <p><img class="admin" src="/images/Group 3.svg" alt="admin"></p>
                <h3>ADMIN</h3>
            </div>
            
            <div class="role-box" onclick="redirectTo('Member-Login.php')">
                <p><img class="Member" src="/images/🦆 icon _group students_.svg" alt="Member"></p>
                <h3>STUDENT</h3>
            </div>
        </div>
    </div>
    


    <script>
        function showRoles() {
        document.getElementById('welcome-page').classList.add('hidden');
        document.getElementById('role-page').classList.remove('hidden');
    }

        function showLogin() {
            document.getElementById('welcome-page').classList.add('hidden');
            document.getElementById('role-page').classList.remove('hidden');
        }
    
    </script>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>

</body>

</html>