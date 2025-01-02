<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit();
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];


// Insert into database
$sql = "INSERT INTO appointments (name, email, phone, doctor, date)
        VALUES ('$name', '$email', '$phone', '$doctor', '$date' )";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Appointment booked successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error booking appointment: " . $conn->error]);
}

$conn->close();
?>
