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
$bookOps = new BookOperations($pdo);
$memberOps = new MemberOperations($pdo);

// Handle borrowing books
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrow_books'])) {
    $selectedBooks = $_POST['selected_books'] ?? [];
    $borrowDuration = $_POST['borrow_duration'] ?? 14; // Default 14 days
    
    if (!empty($selectedBooks)) {
        $dueDate = date('Y-m-d', strtotime("+{$borrowDuration} days"));
        
        foreach ($selectedBooks as $bookId) {
            try {
                // Check if book is available
                $stmt = $pdo->prepare("SELECT stock FROM books WHERE book_id = ?");
                $stmt->execute([$bookId]);
                $book = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($book && $book['stock'] > 0) {
                    // Create transaction
                    $stmt = $pdo->prepare("
                        INSERT INTO transactions (user_id, book_id, transaction_type, due_date, return_date)
                        VALUES (?, ?, 'borrow', ?, NULL)
                    ");
                    if (!$stmt->execute([$memberId, $bookId, $dueDate])) {
                        print_r($stmt->errorInfo());
                    }
                    
                    // Update book stock
                    $stmt = $pdo->prepare("
                        UPDATE books 
                        SET stock = stock - 1,
                            status = CASE WHEN stock - 1 = 0 THEN 'borrowed' ELSE status END
                        WHERE book_id = ?
                    ");
                    if (!$stmt->execute([$bookId])) {
                        print_r($stmt->errorInfo());
                    }
                    
                    // Remove from shelves
                    $stmt = $pdo->prepare("DELETE FROM shelves WHERE user_id = ? AND book_id = ?");
                    $stmt->execute([$memberId, $bookId]);
                    
                    // Add notification for borrowed book
                    $bookInfo = $bookOps->getBookById($bookId);
                    if ($bookInfo) {
                        $memberOps->addNotification(
                            $memberId,
                            'Book Borrowed',
                            "You've borrowed '{$bookInfo['title']}'. Due date: " . date('M d, Y', strtotime($dueDate))
                        );
                    } else {
                        echo "Failed to fetch book info for ID: $bookId";
                    }
                } else {
                    echo "Book not available or out of stock.";
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        $_SESSION['total_borrowed_books'] = count($memberOps->getBorrowedBooks($memberId));
        
        header("Location: Member-Homepage.php?borrow_success=1");
        exit();
    }
}

$stmt = $pdo->prepare("
    SELECT b.*, s.status as list_status
    FROM shelves s
    JOIN books b ON s.book_id = b.book_id
    WHERE s.user_id = ? AND s.status = 'reading'
    AND s.book_id NOT IN (SELECT book_id FROM transactions WHERE user_id = ? AND transaction_type = 'borrow')
");
$stmt->execute([$memberId, $memberId]);
$userBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
            <a href="Searchpage.php">
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
        </header>

        <main class="content">
            <div class="header-container">
                <div class="header-title">
                <a href="Member-Homepage.php">
                    <img src="/images/backbtn.svg" class="back-button">
                </a>
                    BORROW BOOKS</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button">All</button>
                    <input type="text" class="search-input" placeholder="Search Books">
                </div>

                <a href="/" class="browse"> 
                    Browse
                    <img src="/images/browse.svg">
                </a>
            </div>

            <form method="POST" action="" id="borrowForm">
                <div class="borrow-duration">
                    <label for="borrow_duration">Borrow Duration (days):</label>
                    <select name="borrow_duration" id="borrow_duration">
                        <option value="7">7 days</option>
                        <option value="14" selected>14 days</option>
                        <option value="21">21 days</option>
                        <option value="30">30 days</option>
                    </select>
                </div>

                <table class="book-table">
                    <thead class="book-header">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userBooks as $book): ?>
                            <tr class="book-row">
                                <td>
                                    <div class="book-info">
                                        <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg'); ?>" 
                                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                                             class="book-cover">
                                        <div class="book-details">
                                            <h4><?php echo htmlspecialchars($book['title']); ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($book['authors']); ?></td>
                                <td><?php echo htmlspecialchars($book['genre']); ?></td>
                                <td>
                                    <div class="<?php echo $book['stock'] > 0 ? 'available' : 'not-available'; ?>">
                                        <?php echo $book['stock'] > 0 ? 'Available' : 'Not Available'; ?>
                                    </div>
                                </td>
                                <td>
                                    <input type="checkbox" class="checkbox" name="selected_books[]" value="<?php echo $book['book_id']; ?>"
                                           <?php echo $book['stock'] <= 0 ? 'disabled' : ''; ?>>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="bottom-select">
                    <label class="select-all">
                        <input type="checkbox" id="select-all-checkbox">
                        <span>ALL</span>
                    </label>
                    <div class="right-side">
                        <div class="total-count">Total: <span id="total-count">0</span></div>
                        <button type="button" name="borrow_books" class="button" id="borrowbutton">Borrow</button>
                    </div>
                </div>
            </form>
        </main>

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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('select-all-checkbox');
        const bookCheckboxes = document.querySelectorAll('input[name="selected_books[]"]');
        const totalCountSpan = document.getElementById('total-count');
        const borrowButton = document.getElementById('borrowbutton');

        function updateTotalCount() {
            const selectedCount = document.querySelectorAll('input[name="selected_books[]"]:checked').length;
            totalCountSpan.textContent = selectedCount;
            borrowButton.disabled = selectedCount === 0;
        }

        selectAllCheckbox.addEventListener('change', function() {
            bookCheckboxes.forEach(checkbox => {
                if (!checkbox.disabled) {
                    checkbox.checked = this.checked;
                }
            });
            updateTotalCount();
        });

        bookCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateTotalCount);
        });

        updateTotalCount();

        const confirmBtn = document.getElementById('confirm');

confirmBtn.addEventListener('click', async function () {
    const selectedBookIds = Array.from(document.querySelectorAll('input[name="selected_books[]"]:checked'))
        .map(cb => cb.value);
    const borrowDuration = parseInt(document.getElementById('borrow_duration').value);

    try {
        const response = await fetch('ajax_borrow_books.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                selected_books: selectedBookIds,
                borrow_duration: borrowDuration
            })
        });

        const result = await response.json();

        if (result.success) {
            document.getElementById('confirmationModal').style.display = 'none';
            document.getElementById('successModal').style.display = 'block';

            result.borrowed_books.forEach(bookId => {
                const checkbox = document.querySelector(input[name="selected_books[]"][value="${bookId}"]);
                if (checkbox) {
                    checkbox.closest('tr').remove();
                }
            });

            document.getElementById('total-count').textContent =
                document.querySelectorAll('input[name="selected_books[]"]:checked').length;

        } else {
            alert("Borrow failed: " + (result.message || "Unknown error"));
        }
    } catch (error) {
        console.error("AJAX error:", error);
        alert("An error occurred while borrowing books.");
    }
});
    });
    </script>

</body>
</html>