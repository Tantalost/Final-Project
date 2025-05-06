<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shelf</title>
    <link rel="stylesheet" href="/CSS/myshelf-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lugrasimo&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body> 
    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logov4.svg" alt="Library Logo">
        </div>

        <nav class="menu">
            <a href="/HTML/Member-Homepage.php">
                <img src="/images/Home.svg" width="20" height="20" alt="Home">
                <span>Home</span>
            </a>
            <a href="/HTML/Myshelf.php" class="active">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="/HTML/Searchpage.php">
                <img src="/images/Search.svg" width="20" height="20" alt="Search">
                <span>Search</span>
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
                    <img src="/images/Profile (2).svg" alt="User">
                    <div>
                        BARBIE SANTOS <br>
                        <span style="font-size: 12px;">Student</span>
                    </div>
                </div>
            </div>

            <div class="logout">
                <button class="menu-button">
                    <img class="logout-icon" src="/images/LogOut_vector.svg" alt="User Menu">
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
                        <img src="/images/LogOut_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </header>

        <main class="page-specific-content">
            <section class="hero-section">
                <div class="hero-text-container">
                    <div class="text">EXPLORE YOUR</div>
                    <div class="text">BOOK TREASURES!</div>
                </div>

                <div class="search-container">
                    <div class="search-tabs">
                        <div class="tab active">All</div>
                        <div class="tab">User</div>
                    </div>
                    <input type="text" class="search-input" placeholder="Search...">
                </div>
            </section>

            <section class="books-grid">
                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 1.svg" alt="Harry Potter Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">HARRY POTTER AND THE PHILOSOPHER'S STONE</h3>
                        <p class="book-author">By J.K. Rowling</p>
                        <p class="book-isbn">ISBN: 978-0747532699</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 4.svg" alt="A Brief History of Time Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">A BRIEF HISTORY OF TIME</h3>
                        <p class="book-author">By Stephen Hawking</p>
                        <p class="book-isbn">ISBN: 978-0553380163</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 28.svg" alt="Thinking, Fast and Slow Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">THINKING, FAST AND SLOW</h3>
                        <p class="book-author">By Daniel Kahneman</p>
                        <p class="book-isbn">ISBN: 978-0374533557</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 27.svg" alt="Humpty Dumpty Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">HUMPTY DUMPTY</h3>
                        <p class="book-author">By Charles Reasoner</p>
                        <p class="book-isbn">ISBN: 978-0843178835</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 6.svg" alt="The Republic Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">THE REPUBLIC</h3>
                        <p class="book-author">By Plato</p>
                        <p class="book-isbn">ISBN: 978-0140455113</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 5.svg" alt="The History of the Ancient World Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">THE HISTORY OF THE ANCIENT WORLD</h3>
                        <p class="book-author">By Susan Wise Bauer</p>
                        <p class="book-isbn">ISBN: 978-0393059748</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 9.svg" alt="The Hobbit Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">THE HOBBIT</h3>
                        <p class="book-author">By Charles Reasoner</p>
                        <p class="book-isbn">ISBN: 978-0843178835</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 22.svg" alt="Harry Potter and the Deathly Hallows Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">HARRY POTTER AND THE DEATHLY HOLLOWS</h3>
                        <p class="book-author">By J.K. Rowling</p>
                        <p class="book-isbn">ISBN: 978-0747532699</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>

                <div class="book-card">
                    <div class="book-image">
                        <img src="/images/image 26.svg" alt="Beginner's Step-by-Step Coding Course Book Cover">
                    </div>
                    <div class="book-details">
                        <h3 class="book-title">BEGINNER'S STEP-BY-STEP CODING COURSE: LEA...</h3>
                        <p class="book-author">By Daniel Kahneman</p>
                        <p class="book-isbn">ISBN: 978-0374533557</p>
                        <p class="book-remaining">Remaining: 8</p>
                    </div>
                </div>
            </section>
        </main> 
    </div> 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content'); 

            if (menuToggle && sidebar && mainContent) {


                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    mainContent.classList.toggle('shifted');
                });
            } else {
                console.error("Sidebar toggle elements not found!");
            }

            const menuButton = document.querySelector('.menu-button');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (menuButton && dropdownMenu) {
                menuButton.addEventListener('click', function(e) {
                    e.stopPropagation(); 
                    dropdownMenu.classList.toggle('show');
                });

                document.addEventListener('click', function(event) {
                    if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.remove('show');
                    }
                });
            } else {
                console.error("Logout dropdown elements not found!");
            }
        });
    </script>

</body>
</html>