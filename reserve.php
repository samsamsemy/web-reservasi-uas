<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$room = $_POST['room'];
$region = $_POST['region'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];

// Insert customer data
$sql = "INSERT INTO customers (name, email, phone, region) VALUES ('$name', '$email', '$phone', '$region')";
if ($conn->query($sql) === TRUE) {
    $customer_id = $conn->insert_id;

    // Insert reservation data
    $sql = "INSERT INTO reservations (customer_id, room_id, check_in, check_out) VALUES ($customer_id, $room, '$checkin', '$checkout')";
    if ($conn->query($sql) === TRUE) {
        echo "Reservation successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>