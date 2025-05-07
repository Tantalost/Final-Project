<?php
require_once "book_operations.php";
require_once "transaction_operations.php";
$bookId = $_GET['book_id'] ?? null;
$book = null;
$borrowers = [];
if ($bookId) {
    $bookResponse = $bookOps->getBookById($bookId);
    if ($bookResponse['status'] === 'success') {
        $book = $bookResponse['data'];
        // Get borrowers for this book
        $stmt = $pdo->prepare("SELECT t.*, u.username, u.profile_image FROM transactions t JOIN users u ON t.user_id = u.user_id WHERE t.book_id = ? ORDER BY t.transaction_date DESC");
        $stmt->execute([$bookId]);
        $borrowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details (Admin)</title>
    <link rel="stylesheet" href="/CSS/bookdesc_admin.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img src="/images//logo.svg" alt="Library Logo">
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
            <button id="menu-toggle" class="menu-toggle">
                <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
            </button>
            <div class="user-info">
                <img src="/images/Profile.svg" alt="Profile">
                <div class="user-details">
                    <div class="user-name"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?></div>
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
        <div class="book-details-container">
            <div class="book-info">
                <h1 class="book-title">
                    <?php echo htmlspecialchars($book['title'] ?? 'Book Not Found'); ?>
                    <a href="editBook.php?book_id=<?php echo $bookId; ?>"><img src="/images/editbtn.svg" alt="Edit" class="admin-edit-icon"></a>
                    <a href="#" onclick="if(confirm('Delete this book?')){window.location.href='deleteBook.php?book_id=<?php echo $bookId; ?>';}"><img src="/images/deletebtn.svg" alt="Delete" class="admin-delete-icon"></a>
                </h1>
                <div class="book-meta">
                    By <b><?php echo htmlspecialchars($book['authors'] ?? 'Unknown'); ?></b><?php if (!empty($book['published_date'])): ?>, <?php echo htmlspecialchars($book['published_date']); ?><?php endif; ?><br>
                    <span class="admin-rating-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span> <span class="admin-rating-text">5.0 Ratings</span><br>
                    <?php echo htmlspecialchars($book['edition'] ?? ''); ?><br>
                    ISBN: <?php echo htmlspecialchars($book['isbn'] ?? ''); ?><br>
                    Genres: <?php echo htmlspecialchars($book['genre'] ?? ''); ?>
                </div>
                <div class="book-description">
                    <b><?php echo htmlspecialchars($book['title'] ?? ''); ?></b> <?php echo nl2br(htmlspecialchars($book['description'] ?? 'No description available.')); ?>
                </div>
                <div class="admin-book-stats">
                    <?php
                    $borrowed = $bookOps->getBorrowedCount($bookId);
                    $stock = $book['stock'] ?? 0;
                    $remaining = $stock - $borrowed;
                    $status = $book['status'] ?? 'available';
                    $statusColor = 'admin-status-blue';
                    if ($remaining == 0) $statusColor = 'admin-status-red';
                    elseif ($remaining < $stock * 0.4) $statusColor = 'admin-status-yellow';
                    elseif ($remaining == $stock) $statusColor = 'admin-status-green';
                    ?>
                    <span>Stocks: <b><?php echo $stock; ?></b></span>
                    <span>Borrowed: <b><?php echo $borrowed; ?></b></span>
                    <span>Remaining: <b><?php echo $remaining; ?></b></span>
                    <span>Status: <b class="<?php echo $statusColor; ?>"><?php echo ucfirst($status); ?></b></span>
                </div>
            </div>
            <div class="book-image-container">
                <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg'); ?>" alt="Book Cover">
            </div>
        </div>
        <div class="admin-borrowers-table-section">
            <table class="admin-borrowers-table">
                <thead>
                    <tr>
                        <th>Borrowed by</th>
                        <th>Date Borrowed</th>
                        <th>Date Returned</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($borrowers as $row): ?>
                    <tr>
                        <td>
                            <img src="<?php echo htmlspecialchars($row['profile_image'] ?? '/images/Profile.svg'); ?>" alt="Profile" class="admin-borrower-img">
                            <?php echo htmlspecialchars($row['username']); ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['transaction_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['return_date'] ?? '-'); ?></td>
                        <td>
                            <?php
                            if ($row['return_date']) {
                                echo '<span class="admin-status-green">Returned</span>';
                            } else if ($row['due_date'] && strtotime($row['due_date']) < time()) {
                                $days = ceil((time() - strtotime($row['due_date'])) / (60*60*24));
                                echo '<span class="admin-status-red">Overdue ' . $days . ' days</span>';
                            } else {
                                echo '<span class="admin-status-blue">Borrowed</span>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html> 