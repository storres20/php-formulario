<!DOCTYPE html>
<html>
<head>
    <title>ADMIN Page</title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    
    <h2>ADMIN Page</h2>

    <!-- Form for creating a new record -->
    <h3>Create</h3>
    <form action="admin/submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

    <!-- Display existing records -->
    <h3>Read - from ANONIMO table</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        <?php
        // Retrieve records from the database and display them in the table
        $mysqli = new mysqli("localhost", "root", "", "formulario");
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        $result = $mysqli->query("SELECT * FROM anonimo");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>
                    <a href=\"admin/edit.php?id=" . $row['id'] . "\">Edit</a>
                    <a href=\"admin/delete.php?id=" . $row['id'] . "\">Delete</a>
                    <a href=\"admin/validate.php?id=" . $row['id'] . "\">Validate</a>
                  </td>";
            echo "</tr>";
        }
        $mysqli->close();
        ?>
    </table>
</body>
</html>
