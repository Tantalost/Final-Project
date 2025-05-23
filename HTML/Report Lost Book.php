<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Lost Book</title>
    <link rel="stylesheet" href="/CSS/report lost book.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Sidebar (Structure from Damage Book, Styles adapted) -->
    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <!-- Replace with your actual logo path -->
            <img class="logo" src="/images/logo (3).svg" alt="Library Logo">
        </div>

        <nav class="menu">
            <a href="Member-Homepage.php">
                <!-- Replace with actual icon path -->
                <img src="/images/Home.svg" alt="Home Icon">
                <span>Home</span>
            </a>
             <a href="Searchpage.php">
                 <!-- Replace with actual icon path -->
                <img src="/images/Search.svg" alt="Search Icon">
                <span>Search</span>
            </a>
            <!-- Assuming "My Shelf" is the active page -->
            <a href="Myshelf.php" class="active">
                 <!-- Replace with actual icon path -->
                <img src="/images/Myshelf.svg" alt="My Shelf Icon">
                <span>My Shelf</span>
            </a>
        </nav>

        <nav class="footer-sidebar">
            <a href="#">About</a>
            <a href="#">Support</a>
            <a href="#">Terms & condition</a>
        </nav>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="main-content">
        <!-- Topbar (Structure from Damage Book, Styles adapted) -->
        <header class="topbar">
            <div class="topbar-left">
                <!-- Hamburger menu toggle - kept for consistency but hidden via CSS if not in design -->
                <button id="menu-toggle" class="menu-toggle">
                    <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
                </button>
                <div class="profile">
                    <!-- Replace with actual profile icon path -->
                    <img src="/images/Profile.svg" alt="User">
                    <div>
                        BARBIE SANTOS <br>
                        <span>Student</span>
                    </div>
                </div>
            </div>

            <div class="logout">
                <button class="menu-button">
                    <!-- Replace with actual logout icon path -->
                    <img class="logout-icon" src="/images/logout_vector.svg" alt="Logout">
                </button>
                 <!-- Optional: Dropdown menu (structure from Damage Book) -->
                 <!-- You might not need this exact dropdown if the logout icon just logs out -->
                <div class="dropdown-menu">
                    <div class="menu-item">
                        <img src="/images/Profile (2).svg" alt="Profile">
                        <span>Profile</span>
                    </div>
                    <div class="menu-item">
                        <img src="/images/accountsett.svg" alt="Account Settings">
                        <span>Account Settings</span>
                    </div>
                    <div class="menu-item">
                        <img src="/images/languageicon.svg" alt="Language">
                        <span>Language</span>
                    </div>
                    <div class="menu-item">
                        <img src="/images/darktheme.svg" alt="Dark Theme">
                        <span>Dark Theme</span>
                    </div>
                    
                    <div class="menu-item logout-option">
                        <img src="/images/logout_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Specific Content -->
        <main class="page-specific-content">
            <div class="content-wrapper">
                <div class="form-section">
                    <div class="page-header">
                        <button class="back-button" aria-label="Go back">
                            <!-- Replace with actual back arrow icon path -->
                            <a href="Member-Homepage.php">
                                <img src="/images/backbtn.svg" class="back-button">
                            </a>
                        </button>
                        <h1>Report a Lost Book</h1>
                    </div>

                    <div class="form-container">
                        <form id="lost-book-form">
                            <div class="form-group">
                                <label for="book-name">Name of the Book:</label>
                                <input type="text" id="book-name" name="book-name" placeholder="Input here">
                            </div>

                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" id="author" name="author" placeholder="Input here">
                            </div>

                            <div class="form-group static-info">
                                <label>Book ID or ISBN:</label>
                                <span class="isbn-value">978-0-7475-3269-9</span>
                            </div>

                            <div class="form-group">
                                <label>Date Borrowed</label>
                                <div class="date-select-group">
                                    <select id="borrow-day" name="borrow-day" aria-label="Borrow Day">
                                        <option value="03">03</option>
                                        <!-- Add other days -->
                                    </select>
                                    <select id="borrow-month" name="borrow-month" aria-label="Borrow Month">
                                        <option value="03">03</option>
                                        <!-- Add other months -->
                                    </select>
                                    <select id="borrow-year" name="borrow-year" aria-label="Borrow Year">
                                        <option value="2024">2024</option>
                                        <!-- Add other years -->
                                    </select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label>Due Date</label>
                                <div class="date-select-group">
                                    <select id="due-day" name="due-day" aria-label="Due Day">
                                        <option value="04">04</option>
                                        <!-- Add other days -->
                                    </select>
                                    <select id="due-month" name="due-month" aria-label="Due Month">
                                        <option value="03">03</option>
                                        <!-- Add other months -->
                                    </select>
                                    <select id="due-year" name="due-year" aria-label="Due Year">
                                        <option value="2024">2024</option>
                                        <!-- Add other years -->
                                    </select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label>Date Lost</label>
                                <div class="date-select-group">
                                    <select id="lost-day" name="lost-day" aria-label="Lost Day">
                                        <option value="04">04</option>
                                        <!-- Add other days -->
                                    </select>
                                    <select id="lost-month" name="lost-month" aria-label="Lost Month">
                                        <option value="03">03</option>
                                        <!-- Add other months -->
                                    </select>
                                    <select id="lost-year" name="lost-year" aria-label="Lost Year">
                                        <option value="2024">2024</option>
                                        <!-- Add other years -->
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="circumstances">Circumstances of Loss:</label>
                                <textarea id="circumstances" name="circumstances" rows="3" placeholder="e.g., misplaced, stolen, etc."></textarea>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="submit-button">Submit Report</button>
                            </div>
                        </form>
                    </div>
                </div>

                <aside class="reports-section">
                    <h2>Reports</h2>
                    <div class="report-item">
                        <img src="/images/warning_vector.svg?v=1" alt="Warning" class="report-icon">
                        <p>Your report on Humpty Dumpty by Steven Holmes has been reviewed. <a href="#">View Report</a>.</p>
                    </div>
                </aside>
            </div>
        </main>
    </div>

    <!-- JavaScript for Sidebar Toggle and Dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            // Keep toggle functional if hamburger exists, otherwise it does nothing if hidden
             if (menuToggle && sidebar && mainContent) {
                 menuToggle.addEventListener('click', function() {
                     sidebar.classList.toggle('active');
                     mainContent.classList.toggle('shifted');
                 });
             }

            const menuButton = document.querySelector('.menu-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (menuButton && dropdownMenu) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('show');
                });

                document.addEventListener('click', function(event) {
                    if (menuButton && !menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.remove('show');
                    }
                });
            }
        });
    </script>

</body>
</html>