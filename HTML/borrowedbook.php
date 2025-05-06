<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Borrowed Books</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/CSS/borrowedbook.css">
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
            <li class="active"><a href="/HTML/managebook.html"><img src="/images/manage_books_vector.svg" alt="Manage Books"><span>Manage Books</span></a></li>
            <li><a href="/HTML/manageuser.html"><img src="/images/manage_users_vector.svg" alt="Manage Users"><span>Manage Users</span></a></li>
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
      </div>

      <main class="main-content" id="mainContent">
        <div class="header-container">
            <div class="header-title">
            <img src="/images/backbtn.svg" class="back-button"> 
                BORROWED BOOKS</div>
            </div>
          </header>

            <div class="content">
                <div class="header-actions">
                    <div class="count-display"><span class="count">78</span> Borrowed Books</div>
                    <div class="card">
                        <a href="returnbook.html">
                            <div class="action-box">
                                <img src="/images/return_book_vector.svg" alt="Return Confirmations" class="action-icon">
                                <span class="action-count">3</span>
                                <span class="action-label">Return Confirmation</span>
                            </div>
                        </a>
                    </div>
                    <div class="card">
                        <a href="reportbook.html">
                            <div class="action-box">
                                <img src="/images/report.svg" alt="Reports" class="action-icon">
                                <span class="action-count">16</span>
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

        <section class="table-section">
          <table>
            <thead>
              <tr>
                <th>User ID</th>
                <th>Book Name</th>
                <th>Date Borrowed</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>View Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#011234</td>
                <td>A Court of Wings and Ruin</td>
                <td>04/04/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="/images/view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal1" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>Harry Potter and the Deathly Hallows</td>
                <td>04/02/2024</td>
                <td>04/10/2024</td>
                <td class="status overdue">Overdue</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal2" style="cursor: pointer; width: 30px;"></td>
  </tr>
              </tr>
              <tr>
                <td>#011234</td>
                <td>A Christmas Carol</td>
                <td>04/03/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal3" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>The Wizard of Oz</td>
                <td>04/05/2024</td>
                <td>04/10/2024</td>
                <td class="status overdue">Overdue</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal4" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>Harry Potter and the Deathly Hallows</td>
                <td>04/04/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal5" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>Beginner's Step-by-Step Coding Course: Learn Computer Programming the Easy Way</td>
                <td>04/04/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal6" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>The Hobbit</td>
                <td>04/01/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal7" style="cursor: pointer; width: 30px;"></td>
              </tr>
              <tr>
                <td>#011234</td>
                <td>Harry Potter and the Deathly Hallows</td>
                <td>04/02/2024</td>
                <td>04/10/2024</td>
                <td class="status return">To be returned</td>
                <td><img src="view_details.svg" alt="View Details" class="view-details-icon" data-target="returnModal8" style="cursor: pointer; width: 30px;"></td>
              </tr>
            </tbody>
          </table>
        </section>
      </main>
    </div>
    <!-- Modal 1 -->
<div id="returnModal1" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="image 10.svg" alt="Book Cover">
      <div class="book-info">
        <h3>A Court of Wings and Ruin</h3>
        <p><strong>By</strong> Sarah J. Maas<br>978-0-7475-3269-9</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #08923</p>
        <p><strong>Date Borrowed:</strong> 04/03/24</p>
        <p><strong>Due Date:</strong> 04/10/24</p>
        <p><strong>Returned Date:</strong> 04/10/24</p>
        <p><strong>Days Overdue:</strong> --</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<!-- Modal 2 -->
<div id="returnModal2" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="image 3.svg" alt="Book Cover">
      <div class="book-info">
        <h3>Harry Potter and the Deathly Hallows</h3>
        <p><strong>By</strong> Charles Dickens<br>978-1-56619-909-4</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">OVERDUE</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<!-- Modal 3 -->
<div id="returnModal3" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="/logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="/images/wizard_of_oz.jpg" alt="Book Cover">
      <div class="book-info">
        <h3>A Christmas Caro</h3>
        <p><strong>By</strong> L. Frank Baum<br>978-0-14-132102-8</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 3 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="overdue">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<!-- Modal 4 -->
<div id="returnModal4" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="image 22.svg" alt="Book Cover">
      <div class="book-info">
        <h3>	The Wizard of Oz</h3>
        <p><strong>By</strong> J.K. Rowling<br>978-0-545-01022-1</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">OVERDUE</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<!-- Modal 5 -->
<div id="returnModal5" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="image 22.svg" alt="Book Cover">
      <div class="book-info">
        <h3>Harry Potter and the Deathly Hallows</h3>
        <p><strong>By</strong> DK Publishing <br>978-1-4654-8083-7</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<!-- Modal 6 -->
<div id="returnModal6" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="/images/the_hobbit.jpg" alt="Book Cover">
      <div class="book-info">
        <h3>Beginner's Step-by-Step Coding Course: Learn Computer Programming the Easy Way</h3>
        <p><strong>By</strong> J.R.R. Tolkien<br>978-0-618-00221-3</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>
<!-- Modal 7 -->
<div id="returnModal7" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="/images/ugly_love.jpg" alt="Book Cover">
      <div class="book-info">
        <h3>The Hobbit</h3>
        <p><strong>By</strong> Colleen Hoover<br>978-1-4767-6611-2</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>
<!-- Modal 8 -->
<div id="returnModal8" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <div class="modal-header">
      <img src="logo (3).svg" alt="Return Icon">
      <h2>Borrow Details</h2>
    </div>
    <div class="modal-body">
      <img class="book-cover" src="image 22.svg" alt="Book Cover">
      <div class="book-info">
        <h3>Harry Potter and the Deathly Hallows</h3>
        <p><strong>By</strong> Alice Oseman<br>978-1-338-54056-6</p>
        <p><strong>Borrowed by:</strong> Barbie Santos #011234</p>
        <p><strong>Date Borrowed:</strong> 04/04/24</p>
        <p><strong>Due Date:</strong> 04/04/24</p>
        <p><strong>Returned Date:</strong> --</p>
        <p><strong>Days Overdue:</strong> 0 Days</p>
        <p><strong>Payment Method:</strong> --</p>
        <p><strong>Payment Status:</strong> <span class="pending">--</span></p>
      </div>
    </div>
    <div class="modal-actions">
      <button class="close-btn">Close</button>
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
    </script>
  </body>
  </html>