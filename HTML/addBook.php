<?php
require_once "book_operations.php";
session_start();

$uploadError = '';
$successMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_url = null;
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
        'image_url' => $image_url ?? ($_POST['image_url'] ?? null),
    ];
    $result = $bookOps->addBook($bookData);
    if ($result['status'] === 'success') {
        $successMsg = 'Book added successfully!';
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
                <div class="header-title" style="display: flex; align-items: center; gap: 10px;">
                    <img src="/images/backbtn.svg" class="back-button" onclick="window.location.href='managebook.php'"> 
                    <span style="font-size: 2rem; font-weight: 700; vertical-align: middle;">Add Book</span>
                </div>
            </div>
            
            <?php if ($uploadError): ?>
                <div style="color:red; text-align:center; margin-bottom:10px;"> <?php echo htmlspecialchars($uploadError); ?> </div>
            <?php endif; ?>
            <?php if ($successMsg): ?>
                <div style="color:green; text-align:center; margin-bottom:10px;"> <?php echo htmlspecialchars($successMsg); ?> </div>
            <?php endif; ?>

            <div class="book-section" style="display: flex; gap: 2rem; align-items: flex-start;">
                <form id="bookInfo" method="POST" enctype="multipart/form-data" style="flex: 2; max-width: 600px; display: flex; flex-direction: column; gap: 18px;">
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label>Book Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter Book Title" required style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label>Author(s)</label>
                        <input type="text" id="authors" name="authors" placeholder="Enter Author(s)" required style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                    </div>
                    <div style="display: flex; gap: 1.5rem;">
                        <div style="flex: 1; display: flex; flex-direction: column; gap: 8px;">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" name="isbn" placeholder="Enter ISBN" required style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                        </div>
                        <div style="flex: 1; display: flex; flex-direction: column; gap: 8px;">
                            <label for="edition">Book Edition</label>
                            <input type="text" id="edition" name="edition" placeholder="Enter Book Edition" style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label>Genre</label>
                        <input type="text" id="genre" name="genre" placeholder="Enter Genre" style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label>Publisher</label>
                        <input type="text" id="publisher" name="publisher" placeholder="Enter Publisher" style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                    </div>
                    <div style="display: flex; gap: 1.5rem;">
                        <div style="flex: 1; display: flex; flex-direction: column; gap: 8px;">
                            <label for="published_date">Published Date</label>
                            <input type="date" id="published_date" name="published_date" style="height: 48px; font-size: 1.15rem; padding: 0 14px;">
                        </div>
                        <div style="flex: 1; display: flex; align-items: center; gap: 0.5rem; margin-top: 24px;">
                            <label for="stock" style="margin-bottom: 0;">Stocks:</label>
                            <input type="number" id="stock" name="stock" value="0" min="0" style="width: 90px; height: 48px; font-size: 1.15rem; padding: 0 14px;">
                            <img src="/images/addbutton.svg" alt="add-button" onclick="showQuantityModal()" style="width: 28px; height: 28px; cursor: pointer; align-self: center;">
                        </div>
                    </div>
                    <div class="image-add" style="margin-top: 1rem;">
                        <input type="file" id="book-image" name="book_image" accept="image/svg+xml,image/png,image/jpeg">
                    </div>
                    <button class="submit" type="submit" style="margin-top: 2rem; align-self: center; font-size: 1.2rem; height: 54px; width: 60%;">Save</button>
                </form>
                <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 24px;">
                    <img id="preview-image" src="/images/books/default_book.svg" alt="Book Preview" style="width: 220px; height: 320px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.12); margin-bottom: 1.5rem;">
                    <div style="width: 100%;">
                        <h3 style="margin-bottom: 0.5rem;">Book Description</h3>
                        <textarea id="description" name="description" placeholder="Enter Book Description" style="width: 100%; min-height: 100px; border-radius: 8px; padding: 16px; border: 1px solid #ccc; font-size: 1.1rem; margin-top: 8px;"></textarea>
                    </div>
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
            document.getElementById('stock').value = currentQuantity;
            closeQuantityModal();
        }

        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        // Sidebar toggle logic
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                mainContent.classList.toggle('shifted');
                menuToggle.classList.toggle('shifted');
            });
            // Book image preview
            const bookImageInput = document.getElementById('book-image');
            const previewImage = document.getElementById('preview-image');
            bookImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        previewImage.src = evt.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImage.src = '/images/books/default_book.svg';
                }
            });
        });
    </script>
</body>
</html> 