document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    // Initialize sidebar state
    function initSidebar() {
        if (window.innerWidth <= 768) {
            sidebar.classList.add("collapsed");
            sidebar.classList.remove("expanded");
        } else {
            sidebar.classList.remove("collapsed");
        }
    }

    // Toggle sidebar
    menuToggle.addEventListener("click", function() {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle("expanded");
            overlay.classList.toggle("show");
            document.body.style.overflow = sidebar.classList.contains("expanded") ? "hidden" : "auto";
        } else {
            sidebar.classList.toggle("collapsed");
        }
    });

    // Close sidebar when clicking overlay (mobile)
    overlay.addEventListener("click", function() {
        sidebar.classList.remove("expanded");
        overlay.classList.remove("show");
        document.body.style.overflow = "auto";
    });

    // Handle window resize
    window.addEventListener("resize", function() {
        initSidebar();
        if (window.innerWidth > 768) {
            overlay.classList.remove("show");
            document.body.style.overflow = "auto";
        }
    });

    // Initialize
    initSidebar();
});