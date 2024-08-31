<link rel="stylesheet" href="Css/darkmode.css">
<style>
    /* Logo Styles */
.logo {
    display: flex;
    align-items: center;
    padding: 0 20px;
    margin-bottom: 20px;
    position: relative;
    justify-content: space-between;
}

.logo-img {
    width: 100px; /* Adjust width as needed */
    height: auto; /* Maintain aspect ratio */
}

.sidebar.collapsed .logo-img {
    width: 50px; /* Adjust for collapsed sidebar */
}

.sidebar.collapsed .logo {
    justify-content: center;
}

/* Sidebar Styles */

.sidebar {
    width: 250px;
    background-color: #edede9;
    color: #191819;
    height: 100vh;
    display: flex;
    flex-direction: column;
    padding-top: 20px;
    position: fixed;
    left: 0;
    top: 0;
    transition: width 0.3s ease;
    overflow-x: hidden;
}

.sidebar.collapsed {
    width: 80px;
}


.nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-links li {
    margin: 20px 0;
}

.nav-links a {
    color: #191819;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px 20px; /* Add padding for better spacing */
    margin-right: 10px; /* Add margin to the right of nav links */
}

.nav-links i {
    font-size: 24px; /* Increase icon size */
    margin-right: 15px; /* Adjust spacing between icon and text */
}

.sidebar.collapsed .nav-links i {
    font-size: 28px; /* Optionally increase icon size when collapsed */
    margin-right: 0; /* Remove margin when collapsed */
}

.sidebar.collapsed .nav-links .link-text {
    display: none;
}

/* Toggle Button Styles */
.toggle-btn {
    background: none;
    border: none;
    color: #191819;
    font-size: 24px;
    cursor: pointer;
    z-index: 1000; /* Ensure it is clickable */
}

</style>
<nav class="sidebar" id="sidebar">
    <div class="logo">
        <img src="pics/Logo.png" alt="Logo" class="logo-img"> <!-- Replace with the path to your logo image -->
        <button class="toggle-btn" id="toggle-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>
    <ul class="nav-links">
        <li><a href="Index.php" class="nav-link" data-page="home"><i class="fas fa-home"></i><span class="link-text">Home</span></a></li>
        <li><a href="manage-user.php" class="nav-link" data-page="Users"><i class="fas fa-user"></i><span class="link-text">Students</span></a></li>
        <li><a href="#" class="nav-link" data-page="Books"><i class="fas fas fa-book"></i><span class="link-text">Books</span></a></li>
        <li><a href="#" class="nav-link" data-page="Reports"><i class="fas fa-file-alt"></i><span class="link-text">Reports</span></a></li>
    </ul>
</nav>
