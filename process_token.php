<?php
// process_token.php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user details and token from the form
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $providedToken = isset($_POST['token']) ? $_POST['token'] : '';

    // Check if the provided token matches the one stored in the session
    if ($providedToken === $_SESSION['generated_token']) {
        // Token matches, you can now associate it with the user, e.g., store it in a database

        // For demonstration purposes, let's echo a success message
        echo "Token provided successfully for user: $username";
    } else {
        // Token doesn't match, display an error message
        echo "Invalid token provided for user: $username";
    }

    // Optional: Clear the token from the session after use
    unset($_SESSION['generated_token']);
} else {
    // Redirect back to the form if accessed directly
    header('Location: provide_token_form.php');
    exit;
}
?>
