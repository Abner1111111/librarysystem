<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Form</title>
    <link rel="stylesheet" href="Css/popup.css">
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h2>Penalty Details</h2>
        <p><strong>Book Borrowed:</strong> <span id="bookName"></span></p>
        <p><strong>Due Date:</strong> <span id="dueDate"></span></p>
        <p><strong>Penalty Fees:</strong> <span id="penaltyFees"></span></p>
        <button class="close-btn" id="close-btn">Close</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('overlay');
            const popup = document.getElementById('popup');
            const closeBtn = document.getElementById('close-btn');
            function openPopup(bookName, dueDate, penaltyFees) {
                document.getElementById('bookName').textContent = bookName;
                document.getElementById('dueDate').textContent = dueDate;
                document.getElementById('penaltyFees').textContent = penaltyFees;
                overlay.style.display = 'block';
                popup.style.display = 'block';
            }
            closeBtn.addEventListener('click', function() {
                overlay.style.display = 'none';
                popup.style.display = 'none';
            });
            window.openPopup = openPopup;
        });
    </script>
</body>
</html>
