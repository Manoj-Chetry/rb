<?php
require_once('connection.php');

$id = $_GET['id'];

// Perform the delete operation
$query = "DELETE FROM contactus WHERE id = '$id'";
$result = mysqli_query($con, $query);

// Check if the deletion was successful
if ($result) {
  // Redirect back to the volunteer page or show a success message
  header('Location: Check_contactUs.php');
  exit();
} else {
  // Display an error message
  echo "Error deleting the ContactUS.";
}
?>
