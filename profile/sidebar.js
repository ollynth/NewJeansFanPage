function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var isOpen = sidebar.style.display === 'block';

    var start = null;

    function animate(timestamp) {
        if (!start) start = timestamp;
        var progress = timestamp - start;
        var sidebarWidth = isOpen ? progress / 10 : 250 - progress / 10;
        sidebar.style.width = sidebarWidth + 'px';
        if (progress < 250) {
            requestAnimationFrame(animate);
        } else {
            sidebar.style.display = isOpen ? 'none' : 'block';
        }
    }

    if (isOpen) {
        requestAnimationFrame(animate());
    } else {
        sidebar.style.display = 'block';
        requestAnimationFrame(animate);
    }
}

var userProfile = document.getElementById('userProfile');
userProfile.onclick = function() {
    toggleSidebar();
};