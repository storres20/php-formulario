<!DOCTYPE html>
<html>
<head>
    <title>PRINCIPAL Page</title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>
    
    <h2>PRINCIPAL Page</h2>

    <!-- Display existing records -->
    <h3>Read - from PRINCIPAL table</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
        <?php
        // Retrieve records from the database and display them in the table
        $mysqli = new mysqli("localhost", "root", "", "formulario");
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        $result = $mysqli->query("SELECT * FROM principal");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        $mysqli->close();
        ?>
    </table>
</body>
</html>
