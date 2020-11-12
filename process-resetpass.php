<?php
$code = $_POST['code'];
$password1 = $_POST['txtPassword1'];
$hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
require("config.php");
$conn = new mysqli('localhost', 'root', '', 'btl');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
$sql = "UPDATE `users` SET `password` = '$hashed_passcode' WHERE activation_code = '$code'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location:updatepass-successfully.php");
    
} else {
    echo "Error updating record: " . $conn->error;
    
}

$conn->close();
?>