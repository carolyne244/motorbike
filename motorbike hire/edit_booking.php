<?php
// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the booking id from the form data
    $booking_id = $_POST['booking_id'];

    // Retrieve the booking information from the database
    // Replace the database credentials placeholders with your own database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "motorbike_management";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the booking information from the database
    $sql = "SELECT * FROM bookings WHERE id=$booking_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $booking = mysqli_fetch_assoc($result);
    } else {
        echo "Booking not found!";
        exit();
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
</head>
<body>
    <h1>Edit Booking</h1>

    <form action="update_booking.php" method="POST">
        <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">

        <label for="motorbike_id">Motorbike:</label>
        <select name="motorbike_id" id="motorbike_id" required>
            <?php
            // Replace the database credentials placeholders with your own database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database_name = "motorbike_management";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database_name);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve the list of motorbikes from the database
            $sql = "SELECT * FROM motorbikes";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($motorbike = mysqli_fetch_assoc($result)) {
                    if($motorbike['id'] == $booking['motorbike_id']) {
                        echo '<option value="' . $motorbike['id'] . '" selected>' . $motorbike['brand'] . ' ' . $motorbike['model'] . '</option>';
                    } else {
                        echo '<option value="' . $motorbike['id'] . '">' . $motorbike['brand'] . ' ' . $motorbike['model'] . '</option>';
                    }
                }
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </select>

        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            <?php
            // Replace the database credentials placeholders with your own database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database_name = "motorbike_management";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database_name);

            // Check connection
           
