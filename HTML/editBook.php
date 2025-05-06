<?php
require_once "book_operations.php";
session_start();

$bookId = $_GET['book_id'] ?? null;
if (!$bookId) {
    die('Book ID is required.');
}
$bookResponse = $bookOps->getBookById($bookId);
if ($bookResponse['status'] !== 'success') {
    die('Book not found.');
}
$book = $bookResponse['data'];

$uploadError = '';
$successMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_url = $book['image_url'];
    if (isset($_FILES['book_image']) && $_FILES['book_image']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/svg+xml', 'image/png', 'image/jpeg'];
        $fileType = mime_content_type($_FILES['book_image']['tmp_name']);
        if (in_array($fileType, $allowedTypes)) {
            $ext = pathinfo($_FILES['book_image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid('book_', true) . '.' . $ext;
            $targetPath = __DIR__ . '/../images/books/' . $filename;
            if (move_uploaded_file($_FILES['book_image']['tmp_name'], $targetPath)) {
                $image_url = '/images/books/' . $filename;
            } else {
                $uploadError = 'Failed to move uploaded file.';
            }
        } else {
            $uploadError = 'Invalid file type. Only SVG, PNG, JPG, JPEG allowed.';
        }
    }
    $bookData = [
        'title' => $_POST['title'] ?? '',
        'authors' => $_POST['authors'] ?? '',
        'isbn' => $_POST['isbn'] ?? '',
        'edition' => $_POST['edition'] ?? '',
        'genre' => $_POST['genre'] ?? '',
        'publisher' => $_POST['publisher'] ?? '',
        'published_date' => $_POST['published_date'] ?? '',
        'stock' => $_POST['stock'] ?? 0,
        'description' => $_POST['description'] ?? '',
        'image_url' => $image_url,
    ];
    $result = $bookOps->updateBook($bookId, $bookData);
    if ($result['status'] === 'success') {
        $successMsg = 'Book updated successfully!';
        // Refresh book data
        $bookResponse = $bookOps->getBookById($bookId);
        $book = $bookResponse['data'];
    } else {
        $uploadError = $result['message'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="/CSS/addbookstyle.css">
    <link rel="stylesheet" href="/CSS/addbookmodal.css">
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

        <div class="content">
            <div class="header-container">
                <div class="header-title">
                    <img src="/images/backbtn.svg" class="back-button" onclick="window.location.href='managebook.php'"> 
                    EDIT BOOK
                </div>
            </div>
            
            <?php if ($uploadError): ?>
                <div style="color:red; text-align:center; margin-bottom:10px;"> <?php echo htmlspecialchars($uploadError); ?> </div>
            <?php endif; ?>
            <?php if ($successMsg): ?>
                <div style="color:green; text-align:center; margin-bottom:10px;"> <?php echo htmlspecialchars($successMsg); ?> </div>
            <?php endif; ?>

            <div class="book-section">
                <form id="editBookForm" method="POST" enctype="multipart/form-data" style="width:100%;">
                    <div class="book-form" style="margin-bottom:24px;">
                        <input type="hidden" id="book_id" name="book_id" value="<?php echo htmlspecialchars($book['book_id']); ?>">
                        <label>Book Title</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>

                        <label>Author(s)</label>
                        <input type="text" id="authors" name="authors" value="<?php echo htmlspecialchars($book['authors']); ?>" required>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="edition">Book Edition</label>
                                <input type="text" id="edition" name="edition" value="<?php echo htmlspecialchars($book['edition']); ?>">
                            </div>
                        </div>

                        <label>Genre</label>
                        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($book['genre']); ?>">

                        <label>Publisher</label>
                        <input type="text" id="publisher" name="publisher" value="<?php echo htmlspecialchars($book['publisher']); ?>">

                        <div class="form-row">
                            <div class="form-groups">
                                <label for="published_date">Published Date</label>
                                <input type="date" id="published_date" name="published_date" value="<?php echo htmlspecialchars($book['published_date']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stocks: <span id="stockDisplay"><?php echo htmlspecialchars($book['stock']); ?></span></label>
                                <img src="/images/addbutton.svg" alt="add-button" onclick="showQuantityModal()">
                            </div>
                        </div>

                        <div class="image-add" style="margin-top:16px;">
                            <?php if (!empty($book['image_url'])): ?>
                                <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="Current Book Image" style="max-width:100px;max-height:100px;display:block;margin-bottom:8px;">
                            <?php endif; ?>
                            <input type="file" id="book-image" name="book_image" accept="image/svg+xml,image/png,image/jpeg">
                        </div>
                        <input type="hidden" id="image_url" name="image_url" value="<?php echo htmlspecialchars($book['image_url']); ?>">
                    </div>
                    <div class="book-desc" style="margin-bottom:24px;">
                        <h3>Book Description</h3>
                        <div class="description">
                            <textarea id="description" name="description" placeholder="Enter Book Description" style="width:100%;min-height:100px;"><?php echo htmlspecialchars($book['description']); ?></textarea>
                        </div>
                        <input type="hidden" id="stock" name="stock" value="<?php echo htmlspecialchars($book['stock']); ?>">
                    </div>
                    <div style="text-align:center;margin-top:16px;">
                        <button class="submit" type="submit" style="padding:12px 32px;font-size:1.1rem;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="quantityModal" class="modal">
        <div class="modal-content">
            <img src="/images/logo.svg" alt="book icon" class="modal-icon">
            <h2>Edit Quantity</h2>
            <div class="quantity-control">
                <button type="button" id="decrease" onclick="decreaseQuantity()">−</button>
                <span id="quantity">0</span>
                <button type="button" id="increase" onclick="increaseQuantity()">+</button>
            </div>
            <button class="modal-btn add" onclick="confirmQuantity()">Set</button>
            <button class="modal-btn cancel" onclick="closeQuantityModal()">Cancel</button>
        </div>
    </div>

    <script>
        let currentQuantity = <?php echo (int)$book['stock']; ?>;
        document.getElementById('quantity').textContent = currentQuantity;

        function showQuantityModal() {
            document.getElementById('quantityModal').style.display = 'flex';
            document.getElementById('quantity').textContent = currentQuantity;
        }
        function closeQuantityModal() {
            document.getElementById('quantityModal').style.display = 'none';
        }
        function increaseQuantity() {
            currentQuantity++;
            document.getElementById('quantity').textContent = currentQuantity;
        }
        function decreaseQuantity() {
            if (currentQuantity > 0) {
                currentQuantity--;
                document.getElementById('quantity').textContent = currentQuantity;
            }
        }
        function confirmQuantity() {
            document.getElementById('stockDisplay').textContent = currentQuantity;
            document.getElementById('stock').value = currentQuantity;
            closeQuantityModal();
        }
    </script>
</body>
</html> 