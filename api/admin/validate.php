<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the record from the `anonimo` table based on the provided ID
    $mysqli = new mysqli("localhost", "root", "", "formulario");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch the record based on the ID
    $stmt = $mysqli->prepare("SELECT * FROM anonimo WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();

    // Check if the record exists
    if (!$record) {
        echo "Record not found.";
        exit;
    }

    // Retrieve the data from the record
    $name = $record['name'];
    $email = $record['email'];
    $message = $record['message'];

    // Insert the data into the `PRINCIPAL` table
    $stmt = $mysqli->prepare("INSERT INTO principal (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        // Data inserted successfully, now delete the record from the `anonimo` table
        $deleteStmt = $mysqli->prepare("DELETE FROM anonimo WHERE id = ?");
        $deleteStmt->bind_param("i", $id);
        if ($deleteStmt->execute()) {
            // Close the statement and the connection
            $stmt->close();
            $mysqli->close();
    
            // Output the HTML including the link to style.css
            echo '<!DOCTYPE html>
                    <html>
                    <head>
                        <title>ADMIN - Validate</title>
                        <link rel="stylesheet" type="text/css" href="../css/style.css">
                    </head>
                    <body>
                        <h2>ADMIN - Validate</h2>';
            echo "Validation successful. Record moved to the PRINCIPAL table!<br>";
            echo '<button type="button"><a href="../admin.php" class="link-style">Go back to ADMIN page</a></button>';
            echo '</body>
                    </html>';
        
            /* echo "Validation successful. Record moved to the PRINCIPAL table."; */
        } else {
            echo "Error deleting record from the ANONIMO table: " . $mysqli->error;
        }
        $deleteStmt->close();
    } else {
        echo "Error inserting record into the PRINCIPAL table: " . $mysqli->error;
    }

    /* $stmt->close();
    $mysqli->close(); */
} else {
    echo "Invalid request.";
    exit;
}
?>
