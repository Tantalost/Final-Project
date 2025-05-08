<?php
require_once "book_operations.php";
session_start();

$filters = [
    'title' => null,
    'author' => null,
    'isbn' => null,
    'status' => $_GET['status'] ?? null
];


$filterType = $_GET['filter'] ?? 'all';
$searchTerm = trim($_GET['search'] ?? '');

if ($searchTerm !== '') {
    if ($filterType === 'all') {
        $filters['title'] = $searchTerm;
        $filters['author'] = $searchTerm;
        $filters['isbn'] = $searchTerm;
    } else {
        $filters[$filterType] = $searchTerm;
    }
}

$booksResponse = $bookOps->getBooks($filters);
$books = $booksResponse['status'] === 'success' ? $booksResponse['data'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="/CSS/managestyle.css">
    <link rel="stylesheet" href="/CSS/modalstyles.css">
</head>
<body>
    <button id="menu-toggle" class="menu-toggle">
        <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
    </button>
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img src="/images/logo.svg" alt="Library Logo">
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
            <div class="user-info">
                <img src="/images/Profile.svg" alt="Profile">
                <div class="user-details">
                    <div class="user-name"><?php echo htmlspecialchars($_SESSION['admin_name'] ?? 'Admin'); ?></div>
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
                    <div class="menu-item logout-option">
                        <img src="/images/logout_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="header-container">
                <div class="header-title">
                <a href="admindash.php">
                  <img src="/images/backbtn.svg" class="back-button">
                </a>
                    MANAGE BOOKS
                </div>
            </div>

            <div class="stats">
                <?php
                $totalBooks = count($books);
                $borrowedBooks = array_filter($books, function($book) {
                    return $book['status'] === 'borrowed';
                });
                $overdueBooks = array_filter($books, function($book) {
                    return $book['status'] === 'overdue';
                });
                ?>
                <div class="card" data-link="managebook.php">
                    <img src="/images/manage_books_vector.svg" alt="Total Books">
                    <div class="stat-info">
                        <h3><?php echo $totalBooks; ?></h3>
                        <p>Total Books</p>
                    </div>
                </div>
                <div class="card" data-link="borrowedbook.php">
                    <img src="/images/borrow_book_vector.svg" alt="Borrowed Books">
                    <div class="stat-info">
                        <h3>190</h3>
                        <p>Borrowed Books</p>
                    </div>
                </div>
                <div class="card" data-link="returnbook.php">
                    <img src="/images/return_book_vector.svg" alt="Return Confirmations">
                    <div class="stat-info">
                        <h3>20</h3>
                        <p>Overdue Books</p>
                    </div>
                </div>
            </div>

            <div class="search-section">
                <form method="GET" class="search-bar">
                    <select name="filter">
                        <option value="all" <?php echo ($_GET['filter'] ?? 'all') === 'all' ? 'selected' : ''; ?>>All</option>
                        <option value="title" <?php echo ($_GET['filter'] ?? '') === 'title' ? 'selected' : ''; ?>>Title</option>
                        <option value="author" <?php echo ($_GET['filter'] ?? '') === 'author' ? 'selected' : ''; ?>>Author</option>
                        <option value="isbn" <?php echo ($_GET['filter'] ?? '') === 'isbn' ? 'selected' : ''; ?>>ISBN</option>
                    </select>
                    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($searchTerm); ?>">
                    <button type="submit">
                        <img src="/images/Search.svg" alt="Search">
                    </button>
                </form>
                <div class="action-buttons">
                    <a href="addBook.php" class="cardbutton">
                        <img src="/images/addnew.svg" alt="Add">
                    </a>
                    <a href="manageFines.php" class="cardbutton">
                        <button class="cardbutton">
                            <img src="/images/ManagefINES.svg" alt="Fines">
                        </button>
                    </a>
                </div>
            </div>

            <div class="book-list">
                <?php foreach ($books as $book): 
                    $borrowedCount = $bookOps->getBorrowedCount($book['book_id']);
                    $reportCount = $bookOps->getReportCount($book['book_id']);
                ?>
                <div class="book <?php echo $book['status'] === 'unavailable' ? 'unavailable' : ''; ?>">
                <a href="bookdesc_admin.php?book_id=<?php echo $book['book_id']; ?>">
                <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/books/default_book.svg'); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
                </a>
                    <h3><?php echo htmlspecialchars($book['title']); ?></h3>
                    <p>By <?php echo htmlspecialchars($book['authors']); ?></p>
                    <p>ISBN: <?php echo htmlspecialchars($book['isbn']); ?></p>
                    <div class="book-stats">
                        <p>Stock:<br><?php echo htmlspecialchars($book['stock']); ?></p>
                        <p>Remaining:<br><?php echo htmlspecialchars($book['stock'] - $borrowedCount); ?></p>
                        <p>Reports:<br><?php echo $reportCount; ?></p>
                    </div>
                    <div class="book-footer">
                        <?php
                        $remaining = $book['stock'] - $borrowedCount;
                        $stock = $book['stock'];
                        $percent = $stock > 0 ? ($remaining / $stock) : 0;
                        $statusClass = '';
                        if ($remaining == $stock) {
                            $statusClass = 'status-green';
                        } elseif ($remaining == 0) {
                            $statusClass = 'status-red';
                        } elseif ($percent < 0.4) {
                            $statusClass = 'status-yellow';
                        } else {
                            $statusClass = 'status-green';
                        }
                        ?>
                        <span class="status <?php echo $statusClass; ?> <?php echo htmlspecialchars($book['status']); ?>"><?php echo ucfirst(htmlspecialchars($book['status'])); ?></span>
                        <div class="book-actions">
                            <a href="editBook.php?book_id=<?php echo $book['book_id']; ?>">
                                <img src="/images/editbtn.svg" alt="Edit">
                            </a>
                            <button onclick="deleteBook(<?php echo $book['book_id']; ?>)">
                                <img src="/images/deletebtn.svg" alt="Delete">
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <div id="profileModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Profile</h2>
            </div>
            <div class="modal-body">
                <div class="profile-image">
                    <img src="/images/Profile 1.svg" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%;">
                </div>
                <div class="profile-details">
                    <p><strong>Username:</strong> Rashdy Arobie</p>
                    <p><strong>User ID:</strong> #12345</p>
                    <p><strong>Status:</strong> <span class="status">Online</span></p>
                </div>
                <div class="profile-info">
                    <p><strong>Address:</strong> 123 Library St, City</p>
                    <p><strong>Date of Birth:</strong> January 1, 1990</p>
                    <p><strong>Phone Number:</strong> 123-456-7890</p>
                    <p><strong>Email:</strong> rashdy@example.com</p>
                    <p><strong>Date Joined:</strong> January 1, 2020</p>
                </div>
            </div>
            <div class="modal-actions">
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <div id="logoutModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content2">
            <img src="/images/logov4.svg" class="modal-logo">
            <div class="modal-header">
                <h2>Logout Confirmation</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" id="confirmLogout">Yes</button>
                <button class="modalbtn close">No</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteBookModal" class="viewmodal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Delete Book</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this book?</p>
                <input type="hidden" id="delete_book_id">
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" onclick="confirmDeleteBook()">Delete</button>
                <button class="modalbtn close" onclick="closeDeleteBookModal()">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function showAddBookModal() {
            document.getElementById('addBookModal').style.display = 'flex';
        }

        function closeAddBookModal() {
            document.getElementById('addBookModal').style.display = 'none';
        }

        function showEditBookModal() {
            document.getElementById('editBookModal').style.display = 'flex';
        }

        function closeEditBookModal() {
            document.getElementById('editBookModal').style.display = 'none';
        }

        function showDeleteBookModal() {
            document.getElementById('deleteBookModal').style.display = 'flex';
        }

        function closeDeleteBookModal() {
            document.getElementById('deleteBookModal').style.display = 'none';
        }

        // Book Operations
        function submitAddBook() {
            const form = document.getElementById('addBookForm');
            const formData = new FormData(form);
            formData.append('action', 'add');

            fetch('book_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Book added successfully');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the book');
            });
        }

        function editBook(bookId) {
            fetch(`book_ajax.php?action=get&book_id=${bookId}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const book = data.data;
                    const form = document.getElementById('editBookForm');
                    form.book_id.value = book.book_id;
                    form.title.value = book.title;
                    form.authors.value = book.authors;
                    form.isbn.value = book.isbn;
                    form.edition.value = book.edition || '';
                    form.genre.value = book.genre || '';
                    form.publisher.value = book.publisher || '';
                    form.published_date.value = book.published_date || '';
                    form.stock.value = book.stock;
                    form.description.value = book.description || '';
                    form.image_url.value = book.image_url || '';
                    showEditBookModal();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching book details');
            });
        }

        function submitEditBook() {
            const form = document.getElementById('editBookForm');
            const formData = new FormData(form);
            formData.append('action', 'update');

            fetch('book_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Book updated successfully');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the book');
            });
        }

        function deleteBook(bookId) {
            document.getElementById('delete_book_id').value = bookId;
            showDeleteBookModal();
        }

        function confirmDeleteBook() {
            const bookId = document.getElementById('delete_book_id').value;
            const formData = new FormData();
            formData.append('action', 'delete');
            formData.append('book_id', bookId);

            fetch('book_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Book deleted successfully');
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while deleting the book');
            });
        }
    </script>
    
    <script src="/js/modals.js"></script>
    <script src="/js/admindash.js"></script>
</body>
</html> 