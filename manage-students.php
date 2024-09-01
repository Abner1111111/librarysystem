<?php

include 'Database/lits.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    $Student_name = $_POST['Student_name'];
    $Student_Email = $_POST['Student_Email'];
    $Student_Password = password_hash($_POST['Student_Password'], PASSWORD_DEFAULT); 
    $Student_qr = $_POST['Student_qr'];

    $stmt = $conn->prepare("INSERT INTO user_student (Student_name, Student_Email, Student_Password, Student_qr) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $Student_name, $Student_Email, $Student_Password, $Student_qr);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
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
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <style>
            .popup {
            display: none; /* Hidden by default */
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
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
        #modal {
            display: none; 
            position: fixed; 
            z-index: 1100; /* On top of popup */
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.7); 
            justify-content: center;
            align-items: center;
        }

        #modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            position: relative;
            border-radius: 15px;
        }
        video {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'sidebar.php'; ?>
        <div class="main-content">
            <?php include 'header.php'; ?>
            <div class="top-boxes">
  <!------------------------------ Top boxes content --------------------->
            </div>
            <div class="content">
                <div class="left-column">
                    <h2>Manage Student</h2>
                    <button id="addUserBtn" class="add-btn"><i class="fas fa-user-plus"></i> Add Student</button>
                    <?php
                    $select = mysqli_query($conn, "SELECT * FROM user_student")
                    ?>
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>Student QR</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                            <tr>
                                <td><?php echo $row['Student_qr']; ?></td>
                                <td><?php echo $row['Student_name']; ?></td>
                                <td><?php echo $row['Student_Email']; ?></td>
                                <td>
                                    <button class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-------------------- Popup Form --------------------------------------------------->
    <div id="popupForm" class="popup">
        <div class="popup-content">
            <h2>Add New User</h2>
            <form id="addUserForm" method="POST" action="">
                <label for="Student_name">Name:</label>
                <input type="text" id="Student_name" name="Student_name" required>

                <label for="Student_Email">Email:</label>
                <input type="email" id="Student_Email" name="Student_Email" required>

                <label for="Student_Password">Password:</label>
                <input type="text" id="Student_Password" name="Student_Password" required>

                <label for="Student_qr">QR Code:</label>
                <input type="text" id="Student_qr" name="Student_qr" placeholder="Scan or enter QR code" required>
                <button type="button" id="openCameraBtn">Scan QR </button>

                <button type="submit" name="Submit">Add </button>
                <button type="button" class="cancel" id="cancelBtn">Cancel</button>
            </form>
        </div>
    </div>

    <!---------------------------------------- Camera---------------------------------------------------------- -->
    <div id="modal">
        <div id="modal-content">
            <video id="video" autoplay></video>
        </div>
    </div>
    <div id="error-message" style="color:red;"></div>
    <!---------------------------------------- Script---------------------------------------------------------- -->
    <script>
    document.getElementById('addUserBtn').addEventListener('click', function() {
        document.getElementById('popupForm').style.display = 'flex';
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        document.getElementById('popupForm').style.display = 'none';
    });

    let modal = document.getElementById('modal');
    let video = document.getElementById('video');
    let qrInput = document.getElementById('Student_qr');
    let scanner;
    let stream;
    function startCamera() {
        scanner = new Instascan.Scanner({ video: video });
        scanner.addListener('scan', function (content) {
            qrInput.value = content; 
            closeModal(); 
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                modal.style.display = "flex";
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    }
    function closeModal() {
        if (scanner) {
            scanner.stop(); 
        }
        modal.style.display = "none";
    }
    document.getElementById('openCameraBtn').addEventListener('click', (event) => {
        event.stopPropagation(); 
        startCamera();
    });
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });
    document.getElementById('modal-content').addEventListener('click', (event) => {
        event.stopPropagation();
    });


    
</script>

</body>
</html>
