document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggle-btn');
    const navLinks = document.querySelectorAll('.nav-link');
    
    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        updateToggleIcon();
    });
    function updateToggleIcon() {
        const icon = toggleBtn.querySelector('i');
        if (sidebar.classList.contains('collapsed')) {
            icon.classList.remove('fa-chevron-left');
            icon.classList.add('fa-chevron-right');
        } else {
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-left');
        }
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');
        });
    });

    const initialActiveLink = document.querySelector('.nav-link[data-page="home"]');
    if (initialActiveLink) {
        initialActiveLink.classList.add('active');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const logoutButton = document.querySelector('.logout-btn');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const darkModeStylesheet = document.getElementById('dark-mode-stylesheet');

    logoutButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('show');
    });
    const isDarkMode = localStorage.getItem('dark-mode') === 'enabled';
    if (isDarkMode) {
        darkModeStylesheet.disabled = false;
    } else {
        darkModeStylesheet.disabled = true;
    }

    darkModeToggle.addEventListener('click', () => {
        const isDarkModeEnabled = !darkModeStylesheet.disabled;
        darkModeStylesheet.disabled = isDarkModeEnabled;
        localStorage.setItem('dark-mode', isDarkModeEnabled ? 'disabled' : 'enabled');
    });

    document.addEventListener('click', (event) => {
        if (!logoutButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('dark-mode-toggle');
    const darkModeStylesheet = document.getElementById('dark-mode-stylesheet');
    const isDarkMode = localStorage.getItem('dark-mode') === 'enabled';
    if (isDarkMode) {
        darkModeStylesheet.disabled = false;
    } else {
        darkModeStylesheet.disabled = true;
    }
    toggleButton.addEventListener('click', () => {
        const isDarkModeEnabled = !darkModeStylesheet.disabled;
        darkModeStylesheet.disabled = isDarkModeEnabled;
        localStorage.setItem('dark-mode', isDarkModeEnabled ? 'disabled' : 'enabled');
    });
});



