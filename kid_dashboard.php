<!-- kid_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kid Dashboard</title>
    <!-- Add any styling or CSS as needed -->
</head>
<body>
    <h2>Welcome, Kid!</h2>
    <p>The time starts now.</p>

    <!-- Add your JavaScript logic for time ticking here (similar to the admin panel) -->
    <div id="time-ticking"></div>

    <script>
        // Add your JavaScript logic for time ticking here
        // You can use setInterval to update the time display
        setInterval(function() {
            // Fetch remaining time from the server and update the #time-ticking element
            fetch('get_remaining_time.php') // Replace with the actual endpoint to get remaining time
                .then(response => response.json())
                .then(data => {
                    updateRemainingTime(data.remainingTime);
                })
                .catch(error => console.error('Error fetching remaining time:', error));
        }, 1000);

        // Function to update the remaining time display
        function updateRemainingTime(remainingTime) {
            const timeTickingElement = document.getElementById('time-ticking');
            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;

            // Format the time as MM:SS
            const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Update the element content
            timeTickingElement.textContent = `Time Remaining: ${formattedTime}`;

            // Optional: You can add styles or additional formatting based on the remaining time
            if (remainingTime <= 300) { // for example, change color if less than 5 minutes remaining
                timeTickingElement.style.color = 'red';
            } else {
                timeTickingElement.style.color = 'black';
            }

            // Optional: You can trigger actions when the time reaches 0 (e.g., log out the user)
            if (remainingTime === 0) {
                alert('Time limit reached. Logging out...');
                // Add logic to log out the user
            }
        }
    </script>
</body>
</html>
