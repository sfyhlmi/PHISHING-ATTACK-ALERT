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
    <div class="error-message">
        <?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : 'Invalid request.'; ?>
    </div>
</body>
</html>
