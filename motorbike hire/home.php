<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Include database configuration
include 'db_config.php';

// Query to get all bookings
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

// Check if query was successful
if (!$result) {
  die("Error: " . mysqli_error($conn));
}

// Fetch bookings data and store in array
$bookings = array();
while ($row = mysqli_fetch_assoc($result)) {
  $bookings[] = $row;
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Motorbike Management System</title>
</head>
<body>
  <h1>Welcome to Motorbike Management System</h1>
  
  <h2>Bookings</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Motorbike Model</th>
        <th>Rental Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($bookings as $booking) { ?>
        <tr>
          <td><?php echo $booking['id']; ?></td>
          <td><?php echo $booking['customer_name']; ?></td>
          <td><?php echo $booking['motorbike_model']; ?></td>
          <td><?php echo $booking['rental_date']; ?></td>
          <td><?php echo $booking['return_date']; ?></td>
          <td><?php echo $booking['status']; ?></td>
          <td>
            <a href="update_booking.php?id=<?php echo $booking['id']; ?>">Edit</a>
            <a href="delete_booking.php?id=<?php echo $booking['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <a href="bookings.php">Add Booking</a>
  <a href="logout.php">Logout</a>
</body>
</html>
