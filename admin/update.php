<?php
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Update the record in the database based on the provided ID
    $mysqli = new mysqli("localhost", "root", "", "formulario");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Update the record based on the ID
    $stmt = $mysqli->prepare("UPDATE anonimo SET name = ?, email = ?, message = ? WHERE id = ?");
    $stmt->bind_param("sssi", $name, $email, $message, $id);

    if ($stmt->execute()) {
        // Close the statement and the connection
        $stmt->close();
        $mysqli->close();

        // Output the HTML including the link to style.css
        echo '<!DOCTYPE html>
                <html>
                <head>
                    <title>ADMIN - Update</title>
                    <link rel="stylesheet" type="text/css" href="../css/style.css">
                </head>
                <body>
                    <h2>ADMIN - Update</h2>';
        echo "Record updated successfully!<br>";
        echo '<button type="button"><a href="../admin.php" class="link-style">Go back to ADMIN page</a></button>';
        echo '</body>
                </html>';
    } else {
        echo "Error: " . $mysqli->error;
    }

} else {
    echo "Invalid request.";
    exit;
}
?>
