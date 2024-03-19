<?php
session_start();

function generateToken() {
    // Generate a random token (you can customize this method as needed)
    $token = bin2hex(random_bytes(16));

    // Store the generated token in the session
    $_SESSION['generated_token'] = $token;
	


    return $token;
}

// Output the generated token
echo generateToken();
?>
