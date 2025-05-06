<?php
require_once "book_operations.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
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
                    ADD NEW BOOKS
                </div>
            </div>
            
            <div class="book-section">
                <div class="book-form">
                    <form id="bookInfo" onsubmit="return submitBook(event)">
                        <label>Book Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter Book Title" required>

                        <label>Author(s)</label>
                        <input type="text" id="authors" name="authors" placeholder="Enter Author(s)" required>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" id="isbn" name="isbn" placeholder="Enter ISBN" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="edition">Book Edition</label>
                                <input type="text" id="edition" name="edition" placeholder="Enter Book Edition">
                            </div>
                        </div>

                        <label>Genre</label>
                        <input type="text" id="genre" name="genre" placeholder="Enter Genre">

                        <label>Publisher</label>
                        <input type="text" id="publisher" name="publisher" placeholder="Enter Publisher">

                        <div class="form-row">
                            <div class="form-groups">
                                <label for="published_date">Published Date</label>
                                <input type="date" id="published_date" name="published_date">
                            </div>
                        
                            <div class="form-group">
                                <label for="stock">Stocks: <span id="stockDisplay">0</span></label>
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
                        <input type="hidden" id="image_url" name="image_url">
                    </div>
                    <h3>Book Description</h3>
                    <div class="description">
                        <textarea id="description" name="description" placeholder="Enter Book Description"></textarea>
                    </div>

                    <button class="submit" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div id="quantityModal" class="modal">
        <div class="modal-content">
            <img src="/images/logo.svg" alt="book icon" class="modal-icon">
            <h2>Add Quantity</h2>
            <div class="quantity-control">
                <button type="button" id="decrease" onclick="decreaseQuantity()">−</button>
                <span id="quantity">0</span>
                <button type="button" id="increase" onclick="increaseQuantity()">+</button>
            </div>
            <button class="modal-btn add" onclick="confirmQuantity()">Add</button>
            <button class="modal-btn cancel" onclick="closeQuantityModal()">Cancel</button>
        </div>
    </div>
      
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <img src="/images/logo.svg" alt="book icon" class="modal-icon">
            <h2>Addition Confirmation</h2>
            <div class="quantity-control">
                <p>Are you sure you want to add <span id="confirmQuantity">0</span> books?</p>
            </div>
            <button class="modal-btn add" onclick="closeConfirmationModal()">Add Book</button>
            <button class="modal-btn cancel" onclick="closeConfirmationModal()">Cancel</button>
        </div>
    </div>   

    <script>
        let currentQuantity = 0;
        let uploadedImageUrl = '';

        function showQuantityModal() {
            document.getElementById('quantityModal').style.display = 'flex';
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

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                // For now, we'll just store the file name
                // In a real application, you would upload this to a server
                uploadedImageUrl = '/images/books/' + file.name;
                document.getElementById('image_url').value = uploadedImageUrl;
            }
        }

        function submitBook(event) {
            if (event) {
                event.preventDefault();
            }

            const formData = new FormData();
            formData.append('action', 'add');
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
                    alert('Book added successfully!');
                    window.location.href = 'managebook.php';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the book');
            });

            return false;
        }
    </script>
</body>
</html> 