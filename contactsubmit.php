<?php
require 'db.php'; // Make sure this connects to fashionnest_db

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = mysqli_real_escape_string($dbcon, $_POST['name']);
  $email = mysqli_real_escape_string($dbcon, $_POST['email']);
  $subject = mysqli_real_escape_string($dbcon, $_POST['subject']);
  $message = mysqli_real_escape_string($dbcon, $_POST['message']);

  $insert = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
  
  if (mysqli_query($dbcon, $insert)) {
    echo "<script>alert('✅ Your message has been sent successfully.'); window.location.href='contact.php';</script>";
  } else {
    echo "<script>alert('❌ Error submitting message. Please try again.');</script>";
  }
}
?>
