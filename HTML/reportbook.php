<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Available</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/CSS/reportbook.css">
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
              <a href="borrowedbook.php">
                <div class="header-title">
                <img src="/images/backbtn.svg" class="back-button"> 
                    REPORTS AVAILABLE</div>
                </div>
                </a>
              </header>
    
                <div class="content">
                  <div class="header-actions">
                    <div class="count-display"><span class="count">7</span> Reports Available</div>
                        <div class="card">
                            <a href="/html/damagebookrep.php">
                                <div class="action-box">
                                    <img src="/images/damaged_book_vector.svg" alt="Damaged Book Reports" class="action-icon">
                                    <span class="action-count">3</span>
                                    <span class="action-label">Damaged Book Reports</span>
                                </div>
                            </a>
                        </div> 
                        <div class="card">
                            <a href="/html/lostbookrep.php">
                                <div class="action-box">
                                    <img src="/images/lost_book_vector.svg" alt="Lost Book Reports" class="action-icon">
                                    <span class="action-count">4</span>
                                    <span class="action-label">Lost Book Reports</span>
                                </div>
                            </a>
                        </div>
                </div>
    


              <div class="search-section">
                <div class="search-bar">
                  <select>
                    <option>All</option>
                    <option>Title</option>
                    <option>Author</option>
                    <option>ISBN</option>
                  </select>
                  <input type="text" placeholder="Search User">
                  <button type="submit">
                    <img src="/images/Search.svg" alt="Search">
                  </button>
                </div>         
              </div>
            </header>
            <section class="table-section">
                <table>
                <thead>
                    <tr>
                      <th>Review Type</th>
                      <th>User ID</th>
                      <th>Book Name</th>
                      <th>Date Filed</th>
                      <th>Status</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Return Confirmation</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>The Hobbit</td>
                      <td>04/09/2024</td>
                      <td class="status review">To be Reviewed</td>
                      <td><img src="/images/view.svg" class="icon "alt="View"></td>
                    </tr>
                    <tr class="alt-row">
                      <td>Return Confirmation</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>Harry Potter and the Deathly Hallows, Humpty Dumpty, Harry Potter and th...</td>
                      <td>04/09/2024</td>
                      <td class="status review">To be Reviewed</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                    <tr>
                      <td>Lost Book Report</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>Beginners Step-by-Step Coding Course: Learn Computer Programming the Easy Way</td>
                      <td>04/09/2024</td>
                      <td class="status review">To be Reviewed</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                    <tr class="alt-row">
                      <td>Return Confirmation</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>The Hobbit</td>
                      <td>04/09/2024</td>
                      <td class="status review">To be Reviewed</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                    <tr>
                      <td>Damaged Book Report</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>Harry Potter and the Deathly Hallows</td>
                      <td>04/04/2024</td>
                      <td class="status pending">Pending</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                    <tr class="alt-row">
                      <td>Lost Book Report</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>Beginners Step-by-Step Coding Course: Learn Computer Programming the Easy Way</td>
                      <td>04/08/2024</td>
                      <td class="status completed">Completed</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                    <tr>
                      <td>Return Confirmation</td>
                      <td><img src="" class="avatar"> #011234</td>
                      <td>The Hobbit, The Hunger Games</td>
                      <td>04/10/2024</td>
                      <td class="status pending">Pending</td>
                      <td><img src="/images/view.svg" class="icon" alt="View"></td>
                    </tr>
                  </tbody>
                </section>
                </table>
                
            
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
      
    </script>     
</body>
</html>