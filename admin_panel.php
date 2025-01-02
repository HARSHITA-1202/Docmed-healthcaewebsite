<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Add hospital
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_hospital'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $sector_name = $_POST['sector_name'];
    $link = $_POST['link'];

    $sql = "INSERT INTO hospitals (name, address, phone, sector_name, link) 
            VALUES ('$name', '$address', '$phone', '$sector_name', '$link')";
    if ($conn->query($sql) === TRUE) {
        $message = "Hospital added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Fetch hospitals
$hospitals = $conn->query("SELECT * FROM hospitals");

// Fetch appointments
$appointments = $conn->query("SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Hospitals</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #4b4b4b;
            font-weight: bold;
        }

        .nav-bar {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .nav-item {
            padding: 15px 20px;
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
        }

        .content {
            display: none;
        }

        .content.active {
            display: block;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="tel"],
        .form-container input[type="url"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            background:linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-container button:hover {
            background:linear-gradient(to right, #ff416c, #ff4b2b);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background:linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #d9534f;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #c9302c;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <div class="nav-bar">
            <div class="nav-item" onclick="showContent('manage-hospitals')">Manage Hospitals</div>
            <div class="nav-item" onclick="showContent('appointments')">Appointments</div>
        </div>

        <!-- Manage Hospitals Section -->
        <div id="manage-hospitals" class="content active">
            <h3>Add Hospital</h3>
            <?php if (isset($message)): ?>
                <p style="color: green;"><?= $message ?></p>
            <?php endif; ?>
            <form method="POST" class="form-container">
                <input type="text" name="name" placeholder="Hospital Name" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="tel" name="phone" placeholder="Phone Number" required>
                <input type="text" name="sector_name" placeholder="Sector Name" required>
                <input type="url" name="link" placeholder="Hospital Link" required>
                <button type="submit" name="add_hospital">Add Hospital</button>
            </form>

            <h3>Hospital List</h3>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Sector</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($hospital = $hospitals->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($hospital['name']) ?></td>
                            <td><?= htmlspecialchars($hospital['address']) ?></td>
                            <td><?= htmlspecialchars($hospital['phone']) ?></td>
                            <td><?= htmlspecialchars($hospital['sector_name']) ?></td>
                            <td><a href="<?= htmlspecialchars($hospital['link']) ?>" target="_blank">Visit</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Appointments Section -->
        <div id="appointments" class="content">
            <h3>Appointments</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $appointments->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['doctor'] ?></td>
                            <td><?= $row['date'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <script>
        // Function to toggle content display
        function showContent(sectionId) {
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => content.classList.remove('active'));

            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.add('active');
            }
        }
    </script>
</body>
</html>
