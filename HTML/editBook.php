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
            
            <div class="book-section">
                <div class="book-form">
                    <form id="editBookForm" onsubmit="return submitEditBook(event)">
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
                    </form>
                </div>

                <div class="book-desc">
                    <div class="image-add">
                        <input type="file" id="book-image" name="book-image" accept="image/*" onchange="handleImageUpload(event)" hidden>
                        <label for="book-image" class="image-upload">
                            <img src="/images/addBookImage.svg" alt="Upload Icon">
                        </label>
                        <input type="hidden" id="image_url" name="image_url" value="<?php echo htmlspecialchars($book['image_url']); ?>">
                    </div>
                    <h3>Book Description</h3>
                    <div class="description">
                        <textarea id="description" name="description" placeholder="Enter Book Description"><?php echo htmlspecialchars($book['description']); ?></textarea>
                    </div>

                    <button class="submit" type="submit">Save Changes</button>
                </div>
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
            closeQuantityModal();
        }
        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                // For now, just use the file name (in production, upload to server)
                document.getElementById('image_url').value = '/images/books/' + file.name;
            }
        }
        function submitEditBook(event) {
            event.preventDefault();
            const formData = new FormData();
            formData.append('action', 'update');
            formData.append('book_id', document.getElementById('book_id').value);
            formData.append('title', document.getElementById('title').value);
            formData.append('authors', document.getElementById('authors').value);
            formData.append('isbn', document.getElementById('isbn').value);
            formData.append('edition', document.getElementById('edition').value);
            formData.append('genre', document.getElementById('genre').value);
            formData.append('publisher', document.getElementById('publisher').value);
            formData.append('published_date', document.getElementById('published_date').value);
            formData.append('stock', currentQuantity);
            formData.append('description', document.getElementById('description').value);
            formData.append('image_url', document.getElementById('image_url').value);

            fetch('book_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Book updated successfully!');
                    window.location.href = 'managebook.php';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the book');
            });
            return false;
        }
    </script>
</body>
</html> 