document.addEventListener('DOMContentLoaded', function () {
    // Sidebar Magic
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    if (menuToggle && sidebar && mainContent) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
            menuToggle.classList.toggle('active');
            mainContent.classList.toggle('shifted');
        });
    }

    // Admin Change Book
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) window.location.href = link;
        });
    });

    // Manage Book Change Book
    const stats = document.querySelectorAll('.card');
    stats.forEach(card => {
        card.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) window.location.href = link;
        });
    });

    // LogOut
    const logout = document.querySelectorAll('.dropdown-menu .menu-item')
    logout.forEach(card => {
        card.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) window.location.href = link;
        });
    });

    // Manage Book Add Book or Manage Fines
    const actionButtons = document.querySelectorAll('.search-section .cardbutton');
    actionButtons.forEach(button => {
        button.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) window.location.href = link;
        });
    });


    // Magic Chart Lines
    const lineChartEl = document.getElementById('lineChart');
    if (lineChartEl) {
        const ctx = lineChartEl.getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: 'Books Borrowed',
                    data: [12, 19, 3, 5, 2],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false
            }
        });
    }
});