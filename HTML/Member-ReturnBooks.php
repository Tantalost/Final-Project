<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Books</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/return-borrowstyles.css">
    <link rel="stylesheet" href="/css/modalstyles.css">
</head>
<body>

    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logov5.svg" alt="Logo">
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
            <a href="#">
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
                    RETURN BOOKS</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button">All</button>
                    <input type="text" class="search-input" placeholder="Search Books">
                </div>
            </div>

            <table class="book-table">
                <thead class="book-header">
                    <tr>
                        <th>Title</th>
                        <th>Date Borrowed</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Return</th>
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
                            <div class="available">Pending</div>
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
                            <div class="date">June 23, 2023</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                        <td>
                            <div class="not-available">Overdue</div>
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
                            <div class="date">June 23, 2023</div>
                        </td>
                        <td>
                            <div class="date">May 1, 2024</div>
                        </td>
                        <td>
                            <div class="available">Pending</div>
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
                <button class="button" id="returnbutton">Return</button>
            </div>
        </div>

        
                <div class="viewmodal" id="viewmodal">
                    <div class="modal-content" id="returnmodal">
                        <h2>Return Books</h2>
                        <div id="return-modal-book-list"></div>
        
                        <div class="overdue-container" id="modal-overdue-warning" style="display: none; margin-bottom: 10px;">
                            <p>Please be aware that you have an overdue fine, which incurs a penalty fee that needs to be paid.</p>
                        </div>
        
                        <div class="buttonmodal">
                            <button type="button" class="modalbtn proceed" id="return-modal-proceed-button">Proceed</button>
                            <button type="button" class="modalbtn close">Close</button>
                        </div>
                    </div>
        
                    <div class="modal-content" id="paymentMethodModal" style="display: none;">
                        <div class="modal-header">
                            <h2 style="font-size: 24px;">Payment Method</h2>
                        </div>
                        <p class="modal-description">You have overdue items. Please select a payment method for the penalty fees:</p>
                        <div class="payment-options">
                            <button class="payment-option-button" id="selectGcash">
                                <img src="/images/GCash.svg"> 
                                <span>GCash</span>
                            </button>
                            <button class="payment-option-button" id="selectPayAtLibrary">
                                <img src="/images/PayLibrary.svg">
                                <span>Pay at Library</span>
                            </button>
                        </div>
                        <div class="buttonmodal" style="margin-top: 20px;">
                            <button type="button" class="modalbtn close">Cancel</button>
                        </div>
                    </div>
        

                    <div class="modal-content" id="payAtLibraryModal" style="display: none;">
                        <div class="modal-header">
                            <h2>Payment Method</h2>
                        </div>
                        <div class="centered-content">
                            <h3>Pay at Library</h3>
                            <img src="/images/logov4.svg" class="modal-icon-large">
                            <p>Visit the library counter to complete your payment in person. Thank you!</p>
                        </div>
                        <div class="buttonmodal">
                            <button type="button" class="modalbtn proceed" id="proceedPayAtLibrary">Proceed</button>
                            <button type="button" class="modalbtn close">Close</button> 
                        </div>
                    </div>
        
                    <div class="modal-content" id="gcashPaymentModal" style="display: none;">
                        <div class="modal-header">
                            <h2>Payment Method</h2>
                        </div>
                        <div class="centered-content">
                            <h3>GCash</h3>
                            <h4>Scan to Pay</h4>
                            <img src="/images/qrfake.svg" class="qr-code">
                            <p style="font-weight: bold;">SCRIPTORIUM HUB</p>
                        </div>
                        <div class="buttonmodal">
                            <button type="button" class="modalbtn proceed" id="proceedGcash">Proceed</button>
                            <button type="button" class="modalbtn close">Close</button> 
                        </div>
                    </div>
        
                    <div class="modal-content" id="authenticationModal" style="display: none;">
                        <div class="modal-header">
                            <h2>Authentication</h2>
                        </div>
                        <div class="centered-content">
                            <img src="/images/shield.svg" style="height: 40px; margin-top: 10px;">
                            <h3>Verify via text</h3>
                            <p>Please enter the 6-digit authentication code sent to 0915 **** 8642.</p> 
                            <div class="auth-code-inputs">
                                <input type="text" maxlength="1" class="auth-input">
                                <input type="text" maxlength="1" class="auth-input">
                                <input type="text" maxlength="1" class="auth-input">
                                <input type="text" maxlength="1" class="auth-input">
                                <input type="text" maxlength="1" class="auth-input">
                                <input type="text" maxlength="1" class="auth-input">
                            </div>
                            <button class="resend-code-button">Resend code</button>
                        </div>
                        <div class="buttonmodal proceed-footer">
                            <button type="button" class="modalbtn proceed" id="proceedAuth">Proceed <img src="/images/arrow-right.svg" alt=""></button>
                            <button type="button" class="modalbtn close">Close</button> 
                        </div>
                    </div>
        
                    <div class="modal-content2" id="verifiedModal" style="display: none;"> 
                        <img src="/images/logov4.svg" class="modal-logo">
                        <h2>Success!</h2>
                        <p>Thank you!</p>
                        <img  src="/images/check.svg" class="checkimg">
                        <div class="buttonmodal">
                            <button type="button" class="modalbtn close" id="proceedVerified">Close</button>
                        </div>
                    </div>

                    <div class="modal-content2" id="successNoOverdueModal" style="display: none;">
                        <img src="/images/logov4.svg" class="modal-logo">
                        <h2>Success!</h2>
                        <p>Thank you! Please wait for the Librarian to verify returned books</p>
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
