<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  // Create an email message
  $to = "your-email@example.com";
  $subject = "New message from Motorbikes website";
  $body = "Name: $name\n\nEmail: $email\n\nMessage: $message";
  $headers = "From: $email";
  
  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    // Email sent successfully, redirect to thank-you page
    header("Location: thank-you.php");
    exit();
  } else {
    // Email failed to send, display error message
    $error_message = "Sorry, something went wrong. Please try again later.";
  }
}
?>
