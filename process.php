<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    $to = "your@email.com"; // change to your email
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        echo "<h3>Thank you, $name. Your message has been sent!</h3>";
    } else {
        echo "<h3>Sorry, something went wrong. Please try again later.</h3>";
    }
} else {
    header('Location: index.php');
}
