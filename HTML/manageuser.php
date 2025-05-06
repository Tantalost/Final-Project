<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="/CSS/manageuser.css">
    <link rel="stylesheet" href="/CSS/modalstyles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <a href="/HTML/managebook.php">
                <img src="/images/manage_books_vector.svg" alt="Manage Books">
                Manage Books
            </a>
            <a href="/HTML/manageuser.php" class="active">
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
                    <div class="user-name">Rashdy Arobie</div>
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
                    <img src="/images/backbtn.svg" class="back-button"> 
                    MANAGE USERS</div>
            </div>

            <div class="search-container">
                <div class="search-bar">
                    <button class="filter-button">All</button>
                    <input type="text" class="search-input" placeholder="Search...">
                </div>

                <a href="/HTML/" class="browse">
                    Browse
                    <img src="/images/browse.svg">
                </a>

                <a href="/HTML/" class="browse">
                    Send
                    <img src="/images/browse.svg">
                </a>
            </div>

            <div class="users-container">
                <div class="registered-users card">
                    <div class="section-header">
                        <h2>REGISTERED USERS</h2>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#00123</td>
                                    <td>
                                        <div class="user-info">
                                            <img src="/images/Profile 1.svg" alt="Spiderman">
                                            <span>Spiderman Delos Reyes</span>
                                        </div>
                                    </td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <div class="actions">
                                            <button class="edit"><span class="material-icons">edit</span></button>
                                            <button class="delete"><span class="material-icons">delete</span></button>
                                            <button class="more"><span class="material-icons">more_vert</span></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#00456</td>
                                    <td>
                                        <div class="user-info">
                                            <img src="/images/Profile 2.svg" alt="Barbie">
                                            <span>Barbie Santos</span>
                                        </div>
                                    </td>
                                    <td><span class="status active">Active</span></td>
                                    <td>
                                        <div class="actions">
                                            <button class="edit"><span class="material-icons">edit</span></button>
                                            <button class="delete"><span class="material-icons">delete</span></button>
                                            <button class="more"><span class="material-icons">more_vert</span></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#00789</td>
                                    <td>
                                        <div class="user-info">
                                            <img src="/images/Profile 3.svg" alt="Batman">
                                            <span>Batman Dela Cruz</span>
                                        </div>
                                    </td>
                                    <td><span class="status offline">Offline</span></td>
                                    <td>
                                        <div class="actions">
                                            <button class="edit"><span class="material-icons">edit</span></button>
                                            <button class="delete"><span class="material-icons">delete</span></button>
                                            <button class="more"><span class="material-icons">more_vert</span></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                        <span>Page 1</span>
                        <button class="next-page"><span class="material-icons">chevron_right</span></button>
                    </div>
                </div>
                <div class="select-user-prompt" style="flex:1;display:flex;align-items:center;justify-content:center;">
                    <span style="font-style:italic;font-size:1.3rem;color:#333;">Select a user to view details...</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Insert Send Notification Modal -->
    <div id="sendNotificationModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Send Notification</h2>
            </div>
            <div class="modal-body">
                <textarea placeholder="Enter your message here..." style="width: 100%; height: 100px;"></textarea>
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" id="sendNotification">Send</button>
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <!-- Insert Notification Confirmation Modal -->
    <div id="notificationConfirmationModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirmation</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to send this notification?</p>
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" id="confirmNotification">Yes</button>
                <button class="modalbtn close">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Insert Notification Success Modal -->
    <div id="notificationSuccessModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Success</h2>
            </div>
            <div class="modal-body">
                <p>Notification sent successfully.</p>
            </div>
            <div class="modal-actions">
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <!-- User Details Modal (hidden by default) -->
    <div id="userDetailsModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content" style="max-width:420px;width:95%;padding:32px 24px;align-items:center;">
            <div class="modal-header" style="border:none;margin-bottom:0;padding-bottom:0;">
                <h2 style="font-size:2rem;font-weight:800;color:#0D3958;text-align:center;margin-bottom:16px;">User Information</h2>
            </div>
            <div class="modal-body">
                <div class="profile-image" style="display:flex;justify-content:center;align-items:center;margin-bottom:20px;">
                    <img id="modalUserAvatar" src="/images/Profile.svg" alt="User" style="width:100px;height:100px;border-radius:50%;background:#6AB0E3;object-fit:cover;border:6px solid #EAF6FF;">
                </div>
                <div class="profile-details" style="text-align:center;margin-bottom:10px;">
                    <p id="modalUserName" style="margin:0;font-size:1.1rem;color:#0D3958;font-weight:600;"></p>
                    <p id="modalUserId" style="margin:0;font-size:1rem;color:#0D3958;font-weight:500;"></p>
                    <p id="modalUserStatus" style="margin:0;font-size:1rem;font-weight:700;"></p>
                </div>
                <div class="profile-info" style="width:100%;margin-top:16px;display:flex;flex-direction:column;gap:12px;">
                    <p><strong>Address :</strong> <span id="modalUserAddress" class="info-box"></span></p>
                    <p><strong>Date of Birth :</strong> <span id="modalUserDOB" class="info-box"></span></p>
                    <p><strong>Phone Number :</strong> <span id="modalUserPhone" class="info-box"></span></p>
                    <p><strong>Email :</strong> <span id="modalUserEmail" class="info-box"></span></p>
                    <p><strong>Date Joined :</strong> <span id="modalUserJoined" class="info-box"></span></p>
                </div>
                <div class="action-buttons" style="margin-top:24px;display:flex;gap:12px;justify-content:center;">
                    <button class="user-activity">User Activity</button>
                    <button class="reports">Reports</button>
                    <button class="restrict">Restrict</button>
                </div>
            </div>
            <div class="modal-actions" style="margin-top:24px;width:100%;display:flex;justify-content:center;">
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <script src="/js/admindash.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendNotificationModal = document.getElementById('sendNotificationModal');
            const notificationConfirmationModal = document.getElementById('notificationConfirmationModal');
            const notificationSuccessModal = document.getElementById('notificationSuccessModal');
            const userDetailsModal = document.getElementById('userDetailsModal');
            const closeUserDetailsBtn = userDetailsModal.querySelector('.modalbtn.close');
            const sendNotificationButton = document.getElementById('sendNotification');
            const confirmNotificationButton = document.getElementById('confirmNotification');

            // Trigger Send Notification Modal
            document.querySelector('.browse:nth-child(2)').addEventListener('click', function(e) {
                e.preventDefault(); // prevent the link from navigating
                sendNotificationModal.style.display = 'flex';
                sendNotificationModal.classList.add('active');
            });

            // User Details Modal logic
            document.querySelectorAll('.user-info').forEach(function(userCell) {
                userCell.addEventListener('click', function() {
                    // Populate modal with user data (replace with actual data extraction as needed)
                    const row = userCell.closest('tr');
                    document.getElementById('modalUserAvatar').src = userCell.querySelector('img').src;
                    document.getElementById('modalUserName').textContent = userCell.querySelector('span').textContent;
                    document.getElementById('modalUserId').textContent = row.querySelector('td:first-child').textContent;
                    document.getElementById('modalUserStatus').textContent = row.querySelector('.status').textContent;
                    // Example static data for demo:
                    document.getElementById('modalUserAddress').textContent = 'Sample Address';
                    document.getElementById('modalUserDOB').textContent = 'January 1, 1990';
                    document.getElementById('modalUserPhone').textContent = '123-456-7890';
                    document.getElementById('modalUserEmail').textContent = 'user@example.com';
                    document.getElementById('modalUserJoined').textContent = 'February 15, 2022';
                    userDetailsModal.style.display = 'flex';
                    userDetailsModal.classList.add('active');
                });
            });
            closeUserDetailsBtn.addEventListener('click', function() {
                userDetailsModal.style.display = 'none';
                userDetailsModal.classList.remove('active');
            });

            // Send Notification flow
            sendNotificationButton.addEventListener('click', function() {
                sendNotificationModal.style.display = 'none';
                sendNotificationModal.classList.remove('active');
                notificationConfirmationModal.style.display = 'flex';
                notificationConfirmationModal.classList.add('active');
            });

            confirmNotificationButton.addEventListener('click', function() {
                notificationConfirmationModal.style.display = 'none';
                notificationConfirmationModal.classList.remove('active');
                notificationSuccessModal.style.display = 'flex';
                notificationSuccessModal.classList.add('active');
            });
        });
    </script>
</body>
</html>