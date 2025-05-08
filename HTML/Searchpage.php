<?php
require_once "user_operations.php";
require_once "book_operations.php";
session_start();

if (!isset($_SESSION['member_id'])) {
    header("Location: Member-Login.php");
    exit();
}

$memberId = $_SESSION['member_id'];
$bookOps = new BookOperations($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_list'])) {
    $bookId = $_POST['book_id'] ?? 0;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM shelves WHERE user_id = ? AND book_id = ?");
        $stmt->execute([$memberId, $bookId]);
        
        if ($stmt->rowCount() === 0) {
            $stmt = $pdo->prepare("INSERT INTO shelves (user_id, book_id, status) VALUES (?, ?, 'reading')");
            $stmt->execute([$memberId, $bookId]);
            
            $book = $bookOps->getBookById($bookId);
            if ($book) {
            $memberOps->addNotification(
                     $memberId,
                     'Book Added to List',
                     "You've added '{$book['title']}' to your reading list."
                 );
             }
        }
    } catch (PDOException $e) {
    }
}

$booksResponse = $bookOps->getBooks();
$books = ($booksResponse['status'] === 'success') ? $booksResponse['data'] : [];

$searchQuery = $_GET['search'] ?? '';
if (!empty($searchQuery)) {
    $books = array_filter($books, function($book) use ($searchQuery) {
        return stripos($book['title'], $searchQuery) !== false ||
               stripos($book['authors'], $searchQuery) !== false;
    });
}

$selectedCategory = $_GET['category'] ?? 'All';
$filteredBooks = $books;
if ($selectedCategory !== 'All') {
    $filteredBooks = array_filter($books, function($book) use ($selectedCategory) {
        return strtolower($book['genre']) === strtolower($selectedCategory);
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Library App</title>
    <link rel="stylesheet" href="/CSS/searchpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lugrasimo&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="logo-container">
            <img class="logo" src="/images/logo (3).svg" alt="Library Logo">
        </div>

        <nav class="menu">
            <a href="Member-Homepage.php">
                <img src="/images/Home.svg" width="20" height="20" alt="Home">
                <span>Home</span>
            </a>
            <a href="Myshelf.php">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="Searchpage.php" class="active">
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
                    <img class="logout-icon" src="/images/logout_vector.svg" alt="User Menu">
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

        <main class="page-specific-content">

            <section class="search-section">
                <div class="search-header">
                    <h1>DISCOVER YOUR NEXT ADVENTURE!</h1>
                </div>
                
                <div class="search-container">
                    <div class="search-tabs">
                        <div class="tab active">All</div>
                        <div class="tab">Search</div>
                    </div>
                    <form method="GET" action="" class="search-form">
                        <input type="text" name="search" class="search-input" placeholder="Search..." 
                               value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <?php if ($selectedCategory !== 'All'): ?>
                            <input type="hidden" name="category" value="<?php echo htmlspecialchars($selectedCategory); ?>">
                        <?php endif; ?>
                    </form>
                </div>
                
                <div class="browse-container">
                    <div class="dropdown">
                        <button class="dropdown-btn">Browse <span class="dropdown-arrow">▼</span></button>
                        <div class="dropdown-content">
                            <a href="?category=All" class="<?php echo $selectedCategory === 'All' ? 'active' : ''; ?>">All</a>
                            <?php
                            $categories = array_unique(array_column($books, 'genre'));
                            foreach ($categories as $category) {
                                if (!empty($category)) {
                                    $isActive = $selectedCategory === $category ? 'active' : '';
                                    echo "<a href='?category=" . urlencode($category) . "' class='$isActive'>" . htmlspecialchars($category) . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="books-table-section">
                <table class="books-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Ratings</th>
                            <th>Category</th>
                            <th>Availability</th>
                            <th>Add to list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filteredBooks as $book): ?>
                            <tr class="book-row">
                                <td>
                                    <div class="book-info">
                                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg'); ?>" 
                                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                                             class="book-cover">
                                        <div class="book-details">
                                            <h4><?php echo htmlspecialchars($book['title']); ?></h4>
                                            <p><?php echo htmlspecialchars($book['authors']); ?></p>
                                            <p><?php echo htmlspecialchars($book['published_date']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="rating"><?php echo number_format($book['rating'] ?? 0, 1); ?></div>
                                </td>
                                <td>
                                    <div class="category"><?php echo htmlspecialchars($book['genre']); ?></div>
                                </td>
                                <td>
                                    <div class="<?php echo $book['stock'] > 0 ? 'available' : 'not-available'; ?>">
                                        <?php echo $book['stock'] > 0 ? 'Available' : 'Not Available'; ?>
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="" style="margin: 0;">
                                        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
                                        <button type="submit" name="add_to_list" class="add-to-list-btn" 
                                                <?php echo $book['stock'] <= 0 ? 'disabled' : ''; ?>>
                                            Add to List
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <footer class="main-footer">
                <div class="footer-links">
                    <a href="#">About</a>
                    <a href="#">Support</a>
                    <a href="#">Terms & condition</a>
                </div>
            </footer>
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
                    if (browseDropdownContent) browseDropdownContent.classList.remove('show');
                });
            } else {
                console.error("Logout dropdown elements not found!");
            }
    
            const browseDropdownBtn = document.querySelector('.browse-container .dropdown-btn');
            const browseDropdownContent = document.querySelector('.browse-container .dropdown-content');
            const booksTableBody = document.querySelector('.books-table tbody');
            const allTableRows = booksTableBody ? booksTableBody.querySelectorAll('tr') : [];
    
            function filterTableByCategory(selectedCategory) {
                const categoryLower = selectedCategory.trim().toLowerCase();
                const isShowAll = (categoryLower === 'all');
    
                allTableRows.forEach(row => {
                    const categoryCell = row.querySelector('td:nth-child(3)');
                    if (categoryCell) {
                        const rowCategoryLower = categoryCell.textContent.trim().toLowerCase();
                        if (isShowAll || rowCategoryLower === categoryLower) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            }
    
            if (browseDropdownBtn && browseDropdownContent && booksTableBody) {
                browseDropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    browseDropdownContent.classList.toggle('show');
                    if (dropdownMenu) dropdownMenu.classList.remove('show');
                });
    
                browseDropdownContent.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const selectedCategory = link.textContent;
                        filterTableByCategory(selectedCategory);
    
                        const arrowSpan = browseDropdownBtn.querySelector('.dropdown-arrow');
                        browseDropdownBtn.firstChild.textContent = (selectedCategory.toLowerCase() === 'all')
                            ? 'Browse '
                            : `Browse: ${selectedCategory.trim()} `;
                        if(arrowSpan && !browseDropdownBtn.contains(arrowSpan)) {
                            browseDropdownBtn.appendChild(arrowSpan);
                        }
    
                        browseDropdownContent.classList.remove('show');
                    });
                });
    
            } else {
                 if(!browseDropdownBtn || !browseDropdownContent) console.error("Browse dropdown elements not found!");
                 if(!booksTableBody) console.error("Books table body (.books-table tbody) not found!");
            }
    
            document.addEventListener('click', function(event) {
                if (dropdownMenu && !menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
                if (browseDropdownContent && !browseDropdownBtn.contains(event.target) && !browseDropdownContent.contains(event.target)) {
                    browseDropdownContent.classList.remove('show');
                }
            });
    
        });
    </script>
</body>
</html>