<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/return-borrowstyles.css">
</head>
<body>

    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logov5.svg" alt="Logo">
        </div>

        <nav class="menu">
            <a href="/html/Member-Homepage.html" class="active">
                <img src="/images/Home.svg" width="20" height="20" alt="Home">
                <span>Home</span>
            </a>
            <a href="#">
                <img src="/images/Search.svg" width="20" height="20" alt="Search">
                <span>Search</span>
            </a>
            <a href="#">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="/html/Member-History.html">
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
                    <div class="menu-item logout-option">
                        <img src="/images/logout_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </header>




        <main class="content">
            <div class="header-container">
                <div class="header-title">
                    <img src="/images/backbtn.svg" class="back-button"> 
                    History</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button" id="filter-all">All</button>
                    <input type="text" class="search-input" placeholder="Search Books">
                </div>
                    <div class="stats-container">
                        <div class="stat-box" id="filter-borrowed" style="cursor: pointer;">
                            <img src="/images/borrow_book_vector.svg" style="height: 40px; margin-right: 10px;">
                            <div class="stat-style">
                                <div style="font-size: 25px; font-weight: 800; margin-left: 40px;">0</div>
                                <div style="font-size: 12px; font-weight: 400;">Borrowed Books</div>
                            </div>
                        </div>
                        <div class="stat-box" id="filter-returned" style="cursor: pointer;">
                            <img src="/images/return_book_vector.svg" style="height: 40px; margin-right: 10px">
                            <div class="stat-style">
                                <div style="font-size: 25px; font-weight: 800; margin-left: 40px;">0</div>
                                <div style="font-size: 12px; font-weight: 400;">Returned Books</div>
                            </div>
                        </div>
                    </div>
            </div>

            <table class="book-table">
                <thead class="book-header">
                    <tr>
                        <th>Title</th>
                        <th>Date Borrowed</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Returned Date</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/image 25.svg" alt="Harry Potter and the Sorcerer's Stone" class="book-cover">
                                <div class="book-details">
                                    <h4>Harry Potter and the Sorcerer's Stone</h4>
                                    <p> J. K. Rowling</p>
                                    <p>June 26, 1997</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="date">June 23, 2023</div>
                        </td>
                        <td>
                            <div class="date" >May 1, 2024</div>
                        </td>
                        <td>
                            <div class="returned">Returned</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                    </tr>
                    
                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/image 33.svg" alt="The Long Way to a Small, Angry Planet" class="book-cover">
                                <div class="book-details">
                                    <h4>The Long Way to a Small, Angry Planet</h4>
                                    <p> Becky Chambers</p>
                                    <p>2014</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="date">June 23, 2023</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                        <td>
                            <div class="overdue">Overdue</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                    </tr>
                    
                    <tr class="book-row">
                        <td>
                            <div class="book-info">
                                <img src="/images/image 47.svg" alt="The Calculating Stars " class="book-cover">
                                <div class="book-details">
                                    <h4>The Calculating Stars</h4>
                                    <p>Mary Robinette Kowal</p>
                                    <p>July 3, 2018</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="date">June 23, 2023</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                        <td>
                            <div class="pending">Pending</div>
                        </td>
                        <td>
                            <div class="date">---</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </main>

    
    <script src="/js/sidebar.js"></script>
    <script src="/js/bookselection.js"></script>
    <script src="/js/history-filter.js"></script>
    
</body>
</html>
