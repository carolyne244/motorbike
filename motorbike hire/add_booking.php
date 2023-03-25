<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $motorbike_id = $_POST['motorbike_id'];
  $client_name = $_POST['client_name'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  // Connect to database (replace placeholders with actual credentials)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "motorbike_management";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare SQL statement
  $sql = "INSERT INTO bookings (motorbike_id, client_name, start_date, end_date) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("isss", $motorbike_id, $client_name, $start_date, $end_date);

  // Execute statement
  if ($stmt->execute() === TRUE) {
    // Booking added successfully, redirect to bookings page
    header("Location: bookings.html");
    exit();
  } else {
    // Error occurred, show error message
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close database connection
  $stmt->close();
  $conn->close();
}
?>
