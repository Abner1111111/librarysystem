<div class="column-content">
    <h2>Newly Registered Students</h2>
    <table id="studentsTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Registration Date</th>
                <th>Email</th>
                <th>Status</th> 
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentsData = [
                { id: 1, name: 'John Doe', date: '2024-08-01', email: 'john.doe@example.com', status: 'Active', bookName: 'Book A', dueDate: '2024-09-01', penaltyFees: '$5' },
                { id: 2, name: 'Jane Smith', date: '2024-08-05', email: 'jane.smith@example.com', status: 'Pending', bookName: 'Book B', dueDate: '2024-09-05', penaltyFees: '$10' },
            ];

            const tableBody = document.querySelector('#studentsTable tbody');

            studentsData.forEach(student => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${student.id}</td>
                    <td>${student.name}</td>
                    <td>${student.date}</td>
                    <td>${student.email}</td>
                    <td><button class="status-btn ${student.status.toLowerCase()}" onclick="openPopup('${student.bookName}', '${student.dueDate}', '${student.penaltyFees}')">${student.status}</button></td> <!-- Status as Button -->
                `;
                tableBody.appendChild(row);
            });
        });
    </script>
</div>
