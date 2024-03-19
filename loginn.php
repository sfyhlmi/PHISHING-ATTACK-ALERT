<?php
session_start();

// Validate the login credentials
if ($_POST['username'] == 'admin' && $_POST['password'] == 'aDmIn03_') {
    // Set user information in the session
    $_SESSION['user'] = 'admin';

    // Redirect to the admin panel
    header('Location: adminpanel.html');
    exit();
} else {
    echo '<div class="error-message">Invalid username or password. Please try again.</div>';
	
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
</html>
</head>





