<?php
include 'Database/lits.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users | LIBTS</title>
    <link rel="stylesheet" href="Css/style.css">
    <link id="dark-mode-stylesheet" rel="stylesheet" href="Css/darkmode.css" disabled>
    <link rel="stylesheet" href="Css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Popup Form Styles */
        .popup {
            display: none; /* Hidden by default */
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay background */
            justify-content: center;
            align-items: center;
            z-index: 1000;
            
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            width: 400px;
            max-width: 90%;
            border-radius: 15px;
         
              
        }

        .popup-content h2 {
            margin-top: 0;
        }

        .popup-content label {
            display: block;
            margin-bottom: 10px;
        }

        .popup-content input[type="text"], 
        .popup-content input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .popup-content button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .popup-content button.cancel {
            background-color: #ccc;
        }

        .popup-content button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php'; ?>
            <div class="top-boxes">
               
            </div>
            <div class="content">
                <div class="left-column">
                    <h2>Manage Student</h2>
                    <button id="addUserBtn" class="add-btn"><i class="fas fa-user-plus"></i> Add User</button>
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john.doe@example.com</td>
                                <td>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                            <!-- Repeat <tr> for additional users -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Form -->
    <div id="popupForm" class="popup">
        <div class="popup-content">
            <h2>Add New User</h2>
            <form id="addUserForm">
                <label for="userName">Name:</label>
                <input type="text" id="userName" name="userName" required>
                <label for="userEmail">Email:</label>
                <input type="email" id="userEmail" name="userEmail" required>
                <label for="userRole">Role:</label>
                <input type="text" id="userRole" name="userRole" required>
                <button type="submit">Add User</button>
                <button type="button" class="cancel" id="cancelBtn">Cancel</button>
            </form>
        </div>
    </div>

  
    <script src="JS/script.js"></script>
    <script src="JS/color.js"></script>
    <script>
        // JavaScript for handling popup visibility
        document.getElementById('addUserBtn').addEventListener('click', function() {
            document.getElementById('popupForm').style.display = 'flex';
        });

        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('popupForm').style.display = 'none';
        });

        // Optional: Handle form submission with JavaScript if needed
        document.getElementById('addUserForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add form submission logic here
            alert('User added!');
            document.getElementById('popupForm').style.display = 'none';
        });
    </script>
</body>
</html>
