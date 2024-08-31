<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBTS</title>
    <link rel="stylesheet" href="Css/style.css">
    <link id="dark-mode-stylesheet" rel="stylesheet" href="Css/darkmode.css" disabled>
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php'; ?>
            <div class="top-boxes">
             
                <div class="box">
                    <span>Total Books</span>
                    <p>0</p>
                </div>
                <div class="box">
                    <span>Borrowed Books</span>
                    <p>0</p>
                </div>
                <div class="box">
                    <span>Issued Books</span>
                    <p>0</p>
                </div>
                <div class="box">
                    <span>Total Students</span>
                    <p>0</p>
                </div>
            </div>
            <div class="content">
                <div class="left-column">
                    <?php include 'borrowed_books_table.php'; ?>
                </div>
                <div class="right-column">
                    <?php include 'newly_registered_students_table.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'popup_form.php'; ?>
    <script src="JS/script.js"></script>
    <script src="JS/color.js"></script>
</body>
</html>
