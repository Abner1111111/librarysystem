<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - LIBTS</title>
    <link rel="stylesheet" href="Css/style.css">
    <link id="dark-mode-stylesheet" rel="stylesheet" href="Css/darkmode.css" disabled>
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="Css/manage-users-table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php'; ?>
        </div>
        <div class="content">
            
        <div class="right-column" style="margin-left: 280px;">
        <div class="logout-container">
        <button class="logout-btn" style="margin-left: 1010px;">
            <i class="fas fa-plus"></i> Add User
        </button>
       
    </div>
                    <?php include 'newly_registered_students_table.php'; ?>
                </div>
    </div>

    </div>
    <?php include 'popup_form.php'; ?>
    <script src="JS/script.js"></script>
    <script src="JS/color.js"></script>
</body>

</html>