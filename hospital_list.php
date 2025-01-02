<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch hospitals
$hospitals = $conn->query("SELECT * FROM hospitals");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #333;
            padding: 20px;
        }
        h2 { text-align: center; color:, #ff4b2b; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        th { background: #ff4b2b; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        a { color: #ff4b2b; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Hospital List</h2>
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
</body>
</html>
