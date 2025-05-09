<?php
require_once "user_operations.php";
require_once "book_operations.php";
session_start();

// Check if member is logged in
if (!isset($_SESSION['member_id'])) {
    header("Location: Member-Login.php");
    exit();
}

$memberId = $_SESSION['member_id'];
$memberName = $_SESSION['name'];
$memberEmail = $_SESSION['email'];

// Initialize book operations
$bookOps = new BookOperations($pdo);

// Get all books and randomize them
$booksResponse = $bookOps->getBooks();
$allBooks = ($booksResponse['status'] === 'success') ? $booksResponse['data'] : [];

// Shuffle the books array to randomize
shuffle($allBooks);

// Get books for each category
$recentlyViewed = array_slice($allBooks, 0, 9);
$recommendedBooks = array_slice($allBooks, 9, 9);
$academicBooks = array_filter($allBooks, function($book) {
    return strtolower($book['genre']) === 'academic' || 
           strtolower($book['genre']) === 'education' || 
           strtolower($book['genre']) === 'textbook';
});
$academicBooks = array_slice($academicBooks, 0, 9);

$fictionalBooks = array_filter($allBooks, function($book) {
    return strtolower($book['genre']) === 'fiction' || 
           strtolower($book['genre']) === 'novel' || 
           strtolower($book['genre']) === 'literature';
});
$fictionalBooks = array_slice($fictionalBooks, 0, 9);

$scifiBooks = array_filter($allBooks, function($book) {
    return strtolower($book['genre']) === 'science fiction' || 
           strtolower($book['genre']) === 'sci-fi' || 
           strtolower($book['genre']) === 'fantasy';
});
$scifiBooks = array_slice($scifiBooks, 0, 9);

// Initialize notifications and borrowed books
$notifications = $memberOps->getNotifications($memberId);
$borrowedBooks = $memberOps->getBorrowedBooks($memberId);
$returnedBooks = $memberOps->getReturnedBooks($memberId);
$totalReturned = is_array($returnedBooks) ? count($returnedBooks) : 0;

// Initialize statistics
$totalBorrowed = is_array($borrowedBooks) ? count($borrowedBooks) : 0;
$overdueCount = 0;
$dueSoonCount = 0;
if (is_array($borrowedBooks)) {
    foreach ($borrowedBooks as $book) {
        if ($book['status'] === 'overdue') {
            $overdueCount++;
        } elseif ($book['status'] === 'due_soon') {
            $dueSoonCount++;
        }
    }
}

// Get member profile (if you want to show more info, you can expand this)
//$memberProfile = $memberOps->getMemberProfile($memberId); // Not used if not needed

$bookId = $_GET['book_id'] ?? null;
$book = null;
if ($bookId) {
    $bookResponse = $bookOps->getBookById($bookId);
    if ($bookResponse['status'] === 'success') {
        $book = $bookResponse['data'];
    }
}

?>
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
            <a href="/HTML/myshelf.php">
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
                    <img src="/images/Profile.svg" alt="User">
                    <div>
                            <?php echo htmlspecialchars($memberName); ?> <br>
                            <span style="font-size: 12px;">Member</span>
                    </div>
                </div>
            </div>

            <div class="logout">
                <button class="menu-button">
                    <img class="logout-icon" src="/images/LogOut_vector.svg" alt="Logout">
                </button>
                <div class="dropdown-menu">
                    <div class="menu-item" id="profile-button">
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
                    <div class="menu-item logout-option" data-link="logout.php">
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
                    <h2>Welcome! <span><?php echo htmlspecialchars($memberName); ?></span></h2>
                    <p>Explore books, manage your borrowings, and discover something new every day.</p>
                </div>
            </div>

            <div class="dashboard">
                <div class="upper-dashboard">
                    <div class="actions-grid">
                        <a href="/html/Member-BorrowBooks.php" class="action-button">
                            <img class="action-icon" src="/images/borrow_book_vector.svg" alt="Borrow Book">
                            <div class="action-text">Borrowed Book</div>
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
                                    <div style="font-size: 40px; font-weight: 700;"><?php echo $totalBorrowed; ?></div>
                                    <div style="font-size: 14px; font-weight: 400;">Borrowed Books</div>
                                </div>
                                <div class="stat-box">
                                    <div style="font-size: 40px; font-weight: 700;"><?php echo $totalReturned; ?></div>
                                    <div style="font-size: 14px; font-weight: 400;">Returned Books</div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="right-section">
                        <div class="notification-container">
                            <div class="notification-header">Notifications</div>
                            <?php if (empty($notifications)): ?>
                                <p class="no-notifications">No new notifications</p>
                            <?php else: ?>
                                <?php foreach ($notifications as $notification): ?>
                                    <div class="notification-item">
                                        <img src="/images/warning_vector.svg" alt="Notification">
                                        <div class="notification-text">
                                            <strong><?php echo htmlspecialchars($notification['title']); ?></strong>
                                            <?php echo htmlspecialchars($notification['message']); ?>
                                            <small><?php echo date('M d, Y H:i', strtotime($notification['created_at'])); ?></small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


            <h1>Unlock Worlds, Begin Reading!</h1>
            <h2>Recently Viewed</h2>

            <div class="book-container-line"></div>
            <div class="book-container">
                <?php foreach ($recentlyViewed as $book): ?>
                    <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>" class="book">
                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             loading="lazy"
                             title="<?php echo htmlspecialchars($book['title']); ?>">
                    </a>
                <?php endforeach; ?>
            </div>

            <h2>Recommended for You</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <?php foreach ($recommendedBooks as $book): ?>
                    <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>" class="book">
                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             loading="lazy"
                             title="<?php echo htmlspecialchars($book['title']); ?>">
                    </a>
                <?php endforeach; ?>
            </div>

            <h2>Academic Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <?php foreach ($academicBooks as $book): ?>
                    <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>" class="book">
                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             loading="lazy"
                             title="<?php echo htmlspecialchars($book['title']); ?>">
                    </a>
                <?php endforeach; ?>
            </div>

            <h2>Fictional Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <?php foreach ($fictionalBooks as $book): ?>
                    <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>" class="book">
                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             loading="lazy"
                             title="<?php echo htmlspecialchars($book['title']); ?>">
                    </a>
                <?php endforeach; ?>
            </div>

            <h2>Sci-Fi Books</h2>
            <div class="book-container-line"></div>
            <div class="book-container">
                <?php foreach ($scifiBooks as $book): ?>
                    <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($book['book_id']); ?>" class="book">
                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             loading="lazy"
                             title="<?php echo htmlspecialchars($book['title']); ?>">
                    </a>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
    <script src="/js/sidebar.js"></script>
    <script>
        const logout = document.querySelectorAll('.dropdown-menu .menu-item')
        logout.forEach(card => {
            card.addEventListener('click', function () {
                const link = this.getAttribute('data-link');
                if (link) window.location.href = link;
            });
        });

        addClickListener(confirm, () => {
            // Optionally show the success modal here, but first submit the form:
            document.getElementById('borrowForm').submit();
        });
    </script>
</body>
</html>
