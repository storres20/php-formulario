<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the record from the database based on the provided ID
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

    // Display the form for editing the record
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Record</title>
    </head>
    <body>
        <h2>Edit Record</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $record['name']; ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $record['email']; ?>" required><br><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php echo $record['message']; ?></textarea><br><br>

            <input type="submit" value="Update">
        </form>
    </body>
    </html>
    <?php

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
