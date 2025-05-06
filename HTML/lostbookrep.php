<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/lostbookrep.css">
    </head>
    
    <body>
      <div class="container">
          <nav class="sidebar" id="sidebar">
            <div class="logo">
              <img src="/images/logov5.svg" alt="Library Logo">
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
              <div class="profile">
                <img  src="/images/Profile.svg" alt="Profile">
              </div>
              
              <div class="user-details">
                <div class="user-name">Rashdy Arobie</div>
                <div class="user-role">Admin</div>
              </div>
            </div>
          </div>
    
          <main class="main-content" id="mainContent">
            <div class="header-container">
            <a href="reportbook.php">
                <div class="header-title">
                <img src="/images/backbtn.svg" class="back-button"> 
                    LOST BOOKS</div>
                </div>
              </a>
              </header>

              <div class="header-actions">
                <div class="count-display"><span class="count">5</span> Lost Books Reports</div>
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
              <section class="table-section">
  <table>
    <thead>
      <tr>
        <th>User ID</th>
        <th>Book Name</th>
        <th>Report Date Filed</th>
        <th>Fines</th>
        <th>Status</th>
        <th>View Details</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> #011234</td>
        <td>The Hobbit</td>
        <td>04/04/2024</td>
        <td>--</td>
        <td class="status review">To be Reviewed</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal" alt="View">
        </td>
      </tr>
      <tr>
        <td>#011234</td>
        <td> Harry Potter and the Deathly Hallows</td>
        <td>04/04/2024</td>
        <td>--</td>
        <td class="status review">To be Reviewed</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal2" alt="View"></td>
      </tr>
      <tr>
        <td> #011234</td>
        <td> Beginner's Step-by-Step Coding Course</td>
        <td>04/04/2024</td>
        <td>--</td>
        <td class="status review">To be Reviewed</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal3" alt="View"></td>
      </tr>
      <tr>
        <td> #011234</td>
        <td>The Hobbit</td>
        <td>04/04/2024</td>
        <td>PHP 949.00</td>
        <td class="status pending">Pending</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal4" alt="View"></td>
      </tr>
      <tr>
        <td> #011234</td>
        <td>Harry Potter and the Deathly Hallows</td>
        <td>04/04/2024</td>
        <td>PHP 899.00</td>
        <td class="status pending">Pending</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal5" alt="View"></td>
      </tr>
      <tr>
        <td>#011234</td>
        <td>Beginner's Step-by-Step Coding Course</td>
        <td>04/04/2024</td>
        <td>PHP 1990.00</td>
        <td class="status completed">Completed</td>
        <td><img src="/images/view.svg" class="icon view-details-icon" data-target="reportModal6" alt="View"></td>
      </tr>
    </tbody>
  </table>
</section>
</main>
</div>
<div id="reportModal" class="modal">
  <div class="modal-content">
    <h2>Report Details</h2>
    <div class="modal-body">
      <div class="left">
        <img src="/images/image 9.svg" alt="Book Cover" class="book-cover"/>
      </div>
      <div class="right">
        <h3>The Hobbit</h3>
        <p>By J.R.R. Tolkien</p>
        <p>978-0-345-33968-3</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Date Borrowed:</strong> 03/03/24</p>
        <p><strong>Due Date:</strong> 03/03/24</p>
        <p><strong>Date Lost:</strong> 03/01/24</p>
        <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
        <p><strong>Days Overdue:</strong> 4 Days</p>
        <p><strong>Status:</strong> To be Reviewed</p>
      </div>
    </div>

    <div class="admin-review">
      <label>Admin Review:</label>
      <textarea placeholder="Input here..."></textarea>
    </div>

    <div class="fee-breakdown">
      <h4>Fee Breakdown:</h4>
      <p><strong>Replacement Cost:</strong> PHP 0.00</p>
      <p><strong>Processing Fee:</strong> PHP 0.00</p>
      <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
    </div>

    <div class="replacement-fee">
      <label>Replacement Fee:</label>
      <input type="text" placeholder="Input amount..."/>
    </div>

    <div class="modal-actions">
      <button class="send-btn">Send</button>
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<div id="reportModal2" class="modal">
  <div class="modal-content">
    <h2> Report Details</h2>
    <div class="modal-body">
      <div class="left">
        <img src="/images/image 3.svg" alt="Book Cover" class="book-cover"/>
      </div>
      <div class="right">
        <h3>Harry Potter and the Deathly Hallows</h3>
        <p>By J.K. Rowling</p>
        <p>978-0-7475-3269-9</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Date Borrowed:</strong> 03/03/24</p>
        <p><strong>Due Date:</strong> 03/03/24</p>
        <p><strong>Date Lost:</strong> 03/01/24</p>
        <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
        <p><strong>Days Overdue:</strong> 4 Days</p>
        <p><strong>Status:</strong> To be Reviewed</p>
      </div>
    </div>

    <div class="admin-review">
      <label>Admin Review:</label>
      <textarea placeholder="Input here..."></textarea>
    </div>

    <div class="fee-breakdown">
      <h4>Fee Breakdown:</h4>
      <p><strong>Replacement Cost:</strong> PHP 0.00</p>
      <p><strong>Processing Fee:</strong> PHP 0.00</p>
      <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
    </div>

    <div class="replacement-fee">
      <label>Replacement Fee:</label>
      <input type="text" placeholder="Input amount..."/>
    </div>

    <div class="modal-actions">
      <button class="send-btn">Send</button>
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<div id="reportModal3" class="modal">
  <div class="modal-content">
    <h2> Report Details</h2>
    <div class="modal-body">
      <div class="left">
        <img src="/images/image 1.svg" alt="Book Cover" class="book-cover"/>
      </div>
      <div class="right">
        <h3>Beginners Step-by-Step Coding Course: Learn Computer Programming the Easy Way</h3>
        <p>By DK Publishing</p>
        <p>978-1-4654-7673-9</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Date Borrowed:</strong> 03/03/24</p>
        <p><strong>Due Date:</strong> 03/03/24</p>
        <p><strong>Date Lost:</strong> 03/01/24</p>
        <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
        <p><strong>Days Overdue:</strong> 4 Days</p>
        <p><strong>Status:</strong> To be Reviewed</p>
      </div>
    </div>

    <div class="admin-review">
      <label>Admin Review:</label>
      <textarea placeholder="Input here..."></textarea>
    </div>

    <div class="fee-breakdown">
      <h4>Fee Breakdown:</h4>
      <p><strong>Replacement Cost:</strong> PHP 0.00</p>
      <p><strong>Processing Fee:</strong> PHP 0.00</p>
      <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
    </div>

    <div class="replacement-fee">
      <label>Replacement Fee:</label>
      <input type="text" placeholder="Input amount..."/>
    </div>

    <div class="modal-actions">
      <button class="send-btn">Send</button>
      <button class="close-btn">Close</button>
    </div>
  </div>
</div>

<div id="reportModal4" class="modal">
  <div class="modal-content">
    <h2>Report Details</h2>
    <div class="modal-body">
      <div class="left">
        <img src="/images/image 2.svg" alt="Book Cover" class="book-cover"/>
      </div>
      <div class="right">
        <h3>The Hobbit</h3>
        <p>By J.R.R. Tolkien</p>
        <p>978-0-345-33968-3</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Reported by:</strong> Barbie Santos #08923</p>
        <p><strong>Date Borrowed:</strong> 03/03/24</p>
        <p><strong>Due Date:</strong> 03/03/24</p>
        <p><strong>Date Lost:</strong> 03/01/24</p>
        <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
        <p><strong>Days Overdue:</strong> 4 Days</p>
        <p><strong>Status:</strong> To be Reviewed</p>
      </div>
    </div>
    <div class="admin-review">
      <label>Admin Review:</label>
      <textarea placeholder="Input here..."></textarea>
    </div>

    <div class="fee-breakdown">
      <h4>Fee Breakdown:</h4>
      <p><strong>Replacement Cost:</strong> PHP 0.00</p>
      <p><strong>Processing Fee:</strong> PHP 0.00</p>
      <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
    </div>

    <div class="replacement-fee">
      <label>Replacement Fee:</label>
      <input type="text" placeholder="Input amount..."/>
    </div>

    <div class="modal-actions">
      <button class="send-btn">Send</button>
      <button class="close-btn">Close</button>
    </div>
    
  </div>
  </div>

    <div id="reportModal5" class="modal">
      <div class="modal-content">
        <h2> Report Details</h2>
        <div class="modal-body">
          <div class="left">
            <img src="/images/image 41.svg" alt="Book Cover" class="book-cover"/>
          </div>
          <div class="right">
            <h3>Harry Potter and the Deathly Hallows</h3>
            <p>By J.K. Rowling</p>
            <p>978-0-7475-3269-9</p>
            <p><strong>Reported by:</strong> Barbie Santos #08923</p>
            <p><strong>Reported by:</strong> Barbie Santos #08923</p>
            <p><strong>Date Borrowed:</strong> 03/03/24</p>
            <p><strong>Due Date:</strong> 03/03/24</p>
            <p><strong>Date Lost:</strong> 03/01/24</p>
            <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
            <p><strong>Days Overdue:</strong> 4 Days</p>
            <p><strong>Status:</strong> To be Reviewed</p>
          </div>
          
        </div>
        <div class="admin-review">
          <label>Admin Review:</label>
          <textarea placeholder="Input here..."></textarea>
        </div>
    
        <div class="fee-breakdown">
          <h4>Fee Breakdown:</h4>
          <p><strong>Replacement Cost:</strong> PHP 0.00</p>
          <p><strong>Processing Fee:</strong> PHP 0.00</p>
          <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
        </div>
    
        <div class="replacement-fee">
          <label>Replacement Fee:</label>
          <input type="text" placeholder="Input amount..."/>
        </div>
    
        <div class="modal-actions">
          <button class="send-btn">Send</button>
          <button class="close-btn">Close</button>
        </div>
      </div>
    </div>
    
    <div id="reportModal6" class="modal">
      <div class="modal-content">
        <h2> Report Details</h2>
        <div class="modal-body">
          <div class="left">
            <img src="/images/image 36.svg" alt="Book Cover" class="book-cover"/>
          </div>
          <div class="right">
            <h3>Beginners Step-by-Step Coding Course: Learn Computer Programming the Easy Way</h3>
            <p>By DK Publishing</p>
            <p>978-1-4654-7673-9</p>
            <p><strong>Reported by:</strong> Barbie Santos #08923</p>
            <p><strong>Date Borrowed:</strong> 03/03/24</p>
            <p><strong>Due Date:</strong> 03/03/24</p>
            <p><strong>Date Lost:</strong> 03/01/24</p>
            <p><strong>Lost Description:</strong> Was drenched in juice because of the flood.</p>
            <p><strong>Days Overdue:</strong> 4 Days</p>
            <p><strong>Status:</strong> To be Reviewed</p>
          </div>
        </div>
    
        <div class="admin-review">
          <label>Admin Review:</label>
          <textarea placeholder="Input here..."></textarea>
        </div>
    
        <div class="fee-breakdown">
          <h4>Fee Breakdown:</h4>
          <p><strong>Replacement Cost:</strong> PHP 0.00</p>
          <p><strong>Processing Fee:</strong> PHP 0.00</p>
          <p><strong>Overdue Fine (PHP 30.00/day):</strong> PHP 0.00</p>
        </div>
    
        <div class="replacement-fee">
          <label>Replacement Fee:</label>
          <input type="text" placeholder="Input amount..."/>
        </div>
    
        <div class="modal-actions">
          <button class="send-btn">Send</button>
          <button class="close-btn">Close</button>
        </div>
      </div>
    </div>
<div id="return-confirmation-modal" class="modal">
  <div class="modal-content">
    <img src="/images/logov4.svg" alt="Book Icon">
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
const sendButtons = document.querySelectorAll(".send-btn");
const confirmationModal = document.getElementById("return-confirmation-modal");
const confirmReturnBtn = document.getElementById("confirm-return-btn");
const cancelReturnBtn = document.getElementById("cancel-return-btn");

let activeReturnModal = null;

// Open modal on icon click
viewIcons.forEach(icon => {
  icon.addEventListener("click", () => {
    const targetId = icon.getAttribute("data-target");
    const modal = document.getElementById(targetId);
    if (modal) {
      modal.style.display = "flex";
    }
  });
});

// Close modal on 'Close' button
closeButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    const modal = btn.closest(".modal");
    if (modal) {
      modal.style.display = "none";
    }
  });
});

// Close modal by clicking outside modal content
window.addEventListener("click", (event) => {
  const modals = document.querySelectorAll(".modal");
  modals.forEach(modal => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});

// Send button triggers confirmation modal
sendButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    activeReturnModal = btn.closest(".modal");
    if (confirmationModal) {
      confirmationModal.style.display = "flex";
    }
  });
});

// Confirm 'Yes' button — closes both modals
confirmReturnBtn.addEventListener("click", () => {
  confirmationModal.style.display = "none";
  if (activeReturnModal) {
    activeReturnModal.style.display = "none";
    alert("Book report confirmed! ✅");
    activeReturnModal = null;
  }
});


cancelReturnBtn.addEventListener("click", () => {
  confirmationModal.style.display = "none";
});

  </script>
</body>
</html>