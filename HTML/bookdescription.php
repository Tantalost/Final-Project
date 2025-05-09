<?php
require_once "book_operations.php";
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
    <title>Book Details</title>
    <link rel="stylesheet" href="/CSS/book description.css">
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
            <a href="Myshelf.php" class="active">
                <img src="/images/Myshelf.svg" width="20" height="20" alt="My Shelf">
                <span>My Shelf</span>
            </a>
            <a href="Searchpage.php">
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
                    <img class="logout-icon" src="/images/Log Out Button.svg" alt="Logout">
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
            <div class="book-details-container">
                <div class="book-image-container">
                    <img src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                         alt="<?php echo htmlspecialchars($book['title']); ?>" 
                         class="book-image">
                </div>
                <div class="book-info">
                    <h1 class="book-title"><?php echo htmlspecialchars($book['title']); ?></h1>
                    <div class="book-description">
                        <?php echo htmlspecialchars($book['description']); ?>
                    </div>
                    <div class="book-meta">
                        By <?php echo htmlspecialchars($book['authors']); ?>, 
                        <?php echo date('F d, Y', strtotime($book['published_date'])); ?><br>
                        <?php echo htmlspecialchars($book['edition']); ?> Edition<br>
                        ISBN: <?php echo htmlspecialchars($book['isbn']); ?><br>
                        Genres: <?php echo htmlspecialchars($book['genre']); ?>
                    </div>
                    <div class="rating">
                        <div class="stars">
                            <?php
                            $rating = $book['rating'] ?? 0;
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<div class="star' . ($i <= $rating ? ' filled' : '') . '"></div>';
                            }
                            ?>
                        </div>
                        <div class="rating-text"><?php echo number_format($rating, 1); ?> Ratings</div>
                    </div>
                    <div class="action-buttons">
                        <button class="borrow-button" id="openBorrowModal">Borrow</button>
                        <button class="book-cart-button" id="openCartModal">Book Cart</button>
                        <button class="add-to-shelf-button" id="openShelfModal">Add to My Shelf</button>
                        <div class="heart-button">
                            <img src="/images/Vector.svg" alt="Favorite">
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-books-section">
                <h2 class="section-title">Related Books</h2>
                <div class="related-books">
                    <?php
                    $relatedBooksResponse = $bookOps->getBooks(['genre' => $book['genre']]);
                    $relatedBooks = ($relatedBooksResponse['status'] === 'success') ? $relatedBooksResponse['data'] : [];

                    $relatedBooks = array_filter($relatedBooks, function($relatedBook) use ($book) {
                        return $relatedBook['book_id'] !== $book['book_id'];
                    });
                    $relatedBooks = array_slice($relatedBooks, 0, 8);
                    
                    foreach ($relatedBooks as $relatedBook):
                    ?>
                        <a href="bookdescription.php?book_id=<?php echo htmlspecialchars($relatedBook['book_id']); ?>" class="related-book">
                            <img src="<?php echo htmlspecialchars($relatedBook['image_url'] ?? '/images/default_book.svg'); ?>" 
                                 alt="<?php echo htmlspecialchars($relatedBook['title']); ?>"
                                 title="<?php echo htmlspecialchars($relatedBook['title']); ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>

    </div>

    <div class="modal-overlay" id="cartModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Book Cart
            </div>
            <div class="modal-body">
                <div class="book-info-row">
                    <img class="book-thumbnail" src="<?php echo htmlspecialchars($book['image_url'] ?? '/images/default_book.svg'); ?>" 
                         alt="<?php echo htmlspecialchars($book['title']); ?>">
                    <div class="book-details">
                        <div class="book-title-small"><?php echo htmlspecialchars($book['title']); ?></div>
                        <div><?php echo htmlspecialchars($book['authors']); ?></div>
                        <div><?php echo date('F d, Y', strtotime($book['published_date'])); ?></div>
                    </div>
                </div>
                <div class="user-id">
                    <span>Your ID: <?php echo htmlspecialchars($_SESSION['member_id']); ?></span>
                    <span>Total: 1</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="confirmCart">Confirm</button>
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="borrowModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Book Cart
            </div>
            <div class="modal-body">
                <div class="date-select">
                    <div class="date-label">Date Borrowed:</div>
                    <div class="date-inputs">
                        <select id="borrowDay">
                            <option value="01">01</option>
                        </select>
                        <select id="borrowMonth">
                            <option value="05">05</option>
                        </select>
                        <select id="borrowYear">
                            <option value="2024">2024</option>
                        </select>
                    </div>
                </div>
                
                <div class="date-select">
                    <div class="date-label">Due Date:</div>
                    <div class="date-inputs">
                        <select id="dueDay">
                            <option value="01">01</option>
                            <!-- Additional options would be populated here -->
                        </select>
                        <select id="dueMonth">
                            <option value="05">05</option>
                            <!-- Additional options would be populated here -->
                        </select>
                        <select id="dueYear">
                            <option value="2024">2024</option>
                            <!-- Additional options would be populated here -->
                        </select>
                    </div>
                </div>
                
                <div class="borrow-rules">
                    <ul>
                        <li>Make sure to return the book by the due date.</li>
                        <li>Return the book in good condition as borrowed.</li>
                        <li>Books borrowed for more than 30 days without renewal will be charged.</li>
                        <li>For damaged books or book house problems, please report to the librarian.</li>
                        <li>Any books not returned within 2 weeks after the due date will be considered lost.</li>
                        <li>Lost books must be paid for.</li>
                    </ul>
                </div>
                
                <div class="small-text">
                    Please double check details before borrowing
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="confirmBorrow">Borrow</button>
            </div>
        </div>
    </div>
    
    <!-- Success Modal -->
    <div class="modal-overlay" id="successModalOverlay">
        <div class="modal">
            <div class="success-icon">
                <span class="checkmark">✓</span>
            </div>
            <div class="reminder-info">
                Success!<br>
                Thank you
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="closeSuccess">Close</button>
            </div>
        </div>
    </div>
    
    <!-- Reminder Modal -->
    <div class="modal-overlay" id="reminderModalOverlay">
        <div class="modal">
            <div class="reminder-info">
                <span class="reminder-icon"></span>
                Added to Book Cart
            </div>
            <div class="reminder-info">
                Thank You!
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="closeReminder">Close</button>
            </div>
        </div>
    </div>
    
    <!-- Add to My Shelf Modal -->
    <div class="modal-overlay" id="shelfModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Add to My Shelf
            </div>
            <div class="modal-body">
                <div class="shelf-title">Choose a shelf to add this book</div>
                
                <div class="shelf-options">
                    <div class="shelf-option selected">
                        <input type="radio" name="shelf" id="shelf1" checked>
                        <label for="shelf1">Main Shelf</label>
                    </div>
                    <div class="shelf-option">
                        <input type="radio" name="shelf" id="shelf2">
                        <label for="shelf2">Fantasy Books</label>
                    </div>
                    <div class="shelf-option">
                        <input type="radio" name="shelf" id="shelf3">
                        <label for="shelf3">Favorites</label>
                    </div>
                    <div class="shelf-option">
                        <input type="radio" name="shelf" id="shelf4">
                        <label for="shelf4">Reading List</label>
                    </div>
                </div>
                
                <div class="create-new-shelf">
                    <button id="createNewShelf">Create New Shelf</button>
                </div>
            </div>
            <div class="modal-buttons">
                <button class="cancel-button" id="cancelShelf">Cancel</button>
                <button class="modal-button" id="confirmShelf">Add</button>
            </div>
        </div>
    </div>
    
    <!-- Added to Shelf Success Modal -->
    <div class="modal-overlay" id="shelfSuccessModalOverlay">
        <div class="modal">
            <div class="shelf-success">
                <div class="shelf-success-icon">
                    <span class="checkmark">✓</span>
                </div>
                <div class="shelf-success-message">Successfully Added!</div>
                <div class="shelf-success-details">
                    "<?php echo htmlspecialchars($book['title']); ?>" has been added to your shelf.
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="closeShelfSuccess">OK</button>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuToggle && sidebar && mainContent) {
        if (window.innerWidth >= 768) {
             sidebar.classList.add('active');
             mainContent.classList.add('shifted');
        }

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
        });

        document.addEventListener('click', function(event) {
            if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    } else {
        console.error("Logout dropdown elements not found!");
    }
    
    // Modal scripts
    const cartModal = document.getElementById('cartModalOverlay');
    const borrowModal = document.getElementById('borrowModalOverlay');
    const successModal = document.getElementById('successModalOverlay');
    const reminderModal = document.getElementById('reminderModalOverlay');
    const shelfSuccessModal = document.getElementById('shelfSuccessModalOverlay');
    
    // Open cart modal
    document.getElementById('openCartModal').addEventListener('click', function() {
        cartModal.style.display = 'flex';
    });
    
    // Open borrow modal
    document.getElementById('openBorrowModal').addEventListener('click', function() {
        borrowModal.style.display = 'flex';
    });
    
    // MODIFIED: Open shelf success modal directly (one-click)
    document.getElementById('openShelfModal').addEventListener('click', function() {
        // Skip the shelf selection modal and go straight to success
        shelfSuccessModal.style.display = 'flex';
    });
    
    // Confirm cart button leads to reminder modal
    document.getElementById('confirmCart').addEventListener('click', function() {
        cartModal.style.display = 'none';
        reminderModal.style.display = 'flex';
    });
    
    // Confirm borrow button leads to success modal
    document.getElementById('confirmBorrow').addEventListener('click', function() {
        borrowModal.style.display = 'none';
        successModal.style.display = 'flex';
    });
    
    // Close success modal
    document.getElementById('closeSuccess').addEventListener('click', function() {
        successModal.style.display = 'none';
    });
    
    // Close reminder modal
    document.getElementById('closeReminder').addEventListener('click', function() {
        reminderModal.style.display = 'none';
    });
    
    // Close shelf success modal
    document.getElementById('closeShelfSuccess').addEventListener('click', function() {
        shelfSuccessModal.style.display = 'none';
    });
    
    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === cartModal) {
            cartModal.style.display = 'none';
        }
        if (event.target === borrowModal) {
            borrowModal.style.display = 'none';
        }
        if (event.target === successModal) {
            successModal.style.display = 'none';
        }
        if (event.target === reminderModal) {
            reminderModal.style.display = 'none';
        }
        if (event.target === shelfSuccessModal) {
            shelfSuccessModal.style.display = 'none';
        }
    });
    
    function populateDateDropdowns() {
        const days = document.querySelectorAll('#borrowDay, #dueDay');
        const months = document.querySelectorAll('#borrowMonth, #dueMonth');
        const years = document.querySelectorAll('#borrowYear, #dueYear');

        days.forEach(select => {
            select.innerHTML = '';
            for (let i = 1; i <= 31; i++) {
                const day = i.toString().padStart(2, '0');
                const option = document.createElement('option');
                option.value = day;
                option.textContent = day;
                select.appendChild(option);
            }
        });
        
        months.forEach(select => {
            select.innerHTML = '';
            for (let i = 1; i <= 12; i++) {
                const month = i.toString().padStart(2, '0');
                const option = document.createElement('option');
                option.value = month;
                option.textContent = month;
                select.appendChild(option);
            }
        });
    
        const currentYear = new Date().getFullYear();
        years.forEach(select => {
            select.innerHTML = '';
            for (let i = currentYear; i <= currentYear + 2; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                select.appendChild(option);
            }
        });
    }
    
    populateDateDropdowns();
});
    </script>

</body>
</html>