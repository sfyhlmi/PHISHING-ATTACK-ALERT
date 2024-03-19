<!-- kids_dashboard.php -->
<?php
session_start();

// Validate the device password
$device_password = $_POST['device_password']; // Assuming it's sent via POST

// Check the device password against the database
$sql = "SELECT * FROM devices WHERE device_password = '$device_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid device password
    $_SESSION['kid'] = true;
    header('Location: kid_dashboard.html');
    exit();
} else {
    // Invalid device password
    echo 'Invalid device password. Please try again.';
}
?>
