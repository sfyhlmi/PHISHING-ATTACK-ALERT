<?php
// get_remaining_time.php
session_start();

// Replace this with your logic to get the remaining time from the database
// Example: $remaining_time = fetch_remaining_time($_SESSION['admin_id']);
$remaining_time = 600; // Replace with actual remaining time

echo json_encode(['remainingTime' => $remaining_time]);
?>
