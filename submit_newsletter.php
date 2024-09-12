<?php
// Define the file to store newsletter subscribers
$filename = "subscribers.txt";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please go back and try again.";
        exit;
    }

    // Prepare subscriber entry (name and email)
    $subscriber_entry = "Name: " . ($name ?: 'N/A') . " | Email: " . $email . PHP_EOL;

    // Save to file
    file_put_contents($filename, $subscriber_entry, FILE_APPEND);

    // Success message
    echo "Thank you for subscribing! You'll start receiving updates from Wallenc soon.";
} else {
    echo "Invalid request method.";
}
?>
