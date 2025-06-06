<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost Book Report</title>
    <link rel="stylesheet" href="/CSS/Damage Book.css">
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
            <div class="page-header">
                <div class="header-left">
                    <img src="/images/backbtn.svg" alt="back-button">
                    <h1> Damaged Book </h1>
                </div>
            </div>

            <div class="report-container">
                <div class="report-content">
                    <div class="report-left">
                        <div class="book-image">
                            <div class="image-placeholder">
                               <img src="/images/image 27.svg" alt="Book Cover">
                            </div>
                        </div>
                        <div class="book-info">
                            <div class="info-row">
                                <div class="label">Name of the Book:</div>
                                <div class="value">Humpty Dumpty</div>
                            </div>
                            <div class="info-row">
                                <div class="label">Author:</div>
                                <div class="value">Steven Holmes</div>
                            </div>
                            <div class="info-row">
                                <div class="label">Book ID or ISBN:</div>
                                <div class="value">978-0-7475-3269-9</div>
                            </div>
                            <div class="info-row">
                                <div class="label">Date Borrowed:</div>
                                <div class="value">03/03/24</div>
                            </div>
                            <div class="info-row">
                                <div class="label">Due Date:</div>
                                <div class="value">03/03/24</div>
                            </div>
                            <div class="info-row">
                                <div class="label">Date Lost:</div>
                                <div class="value">03/01/24</div>
                            </div>
                        </div>
                         <div class="circumstances">
                            <div class="label">Circumstances of Loss:</div>
                            <textarea class="loss-input" aria-label="Circumstances of Loss"></textarea>
                        </div>
                    </div>

                    <div class="report-right">
                        <div class="admin-review">
                            <h3 class="section-title">Admin Review</h3>
                            <p>Book is severely damaged and needs to be replaced. Please visit the library to replace the book or you can pay now via GCash.</p>
                        </div>

                        <div class="fee-section">
                            <h4>Fee Breakdown:</h4>
                            <table class="fee-table">
                                <tbody>
                                    <tr>
                                        <td>Replacement Cost</td>
                                        <td class="amount">PHP 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Processing Fee</td>
                                        <td class="amount">PHP 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Overdue Fine (PHP 30.00/day)</td>
                                        <td class="amount">PHP 0.00</td>
                                    </tr>
                                 </tbody>
                            </table>
                        </div>

                        <div class="warning-note">
                            <p>Until the fees are paid, the user's borrowing privileges will be suspended. <a href="#">Learn more, click here.</a></p>
                        </div>

                        <div class="action-buttons">
                            <button class="proceed-button">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal-overlay" id="paymentMethodModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Payment Method
            </div>
            <div class="modal-body">
                <p class="payment-intro">You can conveniently transact your payments through the following methods:</p>
                
                <div class="payment-options">
                    <div class="payment-option" id="selectGcash">
                        <div class="payment-icon">
                            <img src="Gcash logo (2).svg " alt="GCash">
                        </div>
                        <div class="payment-label">GCash</div>
                    </div>
                    
                    <div class="payment-option" id="selectLibrary">
                        <div class="payment-icon">
                            <img src="lib payment.svg" alt="Pay at Library" >
                        </div>
                        <div class="payment-label">Pay at Library</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button cancel-btn" id="cancelPayment">Cancel</button>
            </div>
        </div>
    </div>
    
    <!-- GCash Payment Modal -->
    <div class="modal-overlay" id="gcashModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Payment Method
            </div>
            <div class="modal-body">
                <div class="payment-branding">
                    <img src="gcash logo.svg" alt="GCash Logo">
                    <h3>GCash</h3>
                </div>
                
                <div class="qr-section">
                    <h4>Scan to Pay</h4>
                    <div class="qr-container">
                        <img src="qr code.svg" alt="QR Code for Payment">
                    </div>
                    <div class="merchant-info">SCRIPTORIUM HUB</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button back-btn" id="backFromGcash">Back</button>
                <button class="modal-button proceed-btn" id="proceedFromGcash">Proceed</button>
            </div>
        </div>
    </div>
    
    <!-- Authentication Modal -->
    <div class="modal-overlay" id="authModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Authentication
            </div>
            <div class="modal-body">
                <div class="auth-content">
                    <div class="auth-icon">
                        <img src="image 47.svg" alt="Verify" height="81" width="97">
                    </div>
                    
                    <h3>Verify via text</h3>
                    
                    <p class="auth-instruction">Please enter the 6-digit authentication code sent to your mobile.</p>
                    
                    <div class="verification-code">
                        <input type="text" maxlength="1" class="code-input" id="code1" value="5">
                        <input type="text" maxlength="1" class="code-input" id="code2" value="1">
                        <input type="text" maxlength="1" class="code-input" id="code3" value="8">
                        <input type="text" maxlength="1" class="code-input" id="code4" value="2">
                        <input type="text" maxlength="1" class="code-input" id="code5" value="0">
                        <input type="text" maxlength="1" class="code-input" id="code6" value="5">
                    </div>
                    
                    <div class="resend-option">
                        <a href="#" id="resendCode">Resend code</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button back-btn" id="backFromAuth">Back</button>
                <button class="modal-button proceed-btn" id="proceedFromAuth">Proceed</button>
            </div>
        </div>
    </div>
    
    <!-- Pay at Library Modal -->
    <div class="modal-overlay" id="libraryModalOverlay">
        <div class="modal">
            <div class="modal-header">
                Payment Method
            </div>
            <div class="modal-body">
                <div class="payment-branding">
                    <h3>Pay at Library</h3>
                </div>
                
                <div class="library-payment-info">
                    <div class="library-icon">
                        <img src="logo (3).svg" alt="Library">
                    </div>
                    
                    <p class="instruction-text">Visit the library counter to complete your payment in person. Thank you!</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button back-btn" id="backFromLibrary">Back</button>
                <button class="modal-button proceed-btn" id="proceedFromLibrary">Proceed</button>
            </div>
        </div>
    </div>
    
    <!-- Success Modal with Receipt -->
    <div class="modal-overlay" id="successModalOverlay">
        <div class="modal">
            <div class="success-content">
                <div class="success-icon">
                    <div class="checkmark-circle">
                        <img src="check.svg" alt="check" class="check-icon" width="80" height="80">
                    </div>
                </div>
                
                <h3>Success!</h3>
                
                <div class="receipt-section">
                    <h4>Payment Receipt</h4>
                    <div class="receipt-details">
                        <div class="receipt-row">
                            <span class="label">Book:</span>
                            <span class="value">Humpty Dumpty</span>
                        </div>
                        <div class="receipt-row">
                            <span class="label">Transaction ID:</span>
                            <span class="value">LIB-24042891</span>
                        </div>
                        <div class="receipt-row">
                            <span class="label">Date:</span>
                            <span class="value">April 28, 2025</span>
                        </div>
                        <div class="receipt-row">
                            <span class="label">Amount Paid:</span>
                            <span class="value">PHP 550.00</span>
                        </div>
                        <div class="receipt-row">
                            <span class="label">Payment Method:</span>
                            <span class="value" id="paymentMethodValue">GCash</span>
                        </div>
                        <div class="receipt-row">
                            <span class="label">Status:</span>
                            <span class="value success-text">Completed</span>
                        </div>
                    </div>
                    
                    <button class="download-receipt" id="downloadReceipt">
                        <img src="dl button.png" alt="Download" class="download-icon">
                        Download Receipt
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="closeSuccess">Close</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal elements
            const paymentMethodModal = document.getElementById('paymentMethodModalOverlay');
            const gcashModal = document.getElementById('gcashModalOverlay');
            const authModal = document.getElementById('authModalOverlay');
            const libraryModal = document.getElementById('libraryModalOverlay');
            const successModal = document.getElementById('successModalOverlay');
            
            // Payment method selection
            const gcashOption = document.getElementById('selectGcash');
            const libraryOption = document.getElementById('selectLibrary');
            const paymentMethodValue = document.getElementById('paymentMethodValue');
            let selectedPaymentMethod = 'GCash'; // Default
            
            // Initialize verification code inputs
            const codeInputs = document.querySelectorAll('.code-input');
            codeInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1 && index < codeInputs.length - 1) {
                        codeInputs[index + 1].focus();
                    }
                });
                
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && !this.value && index > 0) {
                        codeInputs[index - 1].focus();
                    }
                });
            });
            
            // Button to open payment modal
            document.querySelector('.proceed-button').addEventListener('click', function() {
                paymentMethodModal.style.display = 'flex';
            });
            
            // Payment option selection
            gcashOption.addEventListener('click', function() {
                libraryOption.classList.remove('selected');
                gcashOption.classList.add('selected');
                selectedPaymentMethod = 'GCash';
            });
            
            libraryOption.addEventListener('click', function() {
                gcashOption.classList.remove('selected');
                libraryOption.classList.add('selected');
                selectedPaymentMethod = 'Pay at Library';
            });
            
            // Modal navigation
            document.getElementById('cancelPayment').addEventListener('click', function() {
                paymentMethodModal.style.display = 'none';
            });
            
            // GCash path
            gcashOption.addEventListener('dblclick', function() {
                paymentMethodModal.style.display = 'none';
                gcashModal.style.display = 'flex';
            });
            
            document.getElementById('backFromGcash').addEventListener('click', function() {
                gcashModal.style.display = 'none';
                paymentMethodModal.style.display = 'flex';
            });
            
            document.getElementById('proceedFromGcash').addEventListener('click', function() {
                gcashModal.style.display = 'none';
                authModal.style.display = 'flex';
            });
            
            document.getElementById('backFromAuth').addEventListener('click', function() {
                authModal.style.display = 'none';
                gcashModal.style.display = 'flex';
            });
            
            document.getElementById('proceedFromAuth').addEventListener('click', function() {
                authModal.style.display = 'none';
                paymentMethodValue.textContent = 'GCash';
                successModal.style.display = 'flex';
            });
            
            // Library payment path
            libraryOption.addEventListener('dblclick', function() {
                paymentMethodModal.style.display = 'none';
                libraryModal.style.display = 'flex';
            });
            
            document.getElementById('backFromLibrary').addEventListener('click', function() {
                libraryModal.style.display = 'none';
                paymentMethodModal.style.display = 'flex';
            });
            
            document.getElementById('proceedFromLibrary').addEventListener('click', function() {
                libraryModal.style.display = 'none';
                paymentMethodValue.textContent = 'Pay at Library';
                successModal.style.display = 'flex';
            });
            
            // Add single-click functionality for options too
            document.getElementById('selectGcash').addEventListener('click', function() {
                paymentMethodModal.style.display = 'none';
                gcashModal.style.display = 'flex';
            });
            
            document.getElementById('selectLibrary').addEventListener('click', function() {
                paymentMethodModal.style.display = 'none';
                libraryModal.style.display = 'flex';
            });
            
            // Success modal closure
            document.getElementById('closeSuccess').addEventListener('click', function() {
                successModal.style.display = 'none';
            });
            
            // Download receipt functionality
            document.getElementById('downloadReceipt').addEventListener('click', function() {
                // Create receipt content
                const receiptContent = `
        SCRIPTORIUM HUB LIBRARY
        PAYMENT RECEIPT
        ------------------------
        Book: Humpty Dumpty
        Transaction ID: LIB-24042891
        Date: April 28, 2025
        Amount Paid: PHP 550.00
        Payment Method: ${selectedPaymentMethod}
        Status: Completed
        ------------------------
        Thank you for your payment!
                `;
                
                // Create download
                const element = document.createElement('a');
                const file = new Blob([receiptContent], {type: 'text/plain'});
                element.href = URL.createObjectURL(file);
                element.download = 'Library_Receipt_LIB-24042891.txt';
                document.body.appendChild(element);
                element.click();
                document.body.removeChild(element);
            });
            
            // Resend code functionality (placeholder)
            document.getElementById('resendCode').addEventListener('click', function(e) {
                e.preventDefault();
                alert('Verification code resent!');
            });
            
            // Close modals when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === paymentMethodModal) {
                    paymentMethodModal.style.display = 'none';
                }
                if (event.target === gcashModal) {
                    gcashModal.style.display = 'none';
                }
                if (event.target === authModal) {
                    authModal.style.display = 'none';
                }
                if (event.target === libraryModal) {
                    libraryModal.style.display = 'none';
                }
                if (event.target === successModal) {
                    successModal.style.display = 'none';
                }
            });
        });
        </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');

            if (menuToggle && sidebar && mainContent) {
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
        });
    </script>

</body>
</html>
