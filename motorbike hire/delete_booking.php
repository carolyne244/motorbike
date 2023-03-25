<?php
// Replace the placeholders with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motorbike_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the booking ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the bookings page after deleting the booking
        header("Location: bookings.html");
        exit();
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
} else {
    echo "Booking ID is not provided";
}

$conn->close();
?>
