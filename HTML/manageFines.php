<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fines</title>
    <link rel="stylesheet" href="/CSS/managefinestyle.css">
</head>
<body>
    <button id="menu-toggle" class="menu-toggle">
        <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
    </button>
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img src="/images/logo.svg" alt="Library Logo">
        </div>
        <div class="menu">
            <a href="/HTML/admindash.php">
                <img src="/images/dashboard_vector.svg" alt="Dashboard">
                Dashboard
            </a>
            <a href="/HTML/managebook.php" class="active">
                <img src="/images/manage_books_vector.svg" alt="Manage Books">
                Manage Books
            </a>
            <a href="/HTML/manageuser.php">
                <img src="/images/manage_users_vector.svg" alt="Manage Users">
                Manage Users
            </a>
        </div>
        <div class="footer-sidebar">
            <a href="#">About</a>
            <a href="#">Support</a>
            <a href="#">Terms & condition</a>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div class="user-info">
                <img src="/images/Profile.svg" alt="Profile">
                <div class="user-details">
                    <div class="user-name">Rashdy Arobie</div>
                    <div class="user-role">Admin</div>
                </div>
            </div>
            <div class="logout">
                <button class="menu-button">
                    <img src="/images/logout_vector.svg" alt="Menu">
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
        </div>

        <main class="content">
            <div class="header-container">
                <div class="header-title">
                    <img src="/images/backbtn.svg" class="back-button"> 
                    FINES</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button">All</button>
                    <input type="text" class="search-input" placeholder="Search...">
                </div>

                <a href="/html/" class="browse">
                    Browse
                    <img src="/images/browse.svg">
                </a>
            </div>

            <table class="book-table">
                <thead class="book-header">
                    <tr>
                        <th>Borrowed by</th>
                        <th>Book Name</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Fine Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="book-row">
                        <td>
                            <div class="person-info">
                                <img src="/images/Profile 1.svg" alt="Harry Potter and the Sorcerer's Stone" class="person-cover">
                                <div class="book-details">
                                    <h4>Spiderman Delos Reyes</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-info">
                                <img src="/images/image 1.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>The Hobbit</h4>
                                </div>
                        </td>
                        <td>
                            <div class="category">04/04/2024</div>
                        </td>
                        <td>
                            <div class="available">04/04/2024</div>
                        </td>
                        <td>
                            <div class="not-available">Overdue <br>3 days</div>
                        </td>
                        <td>
                            <div class="available">PHP 90.00</div>
                        </td>
                        <td>
                            <div class="available">Paid</div>
                        </td>
                    </tr>
                    
                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/Profile 2.svg" alt="Harry Potter and the Sorcerer's Stone" class="person-cover">
                                <div class="book-details">
                                    <h4>Raquelle Rodriguez</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-info">
                                <img src="/images/image 2.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>Harry Potter and the Deathly Hallows</h4>
                                </div>
                        </td>
                        <td>
                            <div class="category">04/04/2024</div>
                        </td>
                        <td>
                            <div class="available">04/04/2024</div>
                        </td>
                        <td>
                            <div class="not-available">Damaged</div>
                        </td>
                        <td>
                            <div class="available">PHP 1990.00</div>
                        </td>
                        <td>
                            <div class="not-available">Unpaid</div>
                        </td>
                    </tr>
                    
                    <tr class="book-row">
                        <td>
                            <div class="person-info">
                                <img src="/images/Profile 3.svg" alt="Harry Potter and the Sorcerer's Stone" class="person-cover">
                                <div class="book-details">
                                    <h4>Batman Dela Cruz</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-info">
                                <img src="/images/image 26.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>Beginner's Step-by-Step Coding Course: Learn Computer Programming the Easy Way </h4>
                                </div>
                        </td>
                        <td>
                            <div class="category">04/04/2024</div>
                        </td>
                        <td>
                            <div class="available">04/04/2024</div>
                        </td>
                        <td>
                            <div class="not-available">Overdue <br>3 days</div>
                        </td>
                        <td>
                            <div class="available">PHP 90.00</div>
                        </td>
                        <td>
                            <div class="available">Paid</div>
                        </td>
                    </tr>

                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/Profile 2.svg" alt="Harry Potter and the Sorcerer's Stone" class="person-cover">
                                <div class="book-details">
                                    <h4>Raquelle Rodriguez</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-info">
                                <img src="/images/image 2.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>Harry Potter and the Deathly Hallows</h4>
                                </div>
                        </td>
                        <td>
                            <div class="category">04/04/2024</div>
                        </td>
                        <td>
                            <div class="available">04/04/2024</div>
                        </td>
                        <td>
                            <div class="not-available">Damaged</div>
                        </td>
                        <td>
                            <div class="available">PHP 1990.00</div>
                        </td>
                        <td>
                            <div class="not-available">Unpaid</div>
                        </td>
                    </tr>

                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/Profile 1.svg" alt="Harry Potter and the Sorcerer's Stone" class="person-cover">
                                <div class="book-details">
                                    <h4>Spiderman Delos Reyes</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="book-info">
                                <img src="/images/image 1.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>The Hobbit</h4>
                                </div>
                        </td>
                        <td>
                            <div class="category">04/04/2024</div>
                        </td>
                        <td>
                            <div class="available">04/04/2024</div>
                        </td>
                        <td>
                            <div class="not-available">Overdue <br>3 days</div>
                        </td>
                        <td>
                            <div class="available">PHP 90.00</div>
                        </td>
                        <td>
                            <div class="available">Paid</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>

        <div class="bottom-select">
            <label class="select-all">
                <input type="checkbox" id="select-all-checkbox">
                <span>ALL</span>
            </label>
            <div class="right-side">
                <div class="total-count">Total: <span id="total-count"> 0 </span> </div>
                <button class="button">Borrow</button>
            </div>
        </div>

        </div>
    </div>
    <script src="/js/admindash.js"></script>
</body>
</html>
