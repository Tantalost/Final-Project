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

$stmt = $pdo->prepare("
    SELECT b.*, s.shelf_id, t.transaction_id
    FROM books b
    LEFT JOIN shelves s ON b.book_id = s.book_id AND s.user_id = ? AND s.status = 'reading'
    LEFT JOIN transactions t ON b.book_id = t.book_id AND t.user_id = ? AND t.transaction_type = 'borrow' AND t.return_date IS NULL
    WHERE s.shelf_id IS NOT NULL OR t.transaction_id IS NOT NULL
");
$stmt->execute([$memberId, $memberId]);
$myshelfBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrowBooks'])) {
    $selectedItems = $_POST['selected_items'] ?? [];

    foreach ($selectedItems as $item) {
        if (strpos($item, 'shelf_') === 0) {
            $shelfId = str_replace('shelf_', '', $item);
            $stmt = $pdo->prepare("DELETE FROM shelves WHERE shelf_id = ? AND user_id = ?");
            $stmt->execute([$shelfId, $memberId]);

        } elseif (strpos($item, 'trans_') === 0) {
            $transactionId = str_replace('trans_', '', $item);

            $stmt = $pdo->prepare("UPDATE transactions SET return_date = NOW() WHERE transaction_id = ? AND user_id = ?");
            $stmt->execute([$transactionId, $memberId]);

            $stmt = $pdo->prepare("SELECT book_id FROM transactions WHERE transaction_id = ?");
            $stmt->execute([$transactionId]);
            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($book) {
                $stmt = $pdo->prepare("UPDATE books SET stock = stock + 1 WHERE book_id = ?");
                $stmt->execute([$book['book_id']]);
            }
        }
    }

    header("Location: myshelf.php");
    exit();
}

$totalBooks = count($myshelfBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shelf</title>
    <link rel="stylesheet" href="/CSS/myshelf-style.css">
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
                        <?php echo htmlspecialchars($_SESSION['name']); ?> <br>
                        <span style="font-size: 12px;">Student</span>
                    </div>
                </div>
            </div>
        </header>

        
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

        <main class="page-specific-content">
            <div class="content">
                <div class="header-actions">
                    <div class="count-display">
                        <span class="count"><?php echo $totalBooks; ?></span> Books in Shelf
                    </div>
                </div>
                <form method="POST">
                    <table class="book-table">
                        <thead class="book-header">
                            <tr>
                                <th>Select</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($myshelfBooks)): ?>
                                <tr>
                                    <td colspan="5" style="text-align:center; font-size:1.1rem;">No books in your shelf.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($myshelfBooks as $book): ?>
                                        <tr class="book-row">
                                            <td>
                                            <input type="checkbox" name="selected_items[]" value="<?= isset($book['shelf_id']) ? 'shelf_' . $book['shelf_id'] : 'trans_' . $book['transaction_id'] ?>">
                                            </td>
                                            <td>
                                                <div class="book-info" style="display: flex; align-items: center;">
                                                    <img src="<?= htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg') ?>"
                                                        alt="<?= htmlspecialchars($book['title'] ?? 'Untitled') ?> Book Cover"
                                                        class="book-cover"
                                                        style="width:80px;height:120px;object-fit:cover;margin-right:16px;">
                                                    <div class="book-details">
                                                        <h4 style="font-size:1.3rem; margin:0; padding:0;">
                                                            <?= htmlspecialchars($book['title']) ?>
                                                        </h4>
                                                        <span class="status">
                                                            <?= isset($book['transaction_id']) ? 'Borrowed' : 'Reading' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars($book['authors']) ?></td>
                                            <td><?= htmlspecialchars($book['isbn']) ?></td>
                                            <td><?= htmlspecialchars($book['stock'] ?? 'N/A') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if (!empty($myshelfBooks)): ?>
                        <button type="submit" name="borrowBooks" class="borrow-button">
                            Return Borrow (Remove from Shelf)
                        </button>
                    <?php endif; ?>
                </form>
            </div>
        </main>
    </div>
</body>
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
    }
});
</script>
</html>