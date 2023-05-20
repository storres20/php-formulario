<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database based on the provided ID
    $mysqli = new mysqli("localhost", "root", "", "formulario");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Delete the record based on the ID
    $stmt = $mysqli->prepare("DELETE FROM anonimo WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Close the statement and the connection
        $stmt->close();
        $mysqli->close();

        // Output the HTML including the link to style.css
        echo '<!DOCTYPE html>
                <html>
                <head>
                    <title>ADMIN - Delete</title>
                    <link rel="stylesheet" type="text/css" href="../css/style.css">
                </head>
                <body>
                    <h2>ADMIN - Delete</h2>';
        echo "Record deleted successfully!<br>";
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
