<!DOCTYPE html>
<html>
<head>
    <title>Form Submission</title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <h2>Form Submission</h2>
    <form action="submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
