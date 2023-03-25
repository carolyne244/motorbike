<?php

// Replace the following placeholders with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "motorbike_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Perform database operations
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}

// Close connection
$conn->close();

?>
