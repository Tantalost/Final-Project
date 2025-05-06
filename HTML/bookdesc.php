<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="/CSS/bookdesc.css">
   
</head>
<body>
    <div class="topbar">
        <div class="user-profile">
            <div class="profile-icon">
                <img src="/images/Profile.svg" alt="Profile Icon">
            </div>
            <div class="user-info">
                <div class="username">BARBIE SANTOS</div>
                <div class="user-type">Student</div>
            </div>
        </div>
        <div class="logout">
            <img src="/images/LogOut_vector.svg" alt="Logout Icon">
        </div>
    </div>

    <aside class="sidebar">
        <div class="logo-container">
            <img src="/images/logo.svg" alt="Library Logo" class="logo">
        </div>
        <nav class="nav-menu">
            <ul>
                <li class="nav-item">
                    <a href="/HTML/Member-Homepage.html">
                        <img src="/images/Home.svg" alt="Home" class="nav-icon" width="20" height="20">
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#">
                        <img src="/images/Myshelf.svg" alt="My Shelf" class="nav-icon" width="20" height="20">
                        <span>My Shelf</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <img src="/images/Search.svg" alt="Search" class="nav-icon" width="20" height="20">
                        <span>Search</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <a href="#">About</a>
            <a href="#">Support</a>
            <a href="#">Terms & condition</a>
        </div>
    </aside>

   
    <main class="main-content">
        <div class="book-details-container">
            <div class="book-image-container">
                <img src="/images/image 1.svg" alt="Book Cover" class="book-image">
            </div>
            <div class="book-info">
                <h1 class="book-title">HARRY POTTER AND THE PHILOSOPHER'S STONE</h1>
                <div class="book-description">
                    Harry Potter and the Philosopher's Stone is a fantasy novel written by the British author J. K. Rowling. It is the first novel in the Harry Potter series and was Rowling's debut novel. The story follows Harry Potter, a young boy who discovers he is a wizard and is invited to attend Hogwarts School of Witchcraft and Wizardry.
                </div>
                <div class="book-meta">
                    By J. K. Rowling, June 26, 1997<br>
                    1st Edition<br>
                    ISBN: 978-0-7475-3269-9<br>
                    Genres: Novel, Children's literature, Fantasy Fiction, High fantasy
                </div>
                <div class="rating">
                    <div class="stars">
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                        <div class="star"></div>
                    </div>
                    <div class="rating-text">5.0 Ratings</div>
                </div>
                <div class="action-buttons">
                    <button class="borrow-button">Borrow</button>
                    <button class="book-cart-button">Book Cart</button>
                    <button class="add-to-shelf-button">Add to My Shelf</button>
                    <div class="heart-button">
                        <img src="/images/Vector.svg" alt="Favorite">
                    </div>
                </div>
            </div>
        </div>

        <div class="related-books-section">
            <h2 class="section-title">Related Books</h2>
            <div class="related-books">
                <div class="related-book">
                    <img src="/images/image 3.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 2.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 1.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 22.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 23.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 24.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 8.svg" alt="Related Book">
                </div>
                <div class="related-book">
                    <img src="/images/image 25.svg" alt="Related Book">
                </div>
            </div>
        </div>
    </main>
</body>
</html>