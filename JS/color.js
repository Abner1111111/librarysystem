
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
