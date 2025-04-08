document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const logoutBtn = document.getElementById('logoutBtn');
    const menuBtn = document.getElementById('logout-menu');

    // Check if user is already logged in
    if (localStorage.getItem('isLoggedIn') === 'true' && window.location.pathname.includes('index.html')) {
        window.location.href = 'dashboard.html';
    }

    // Handle login
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // For demo purposes, we'll use a simple validation
            // In a real application, you would validate against a backend server
            if (email && password) {
                localStorage.setItem('isLoggedIn', 'true');
                localStorage.setItem('userEmail', email);
                window.location.href = 'dashboard.html';
            } else {
                alert('Please fill in all fields');
            }
        });
    }

    // Handle logout
    if (logoutBtn) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            localStorage.removeItem('isLoggedIn');
            localStorage.removeItem('userEmail');
            window.location.href = 'index.html';
        });
    }

    // Handle dropdown menu
    if (menuBtn) {
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!menuBtn.contains(e.target)) {
                menuBtn.blur();
            }
        });

        // Prevent dropdown from closing when clicking inside
        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }
}); 