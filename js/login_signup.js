// Tempo Sign Up and Log in no database yet
document.addEventListener('DOMContentLoaded', function () {
    const goToAdminBtn = document.getElementById('gotoadmin');
    const goToMemberBtn = document.getElementById('gotomember');

    if (goToAdminBtn) {
        goToAdminBtn.addEventListener('click', function () {
            window.location.href = '/HTML/admindash.php ';
        });
    }

    if (goToMemberBtn) {
        goToMemberBtn.addEventListener('click', function () {
            window.location.href = '/HTML/Member-Homepage.html';
        });
    }
});