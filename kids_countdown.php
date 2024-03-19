<?php
session_start();

// Validate the login credentials
if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    // Set user information in the session
    $_SESSION['user'] = 'admin';

    // Redirect to the admin panel
    header('Location: adminpanel.html');
    exit();
} else {
    echo 'Invalid username or password. Please try again.';
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wifi_token_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch admin settings
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id']; // Make sure to set this value during login
    $sql = "SELECT * FROM admin_settings WHERE admin_id = $admin_id";
    $result = $conn->query($sql);

    if ($result) {
        $admin_settings = $result->fetch_assoc();
    } else {
        echo 'Error fetching admin settings: ' . $conn->error;
    }
} else {
    echo 'Admin ID not set in the session.';
}

// Fetch devices if admin_id is set
if (isset($admin_id)) {
    $sql = "SELECT * FROM devices WHERE admin_id = $admin_id";
    $result = $conn->query($sql);

    if ($result) {
        $devices = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo 'Error fetching devices: ' . $conn->error;
    }
} else {
    echo 'Admin ID not set in the session.';
}

// Handle setting time limit
if (isset($_POST['set_limit'])) {
    $time_limit = $_POST['time_limit'];
    $device_count = $_POST['device_count'];

    // Update admin settings in the database
    $sql = "UPDATE admin_settings SET time_limit = $time_limit, device_count = $device_count WHERE admin_id = $admin_id";
    $conn->query($sql);
}



// Handle setting device credentials
if (isset($_POST['set_credentials'])) {
    $device_id = $_POST['device_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update device credentials in the database
    $sql = "UPDATE devices SET device_username = '$username', device_password = '$password' WHERE id = $device_id";
    $conn->query($sql);



    // Redirect to kids' login page
    header('Location: kids_login.html');
    exit();
}

// Close the database connection
$conn->close();
?>
