<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel = "stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch("reservations.json") // Simulating API call
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("reservation-body");
                    tableBody.innerHTML = "";
                    data.forEach(reservation => {
                        const row = `<tr>
                            <td>${reservation.name}</td>
                            <td>${reservation.email}</td>
                            <td>${reservation.location}</td>
                            <td>${reservation.age}</td>
                            <td>${reservation.phone}</td>
                            <td>${reservation.date}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error("Error fetching reservations:", error));
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            text-align: center;
        }
        .sidebar ul li:hover {
            background: #495057;
            cursor: pointer;
        }
        .container {
            margin-left: 270px;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
        <?php
        $logout = 1;
        $home = 0;
        echo "
            <a href='index.php?home=$home'><li>Home</li></a>
            <a href='admin.php'><li>Pending Reservations</li></a>
            <a href='accepted.php'><li>Accepted Reservations</li></a>
            <a href= 'index.php?checker=$logout'><li>Logout</li></a>"
            ?>
        </ul>

        
    </div>
    <div class="container">
        <h2>Pending Reservation</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>   
                    
                </tr>
                
            </thead>
            <tbody id="reservation-body">
                <?php
                $sql = "SELECT * FROM accepted";
                $result = $con->query($sql);
                if(!$result){
                    die("Invalid Query: " .$connection->error);
                }
                while($row = $result->fetch_assoc())
                {

                    echo "
                    <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>" . $row["cnum"] . "</td>
                    <td>" . $row["date"] . "</td>
                    <td>" . $row["time"] . "</td>
                    </tr>";

                }

                
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>