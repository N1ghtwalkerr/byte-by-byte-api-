<?php
$servername = "localhost"; // Your database server
$username = "ckqvjyjo"; // Your database username
$password = "09204353341_Account"; // Your database password
$dbname = "ckqvjyjo_db_booking"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
