<?php
require_once "../db_connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="/CSS/adminstyle.css">
    <link rel="stylesheet" href="/CSS/modalstyles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <button id="menu-toggle" class="menu-toggle">
        <img src="/images/hamburgerbtn.svg" alt="Toggle Menu">
    </button>
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img src="/images//logo.svg" alt="Library Logo">
        </div>
        <div class="menu">
            <a href="/HTML/admindash.php" class="active">
                <img src="/images/dashboard_vector.svg" alt="Dashboard">
                Dashboard
            </a>
            <a href="/HTML/managebook.php">
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
                    <div class="user-name">Rashy Arobe</div>
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
                    <div class="menu-item logout-option">
                        <img src="/images/logout_vector.svg" alt="Log Out">
                        <span>Log Out</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="welcome-section">
                <div class="profile-welcome">
                    <img src="/images/Profile 1.svg" alt="Profile">
                    <div class="welcome-text">
                        <h1>Hello, Rashdy!</h1>
                        <div id="date-time" class="date-time-display"></div>
                    </div>
                </div>
            </div>

            <div class="stats-cards">
                <div class="stat-card" data-link="managebook.html">
                    <img src="/images/manage_books_vector.svg" alt="Total Books">
                    <div class="stat-info">
                        <h3>1090</h3>
                        <p>Total Books</p>
                    </div>
                </div>
                <div class="stat-card" data-link="managebook.php">
                    <img src="/images/borrow_book_vector.svg" alt="Borrowed Books">
                    <div class="stat-info">
                        <h3>190</h3>
                        <p>Borrowed Books</p>
                    </div>
                </div>
                <div class="stat-card" data-link="managebook.php">
                    <img src="/images/return_book_vector.svg" alt="Overdue Books">
                    <div class="stat-info">
                        <h3>20</h3>
                        <p>Overdue Books</p>
                    </div>
                </div>
                <div class="stat-card" data-link="manageuser.php">
                    <img src="/images/manage_users_vector.svg" alt="Total Users">
                    <div class="stat-info">
                        <h3>980</h3>
                        <p>Total Users</p>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="pie-chart-section">
                    <h2>Books Status</h2>
                    <div class="pie-chart">
                    </div>
                    <div class="chart-legend">
                        <div class="legend-item">
                            <span class="legend-color available"></span>
                            <span>Available Books</span>
                            <span>70.0%</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color borrowed"></span>
                            <span>Borrowed Books</span>
                            <span>25.0%</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color overdue"></span>
                            <span>Overdue Books</span>
                            <span>5.0%</span>
                        </div>
                    </div>
                </div>

                <div class="active-users">
                    <h2>Active Users</h2>
                    <div class="users-list">
                        <div class="user-item">
                            <div class="user-id">#00123</div>
                            <div class="user-profile">
                                <img src="/images/Profile 1.svg" alt="User">
                                <span>Spiderman Delos Reyes</span>
                            </div>
                            <div class="status active">Active</div>
                        </div>
                        <div class="user-item">
                            <div class="user-id">#00456</div>
                            <div class="user-profile">
                                <img src="/images/Profile 2.svg" alt="User">
                                <span>Barbie Santos</span>
                            </div>
                            <div class="status active">Active</div>
                        </div>
                        <div class="user-item">
                            <div class="user-id">#00789</div>
                            <div class="user-profile">
                                <img src="/images/Profile 3.svg" alt="User">
                                <span>Batman Dela Cruz</span>
                            </div>
                            <div class="status active">Active</div>
                        </div>
                        <div class="user-item">
                            <div class="user-id">#00987</div>
                            <div class="user-profile">
                                <img src="/images/Profile 4.svg" alt="User">
                                <span>Robloxian Garcia</span>
                            </div>
                            <div class="status active">Active</div>
                        </div>
                        <div class="user-item">
                            <div class="user-id">#00654</div>
                            <div class="user-profile">
                                <img src="/images/Profile 5.svg" alt="User">
                                <span>Raquelle Rodriguez</span>
                            </div>
                            <div class="status active">Active</div>
                        </div>
                    </div>
                </div>

                <div class="fines-section">
                    <h2>Fines Collected</h2>
                    <canvas id="lineChart"></canvas>
                    <div id="total-fines" style="margin-top: 20px; font-weight: bold;">
                    Total Fines Collected: PHP 0.00
                    </div>
                </div>

                <div class="reports-section">
                    <h2>Reports</h2>
                    <div class="reports-list">
                        <div class="report-item">
                            <img src="/images/Profile 3.svg" alt="Report">
                            <div class="report-info">
                                <p>Batman has returned a book</p>
                                <a href="#">View Report</a>
                            </div>
                            <div class="report-date">09/09/24</div>
                        </div>
                        <div class="report-item">
                            <img src="/images/Profile 1.svg" alt="Report">
                            <div class="report-info">
                                <p>Spiderman has returned a book</p>
                                <a href="#">View Report</a>
                            </div>
                            <div class="report-date">09/09/24</div>
                        </div>
                        <div class="report-item">
                            <img src="/images/Profile 6.svg" alt="Report">
                            <div class="report-info">
                                <p>Superman has submitted a lost book report</p>
                                <a href="#">View Report</a>
                            </div>
                            <div class="report-date">09/09/24</div>
                        </div>
                        <div class="report-item">
                            <img src="/images/Profile 7.svg" alt="Report">
                            <div class="report-info">
                                <p>Rihanna has returned 3 books report.</p>
                                <a href="#">Confirm Return</a>
                            </div>
                            <div class="report-date">09/09/24</div>
                        </div>
                        <div class="report-item">
                            <img src="/images/Profile 8.svg" alt="Report">
                            <div class="report-info">
                                <p>Beyonce has submitted a lost book report.</p>
                                <a href="#">View Report</a>
                            </div>
                            <div class="report-date">09/09/24</div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="section-title">Most Popular</h2>
            <div class="top-choices">
                <div class="book-carousel">
                    <img src="/images/image 1.svg" alt="Harry Potter Book 1">
                    <img src="/images/image 2.svg" alt="Harry Potter Book 2">
                    <img src="/images/image 3.svg" alt="Harry Potter Book 3">
                    <img src="/images/image 4.svg" alt="Harry Potter Book 4">
                    <img src="/images/image 5.svg" alt="Harry Potter Book 5">
                    <img src="/images/image 6.svg" alt="Harry Potter Book 6">
                    <img src="/images/image 7.svg" alt="Harry Potter Book 7">
                    <img src="/images/image 8.svg" alt="Harry Potter Book 8">
                </div>
            </div>

            <div class="borrow-history">
                <h2>Recent Borrow History</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Book ISBN</th>
                                <th>Book Title</th>
                                <th>Borrowed Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#00123</td>
                                <td>
                                    <div class="user-profile">
                                        <img src="/images/Profile 1.svg" alt="User">
                                        <span>Spiderman Delos Reyes</span>
                                    </div>
                                </td>
                                <td>9780747532743</td>
                                <td>Harry Potter and the Sorcerer's Stone</td>
                                <td>11/04/24</td>
                                <td><span class="status overdue">overdue</span></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="editBook.php?book_id=9780747532743"><img src="/images/Edit button.svg" alt="Edit"></a>
                                        <button onclick="if(confirm('Are you sure you want to delete this record?')){/* add delete logic here */}"><img src="/images/Delete Button.svg" alt="Delete"></button>
                                        <button class="more-actions">•••</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#00456</td>
                                <td>
                                    <div class="user-profile">
                                        <img src="/images/Profile 2.svg" alt="User">
                                        <span>Barbie Santos</span>
                                    </div>
                                </td>
                                <td>9780747532743</td>
                                <td>The Purpose Driven Life</td>
                                <td>11/04/24</td>
                                <td><span class="status returned">returned</span></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="editBook.php?book_id=9780747532743"><img src="/images/Edit button.svg" alt="Edit"></a>
                                        <button onclick="if(confirm('Are you sure you want to delete this record?')){/* add delete logic here */}"><img src="/images/Delete Button.svg" alt="Delete"></button>
                                        <button class="more-actions">•••</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="profileModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h2>User Profile</h2>
            </div>
            <div class="modal-body">
                <div class="profile-image">
                    <img src="/images/Profile 1.svg" alt="Profile" style="width: 100px; height: 100px; border-radius: 50%;">
                </div>
                <div class="profile-details">
                    <p><strong>Username:</strong> Rashdy Arobie</p>
                    <p><strong>User ID:</strong> #12345</p>
                    <p><strong>Status:</strong> <span class="status">Online</span></p>
                </div>
                <div class="profile-info">
                    <p><strong>Address:</strong> 123 Library St, City</p>
                    <p><strong>Date of Birth:</strong> January 1, 1990</p>
                    <p><strong>Phone Number:</strong> 123-456-7890</p>
                    <p><strong>Email:</strong> rashdy@example.com</p>
                    <p><strong>Date Joined:</strong> January 1, 2020</p>
                </div>
            </div>
            <div class="modal-actions">
                <button class="modalbtn close">Close</button>
            </div>
        </div>
    </div>

    <div id="logoutModal" class="viewmodal" role="dialog" aria-modal="true" tabindex="-1">
        <div class="modal-content2">
            <img src="/images/logov4.svg" class="modal-logo">
            <div class="modal-header">
                <h2>Logout Confirmation</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out?</p>
            </div>
            <div class="modal-actions">
                <button class="modalbtn proceed" id="confirmLogout">Yes</button>
                <button class="modalbtn close">No</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileModal = document.getElementById('profileModal');
            const logoutModal = document.getElementById('logoutModal');
            const closeButtons = document.querySelectorAll('.modalbtn.close');
            const confirmLogoutButton = document.getElementById('confirmLogout');

            // Trigger Profile Modal
            document.querySelector('.menu-item:nth-child(1)').addEventListener('click', function() {
                profileModal.style.display = 'flex';
                profileModal.classList.add('active');
            });

            // Trigger Logout Modal
            document.querySelector('.logout-option').addEventListener('click', function() {
                logoutModal.style.display = 'flex';
                logoutModal.classList.add('active');
            });

            // Close modals
            closeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    profileModal.style.display = 'none';
                    profileModal.classList.remove('active');
                    logoutModal.style.display = 'none';
                    logoutModal.classList.remove('active');
                });
            });

            // Confirm Logout
            confirmLogoutButton.addEventListener('click', function() {
                window.location.href = 'welcome.php';
            });
        });
    </script>
    <script src="/js/timecheck.js"></script>
    <script src="/js/admindash.js"></script>
    <script>
        // Generate random fines data for the last 7 days
        const generateFinesData = () => {
            const data = [];
            let totalFines = 0;
            for (let i = 0; i < 7; i++) {
                const fine = Math.floor(Math.random() * 5000) + 1000; // Random amount between 1000 and 6000
                data.push(fine);
                totalFines += fine;
            }
            return { data, totalFines };
        };

        // Create line chart for fines
        const createFinesChart = () => {
            const ctx = document.getElementById('lineChart').getContext('2d');
            const { data, totalFines } = generateFinesData();
            
            // Update total fines display
            document.getElementById('total-fines').textContent = 
                `Total Fines Collected: PHP ${totalFines.toLocaleString()}.00`;

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    datasets: [{
                        label: 'Fines Collected (PHP)',
                        data: data,
                        borderColor: '#4CAF50',
                        backgroundColor: 'rgba(76, 175, 80, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `PHP ${context.raw.toLocaleString()}.00`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'PHP ' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        };

        // Initialize the chart when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            createFinesChart();
        });
    </script>
</body>
</html>