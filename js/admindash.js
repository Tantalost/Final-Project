// Side bar slide //
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.main-content');

    menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('active');
        menuToggle.classList.toggle('active');
        mainContent.classList.toggle('shifted');
    });
});

// Admin Time Check //
function updateDateTime() {
    const now = new Date();
    const options = {
        weekday: 'long', year: 'numeric', month: 'long',
        day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit'
    };
    const formatted = now.toLocaleDateString('en-US', options);
    document.getElementById('date-time').textContent = formatted;
}

setInterval(updateDateTime, 1000);
updateDateTime();

// Book Selection Script //
// Admin Dash //
document.addEventListener('DOMContentLoaded', function () {
    const statCards = document.querySelectorAll('.stat-card');

    statCards.forEach(card => {
        card.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) {
                window.location.href = link;
            }
        });
    });
});

// Manage Books //
document.addEventListener('DOMContentLoaded', function () {
    const stats = document.querySelectorAll('.card');

    stats.forEach(card => {
        card.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) {
                window.location.href = link;
            }
        });
    });
});