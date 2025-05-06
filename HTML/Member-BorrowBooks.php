<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Books</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/return-borrowstyles.css">
    <link rel="stylesheet" href="/css/modalstyles.css">
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logo (3).svg" alt="Logo">
        </div>

        <nav class="menu">
            <a href="/html/Member-Homepage.php" class="active">
                <img src="/images/Home.svg" width="20" height="20" alt="Home">
                <span>Home</span>
            </a>
            <a href="#">
                <img src="/images/Search.svg" width="20" height="20" alt="Search">
                <span>Search</span>
            </a>
            <a href="/HTML/Myshelf.php">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="/html/Member-History.php">
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
                    BORROW BOOKS</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button">All</button>
                    <input type="text" class="search-input" placeholder="Search Books">
                </div>

                <!-- ung link ng search -->
                <a href="/" class="browse"> 
                    Browse
                    <img src="/images/browse.svg">
                </a>
            </div>

            <table class="book-table">
                <thead class="book-header">
                    <tr>
                        <th>Title</th>
                        <th>Ratings</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Borrow</th>
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
                            <div class="rating">4.7</div>
                        </td>
                        <td>
                            <div class="category">Novel, Fantasy Fiction, Children's literature, High fantasy</div>
                        </td>
                        <td>
                            <div class="available">Available</div>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox">
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
                            <div class="rating">4.6</div>
                        </td>
                        <td>
                            <div class="category">Science fiction, Novel, Space opera, Adventure fiction</div>
                        </td>
                        <td>
                            <div class="not-available">Not Available</div>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox">
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
                            <div class="rating">4.0</div>
                        </td>
                        <td>
                            <div class="category">Science fiction, Novel, Alternate history, Hard science fiction</div>
                        </td>
                        <td>
                            <div class="available">Available</div>
                        </td>
                        <td>
                            <input type="checkbox" class="checkbox">
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
                <button class="button" id="borrowbutton">Borrow</button>
            </div>
        </div>

        <div class="viewmodal" id="viewmodal">
            <div class="modal-content" id="borrowModal">
                <h2>Borrow Book</h2>
                <div id="borrow-modal-book-list" class="modal-book-list-container"></div>
                <div class="borrow-period">
                    <p>Date Borrowed: <span id="dateBorrowed"></span></p>
                </div>
                <div class="borrow-period">
                    <label for="days">Borrowing Period (1-31 days):
                    <input type="number" id="days" min="1" max="31" required>
                    </label>
                    <div id="alertText" style="color: red; display: none; font-size: 8px; margin: 0; padding: 0;">
                        Please enter a valid number of days (1–31).
                    </div>
                </div>
                <div class="borrow-period">
                    <p>Due Date: <span id="dueDate"></span></p>
                </div>

                <div class="buttonmodal">
                    <button type="submit" class="modalbtn proceed" id="proceed">Proceed</button>
                    <button class="modalbtn close">Close</button>
                </div>
            </div>

            <div class="modal-content2" id="confirmationModal" style="display: none;">
                <img src="/images/logov4.svg" class="modal-logo">
                <h2>Confirm</h2>
                <h4>Are you sure you want to borrow books?</h4>
                <div class="buttonmodal">
                <button type="button" class="modalbtn confirm" id="confirm">Proceed</button>
                <button type="button" class="modalbtn close">Close</button> 
                </div>
            </div>

            <div class="modal-content2" id="successModal" style="display: none;">
                <img src="/images/logov4.svg" class="modal-logo">
                <h2>Success!</h2>
                <p>Thank you!</p>
                <img  src="/images/check.svg" class="checkimg">
                <div class="buttonmodal">
                    <button type="button" class="modalbtn close">Close</button> 
                </div>
            </div>
        </div>

    <script src="/js/sidebar.js"></script>
    <script src="/js/bookselection.js"></script>
    <script src="/js/borrowReturnModals.js"></script>

</body>
</html>
