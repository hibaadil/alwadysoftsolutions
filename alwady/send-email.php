<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $service = $_POST["service"];
    $message = $_POST["message"];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address. Please go back and try again.";
        header("Location: index.html");
        exit();
    }

    $to = "info@alwadysoft.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";

    // Construct the email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Mobile: $mobile\n";
    $body .= "Service Type: $service\n";
    $body .= "Message:\n$message";

    // Send the email
    $success = mail($to, $subject, $body, $headers);

    if ($success) {
        echo "Thank you for contacting us!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

    // Redirect back to index.html
    header("Location: index.html");
    exit();
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: index.html");
    exit();
}
