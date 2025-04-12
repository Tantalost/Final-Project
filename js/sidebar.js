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
}
