<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create a new MySQLi instance
$mysqli = new mysqli("localhost", "root", "", "formulario");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare and bind the statement
$stmt = $mysqli->prepare("INSERT INTO anonimo (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Execute the statement
if ($stmt->execute()) {
    // Close the statement and the connection
    $stmt->close();
    $mysqli->close();

    // Output the HTML including the link to style.css
    echo '<!DOCTYPE html>
            <html>
            <head>
                <title>Form Submission</title>
                <link rel="stylesheet" type="text/css" href="css/style.css">
            </head>
            <body>
                <h2>Form Submission</h2>';
    echo "Data inserted successfully!<br>";
    echo '<button type="button"><a href="index.html" class="link-style">Go back to index</a></button>';
    echo '</body>
            </html>';
} else {
    echo "Error: " . $mysqli->error;
}

?>
