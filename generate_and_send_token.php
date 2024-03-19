<?php
session_start();

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(16));
}

if (isset($_GET['send_email']) && $_GET['send_email'] == 1) {
    // Generate a token
    $token = generateToken();

    // Get guest information from the form
    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];

    // Send an email to the guest with the token
    $subject = "Your Guest Token";
    $message = "Dear $guest_name,\n\nHere is your guest token: $token\n\nUse this token for guest login.";
    $headers = "From: soofeeya17@gmail.com";

    // Uncomment the following line to send the email (make sure your server is configured for email sending)
    // mail($guest_email, $subject, $message, $headers);

    // Redirect to the success page
    header('Location: token_sent.html');
    exit();
}
?>
