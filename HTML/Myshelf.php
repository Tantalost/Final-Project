
<?php
require_once "book_operations.php";
session_start();

$bookOps = new BookOperations($pdo);
// Fetch all books from the database
$booksResponse = $bookOps->getBooks();
$books = $booksResponse['status'] === 'success' ? $booksResponse['data'] : [];

// Handle category filtering
$selectedCategory = $_GET['category'] ?? 'All';
$filteredBooks = $books;
if ($selectedCategory !== 'All') {
    $filteredBooks = array_filter($books, function($book) use ($selectedCategory) {
        return strtolower($book['genre']) === strtolower($selectedCategory);
    });
}

// Handle search functionality
$searchQuery = $_GET['search'] ?? '';
if (!empty($searchQuery)) {
    $searchQuery = strtolower($searchQuery);
    $filteredBooks = array_filter($filteredBooks, function($book) use ($searchQuery) {
        return strpos(strtolower($book['title']), $searchQuery) !== false ||
               strpos(strtolower($book['authors']), $searchQuery) !== false;
    });
}
?>
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
                    <img src="/images/Profile.svg" alt="User">
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
                <?php if (empty($filteredBooks)): ?>
                    <p style="text-align:center; font-size: 1.2rem;">No books found.</p>
                <?php else: ?>
                    <?php foreach ($filteredBooks as $book): ?>
                        <div class="book-card">
                            <div class="book-image">
                                <a href="bookdescription.php?book_id=<?= urlencode($book['book_id']) ?>">
                                    <img src="<?= htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg') ?>" 
                                        alt="<?= htmlspecialchars($book['title'] ?? 'Untitled') ?> Book Cover">
                                </a>
                            </div>
                            <div class="book-details">
                                <h3 class="book-title"><?= htmlspecialchars(strtoupper($book['title'])) ?></h3>
                                <p class="book-author">By <?= htmlspecialchars($book['authors']) ?></p>
                                <p class="book-isbn">ISBN: <?= htmlspecialchars($book['isbn']) ?></p>
                                <p class="book-remaining">Remaining: <?= htmlspecialchars($book['remaining'] ?? 'N/A') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
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