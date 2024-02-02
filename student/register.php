<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    var_dump($username, $password);
    // Validate input (you might want to add more validation)
    if (empty($username) || empty($password)) {
        echo "<p class='error'>Please enter both username and password.</p>";
    } else {
        // Connect to the database (replace with your database credentials)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "studentmanagement";

        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert user into the database without password hashing
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<p class='success'>Registration successful! <a href='login.php'>Login here</a></p>";
        } else {
            echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        // Close database connection
        $conn->close();
    }
}
?>