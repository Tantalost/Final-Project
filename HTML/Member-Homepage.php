<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="/css/homepage-style.css">
</head>
<body>

    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logo.svg" alt="Logo">
        </div>

        <nav class="menu">
            <a href="/html/Member-Homepage.php" class="active">
                <img src="/images/Home.svg" width="20" height="20" alt="Home">
                <span>Home</span>
            </a>
            <a href="/HTML/Searchpage.php">
                <img src="/images/Search.svg" width="20" height="20" alt="Search">
                <span>Search</span>
            </a>
            <a href="/HTML/Myshelf.php">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="/HTML/Member-History.php">
                <img src="/images/history_vector.svg" width="20" height="20" alt="History">
                <span>History</span>
            </a>
        </nav>

        <nav class="footer-sidebar">
            <a href="#">About</a>
            <a href="#">Support</a>
            <a href="#">Terms & Conditions</a>
        </nav>
    </aside>

    <div class="main-content">
        <header class="topbar">
            
            <div class="topbar-left">
                <button id="menu-toggle" class="menu-toggle">
                    <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
                </button>
                <div class="profile">
                    <img src="/images/Profile 2.svg" alt="User">
                    <div>
                        Barbie Santos <br> 
                        <span style="font-size: 12px;">Student</span>
                    </div>
                </div>
            </div>

            <div class="logout">
                <button class="menu-button">
                    <img class="logout-icon" src="/images/LogOut_vector.svg" alt="Logout">
                </button>
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
                    <div class="menu-item logout-option" data-link="welcome.php">
                        <img src="/images/logout_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </header>




        <main class="content">
            <div class="welcome-container">
                <img src="/images/Profile 2.svg" alt="Profile" class="profile-img">
            
                <div class="welcome-text">
                    <h2>Welcome! <span>Barbie Santos</span></h2>
                    <p>Explore books, manage your borrowings, and discover something new every day.</p>
                </div>
            </div>

            <div class="dashboard">
                <div class="upper-dashboard">
                    <div class="actions-grid">
                        <a href="/html/Member-BorrowBooks.php" class="action-button">
                            <img class="action-icon" src="/images/borrow_book_vector.svg" alt="Borrow Book">
                            <div class="action-text">Borrow Book</div>
                        </a>
                        <a href="/html/Member-ReturnBooks.php" class="action-button">
                            <img class="action-icon" src="/images/return_book_vector.svg" alt="Return Book" width="50" height="50">
                            <div class="action-text">Return Book</div>
                        </a>
                        <a href="/html/Report Lost Book.php" class="action-button">
                            <img class="action-icon" src="/images/lost_book_vector.svg" alt="Report a Lost Book" width="50" height="50">
                            <div class="action-text">Report a Lost Book</div>
                        </a>
                        <a href="/html/Damage Books Rep.php" class="action-button">
                            <img class="action-icon" src="/images/damaged_book_vector.svg" alt="Report a Damaged Book" width="50" height="50">
                            <div class="action-text">Report a Damaged Book</div>
                        </a>
                    </div>
                </div>
                        
                <div class="lower-dashboard">
                    <div class="left-section">
                        <div class="stats-section">
                            <div class="stats-container">
                                <div class="stat-box">
                                    <div style="font-size: 40px; font-weight: 700;">0</div>
                                    <div style="font-size: 14px; font-weight: 400;">Borrowed Books</div>
                                </div>
                                <div class="stat-box">
                                    <div style="font-size: 40px; font-weight: 700;">0</div>
                                    <div style="font-size: 14px; font-weight: 400;">Returned Books</div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="right-section">
                        <div class="notification-container">
                            <div class="notification-header">Notifications</div>
                            <div class="notification-item">
                                <img src="/images/warning_vector.svg" alt="Overdue Notification">
                                <div class="notification-text">Humpty Dumpty has passed the due date. Click to see details.</div>
                            </div>
                            <div class="notification-item">
                                <img src="/images/due_tom_icon.svg" alt="Due Tomorrow">
                                <div class="notification-text"> The Republic is due tomorrow.</div>
                            </div>
                            <div class="notification-item">
                                <img src="/images/book_available_vector.svg" alt="Available Book">
                                <div class="notification-text">A Brief History of Time is now Available</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <h1>Unlock Worlds, Begin Reading!</h1>
            <h2>Recently Viewed</h2>

            <div class="book-container-line"></div>
            <div class="book-container">
                <div class="book"><img src="/images/image 25.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 8.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 43.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 10.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 44.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 46.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 40.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 39.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 42.svg" alt="Book" loading="lazy"></div>
            </div>

            <h2>Recommended for You</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <div class="book"><img src="/images/image 1.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 38.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 3.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 4.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 5.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 39.svg" alt="Book" loading="lazy"></div>            
                <div class="book"><img src="/images/image 41.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 45.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 48.svg" alt="Book" loading="lazy"></div>
            </div>

            <h2>Academic Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <div class="book"><img src="/images/image 7.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 4.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 20.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 19.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 21.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 26.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 53.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 54.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 55.svg" alt="Book" loading="lazy"></div>
            </div>

            <h2>Fictional Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <div class="book"><img src="/images/image 22.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 8.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 9.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 10.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 23.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 1.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 51.svg" alt="Book" loading="lazy"> </div>
                <div class="book"><img src="/images/image 52.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 50.svg" alt="Book" loading="lazy"></div>
            </div>

            <h2>Sci-Fi Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <div class="book"><img src="/images/image 29.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 30.svg" alt="Book"loading="lazy"></div>
                <div class="book"><img src="/images/image 31.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 32.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 33.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 34.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 35.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 36.svg" alt="Book" loading="lazy"></div>
                <div class="book"><img src="/images/image 37.svg" alt="Book" loading="lazy"></div>
            </div>
        </main>
    </div>

    <div id="profileModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Profile</h2>
            </div>
            <div class="modal-body">
                <div class="profile-image">
                    <img src="/images/Profile 1.svg" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%;">
                </div>
                <div class="profile-details">
                    <p><strong>Username:</strong> Rashdy Arobie</p>
                    <p><strong>User ID:</strong> #12345</p>
                    <p><strong>Status:</strong> <span class="status">Online</span></p>
                </div>
                <div class="profile-info">
                    <p><strong>Address:</strong> 123 Library St, City</p>
                    <p><strong>Date of Birth:</strong> January 1, 1990</p>
                    <p><strong>Phone Number:</strong> 123-456-7890</p>
                    <p><strong>Email:</strong> rashdy@example.com</p>
                    <p><strong>Date Joined:</strong> January 1, 2020</p>
                </div>
            </div>
            <div class="modal-actions">
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <div id="logoutModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content2">
            <img src="/images/logov4.svg" class="modal-logo">
            <div class="modal-header">
                <h2>Logout Confirmation</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" id="confirmLogout">Yes</button>
                <button class="modalbtn close">No</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileModal = document.getElementById('profileModal');
            const logoutModal = document.getElementById('logoutModal');
            const closeButtons = document.querySelectorAll('.modalbtn.close');
            const confirmLogoutButton = document.getElementById('confirmLogout');

            // Trigger Profile Modal
            document.querySelector('.menu-item:nth-child(1)').addEventListener('click', function() {
                profileModal.style.display = 'flex';
                profileModal.classList.add('active');
            });

            // Trigger Logout Modal
            document.querySelector('.logout-option').addEventListener('click', function() {
                logoutModal.style.display = 'flex';
                logoutModal.classList.add('active');
            });

            // Close modals
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    profileModal.style.display = 'none';
                    profileModal.classList.remove('active');
                    logoutModal.style.display = 'none';
                    logoutModal.classList.remove('active');
                });
            });

            // Confirm Logout
            confirmLogoutButton.addEventListener('click', function() {
                window.location.href = 'welcome.php';
            });
        });
    </script>

    <script src="/js/sidebar.js"></script>
    <script>
        const logout = document.querySelectorAll('.dropdown-menu .menu-item')
        logout.forEach(card => {
            card.addEventListener('click', function () {
                const link = this.getAttribute('data-link');
                if (link) window.location.href = link;
            });
        });
    </script>
</body>
</html>
