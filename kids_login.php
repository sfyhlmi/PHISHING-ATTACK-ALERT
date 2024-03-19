<?php
session_start();

// Retrieve the stored token from the session
$storedToken = isset($_SESSION['generated_token']) ? $_SESSION['generated_token'] : '';

// Validate the login credentials
if (isset($_POST['token']) && hash_equals($storedToken, $_POST['token'])) {
    // Set user information in the session
    $_SESSION['user'] = 'kids_devices';

    // Redirect to the kids dashboard
    header('Location: kids_dashboard.html');
    exit();
} else {
    echo '<div class="error-message">Invalid token. Please try again.</div>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error-message {
            background-color: #ff5252; /* Red background color */
            color: #fff; /* White text color */
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Your HTML content goes here -->
</body>
</html>






