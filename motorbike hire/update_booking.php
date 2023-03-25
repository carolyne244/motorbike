<?php
// Replace the database credentials placeholders with your own credentials
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the booking ID from the form data
    $booking_id = $_POST["booking_id"];

    // Get the new data from the form data
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $motorbike_id = $_POST["motorbike_id"];
    $client_id = $_POST["client_id"];
    $total_price = $_POST["total_price"];

    // Update the booking in the database
    $sql = "UPDATE bookings SET start_date='$start_date', end_date='$end_date', motorbike_id='$motorbike_id', client_id='$client_id', total_price='$total_price' WHERE id='$booking_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Booking updated successfully";
    } else {
        echo "Error updating booking: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
