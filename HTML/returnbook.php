<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/returnbook.css">
</head>
<body>
    <div class="container">
      <nav class="sidebar" id="sidebar">
        <div class="logo">
          <img src="/images/logo (3).svg" alt="Library Logo">
        </div>
        <div class="menu-wrapper">
          <ul class="menu">
            <li><a href="/HTML/admindash.php"><img src="/images/dashboard_vector.svg" alt="Dashboard"><span>Dashboard</span></a></li>
            <li class="active"><a href="/HTML/managebook.php"><img src="/images/manage_books_vector.svg" alt="Manage Books"><span>Manage Books</span></a></li>
            <li><a href="/HTML/manageuser.php"><img src="/images/manage_users_vector.svg" alt="Manage Users"><span>Manage Users</span></a></li>
          </ul>
        </div>
        <div class="footer-sidebar">
          <a href="#">About</a>
          <a href="#">Support</a>
          <a href="#">Terms & condition</a>
        </div>
      </nav>
      <div class="topbar" id="topbar">
        <div class="user-info">
          <button id="menu-toggle" class="menu-toggle">
            <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
          </button>
          <img src="/images/Profile.svg" alt="Profile">
          <div class="user-details">
            <div class="user-name">Rashdy Arobie</div>
            <div class="user-role">Admin</div>
          </div>
        </div>
      </div>

      <main class="main-content" id="mainContent">
          <div class="header-container">
            <div class="header-title">
            <a href="borrowedbook.php">
              <img src="/images/backbtn.svg" class="back-button">
            </a>
                RETURNED BOOKS</div>
            </div>
          </header>

            <div class="content">
              <div class="header-actions">
                <div class="count-display"><span class="count">190</span> Returned Books</div>
                    <div class="card">
                        <a href="borrowedbook.php">
                            <div class="action-box">
                                <img src="/images/borrow_book_vector.svg" alt="borrowed books" class="action-icon">
                                <span class="action-count">6</span>
                                <span class="action-label">Borrowed Books</span>
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="reportbook.php">
                            <div class="action-box">
                                <img src="/images/report.svg" alt="Reports" class="action-icon">
                                <span class="action-count">30</span>
                                <span class="action-label">Reports Available</span>
                            </div>
                        </a>
                    </div>
            </div>


            <div class="search-bar">
              <select>
                <option>All</option>
                <option>Title</option>
                <option>Author</option>
                <option>ISBN</option>
              </select>
              <input type="text" placeholder="Search">
              <button>Search</button>
            </div>
            </div>
          </header>
          <section class="table-section">
            <table>
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Book Name</th>
                  <th>Date Returned</th>
                  <th>Overdue Fined </th>
                  <th>Status</th>
                  <th>View Details</th>
                </tr>
              </thead>
        <tbody>
            <tbody>
                <tr>
                  <td>#011234</td>
                  <td>A Court of Wings and Ruin</td>
                  <td>04/10/2024</td>
                  <td>--</td>
                  <td class="status return">To be returned</td>
                  <td><img src="/images/view.svg"alt="View Details" class="view-details-icon" data-target="returnModal1" style="cursor: pointer; width: 30px;"></td>
                </tr>
                <tr>
                  <td>#011234</td>
                  <td>Harry Potter and the Deathly Hallows</td>
                  <td>04/14/2024</td>
                  <td>PHP 109.00 </td>
                  <td class="status overdue">Overdue</td>
                  <td><img src="/images/view.svg" alt="View Details" class="view-details-icon" data-target="returnModal2" style="cursor: pointer; width: 30px;"></td>
    </tr>
                </tr>
                <tr>
                  <td>#011234</td>
                  <td>A Christmas Carol</td>
                  <td>04/09/2024</td>
                  <td>--</td>
                  <td class="status return">To be returned</td>
                  <td><img src="/images/view.svg" alt="View Details" class="view-details-icon" data-target="returnModal3" style="cursor: pointer; width: 30px;"></td>
                </tr>

        </tbody>
        <div id="returnModal1" class="modal">
          <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="modal-header">
              <img src="/images/logo (3).svg" alt="Return Icon">
              <h2>Return Details</h2>
            </div>
            <div class="modal-body">
              <img class="book-cover" src="/images/image 10.svg" alt="Book Cover">
              <div class="book-info">
                <h3>A Court of Wings and Ruin</h3>
                <p><strong>By</strong> Sarah J. Maas<br> 978-0-7475-3269-9</p>
                <p><strong>Borrowed by:</strong> Barbie Santos #08923</p>
                <p><strong>Date Borrowed:</strong> 04/04/24</p>
                <p><strong>Due Date:</strong> 04/10/24</p>
                <p><strong>Returned Date:</strong> 04/10/24</p>
                <p><strong>Days Overdue:</strong> 0 Days</p>
                <p><strong>Payment Method:</strong> GCASH</p>
                <p><strong>Payment Status:</strong> <span class="paid">PAID</span></p>
              </div>
            </div>
            <div class="modal-actions">
              <button class="confirm-btn">Confirm</button>
              <button class="close-btn">Close</button>
            </div>
          </div>
        </div>
        
            <div id="returnModal2" class="modal">
          <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="modal-header">
              <img src="/images/payment_icon.svg" alt="Return Icon">
              <h2>Return Details</h2>
            </div>
            <div class="modal-body">
              <img class="book-cover" src="/images/sample_book.jpg" alt="Book Cover">
              <div class="book-info">
                <h3>Harry Potter and the Deathly Hallows</h3>
                <p><strong>By</strong> J.K. Rowling<br>978-0-7475-3269-9</p>
                <p><strong>Borrowed by:</strong> Barbie Santos #08923</p>
                <p><strong>Date Borrowed:</strong> 04/03/24</p>
                <p><strong>Due Date:</strong> 04/10/24</p>
                <p><strong>Returned Date:</strong> 04/14/24</p>
                <p><strong>Days Overdue:</strong> 4 Days</p>
                <p><strong>Payment Method:</strong> GCASH</p>
                <p><strong>Payment Status:</strong> <span class="paid">PAID</span></p>
              </div>
            </div>
            <div class="modal-actions">
              <button class="confirm-btn">Confirm</button>
              <button class="close-btn">Close</button>
            </div>
          </div>
        </div>
        </div>
        
        <div id="returnModal3" class="modal">
          <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="modal-header">
              <img src="/images/payment_icon.svg" alt="Return Icon">
              <h2>Return Details</h2>
            </div>
            <div class="modal-body">
              <img class="book-cover" src="/images/a_christmas_carol.jpg" alt="Book Cover">
              <div class="book-info">
                <h3>A Christmas Carol</h3>
                <p><strong>By</strong> Charles Dickens<br>978-1-56619-909-4</p>
                <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
                <p><strong>Date Borrowed:</strong> 04/04/24</p>
                <p><strong>Due Date:</strong> 04/10/24</p>
                <p><strong>Returned Date:</strong> 04/09/24</p>
                <p><strong>Days Overdue:</strong> 0 Days</p>
                <p><strong>Payment Method:</strong> GCASH</p>
                <p><strong>Payment Status:</strong> <span class="pending">PAID</span></p>
              </div>
            </div>
              <div class="modal-actions">
                <button class="confirm-btn">Confirm</button>
                <button class="close-btn">Close</button>
              </div>
            </div>
          </div>
          <div id="return-confirmation-modal" class="modal">
            <div class="modal-content">
              <img src="/images/logo (3).svg" alt="Book Icon">
              <p>Are you sure you wish to confirm the return of this book?</p>
              <div class="return-buttons">
                <button id="confirm-return-btn" class="confirm-btn">Yes</button>
                <button id="cancel-return-btn" class="cancel-btn">No</button>
              </div>
            </div>
          </div>
        
        
        
    <script>
      const menuToggle = document.getElementById('menu-toggle');
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('mainContent');
      const topbar = document.getElementById('topbar');

      menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        mainContent.classList.toggle('shifted');
        topbar.classList.toggle('shifted');
      });
      const viewIcons = document.querySelectorAll(".view-details-icon");
      const closeButtons = document.querySelectorAll(".close-btn");

 

  viewIcons.forEach(icon => {
    icon.addEventListener("click", () => {
      const targetId = icon.getAttribute("data-target");
      const modal = document.getElementById(targetId);
      if (modal) {
        modal.style.display = "flex";
      }
    });
  });

  
  closeButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      const modal = btn.closest(".modal");
      if (modal) {
        modal.style.display = "none";
      }
    });
  });

  
  window.addEventListener("click", (event) => {
    const modals = document.querySelectorAll(".modal");
    modals.forEach(modal => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  });

  const confirmButtons = document.querySelectorAll(".confirm-btn");
  const confirmationModal = document.getElementById("return-confirmation-modal");
  const confirmReturnBtn = document.getElementById("confirm-return-btn");
  const cancelReturnBtn = document.getElementById("cancel-return-btn");

  let activeReturnModal = null;

 
  confirmButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      activeReturnModal = btn.closest(".modal");
      confirmationModal.style.display = "flex";
    });
  });

  
  confirmReturnBtn.addEventListener("click", () => {
    confirmationModal.style.display = "none";

    if (activeReturnModal) {
      activeReturnModal.style.display = "none";
    }

    alert("Book return confirmed! ✅");

    activeReturnModal = null;
  });

  
  cancelReturnBtn.addEventListener("click", () => {
    confirmationModal.style.display = "none";
  });
          </script>
</body>
</html>