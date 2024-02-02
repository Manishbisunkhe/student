<?php
session_start(); // Start a session for user authentication

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate input (you might want to add more validation)
    if (empty($username) || empty($password)) {
        echo "<p class='error'>Please enter both username and password.</p>";
    } else {
        // Connect to the database (replace with your database credentials)
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "studentmanagement";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check user credentials against the database
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the entered password with the stored password
                if ($password === $user["password"]) { // Assuming passwords are stored in plaintext
                    // Set session variables for user authentication
                    $_SESSION["username"] = $user["username"];
                    echo "<p class='success'>Login successful! Redirecting...</p>";
                    
                    header("refresh:2;url=dashboard.php"); // Redirect to dashboard after 2 seconds (adjust as needed)
                } else {
                    echo "<p class='error'>Invalid password.</p>";
                }
            } else {
                echo "<p class='error'>User not found.</p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Close database connection
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>IMS Login - Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="shortcut icon" type="x-icon" href="Vector.svg">
    <style>
        div#errorMessage {
            background-color: #fff;
            text-align: center;
            color: red;
            font-size: 20px;
            padding: 11px;
        }
    </style>
</head>

<body id="loginBody">
    <?php
    if (!empty($error_message)) {
    ?>
        <div id="errorMessage">
            <p>Error: <?= $error_message ?></p>
        </div>
    <?php }

    ?>
    <div class="content">
        <div class="image-box">
            <img src="ims.png" alt="Image">
        </div>

        <div class="form-field">
            <div class="text">Login</div>
            <form action="login.php" method="post">
                <div class="input">
                    <label for="username">username</label>
                    <input type="text" name="username" placeholder="username" required>
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password">
                </div>

                <div class="login">
                    <button type="submit" class="btn" name="login">Login</button>
                </div>

                <div class="back-login">
                    <a href="homepage.php" class="hover-back-login"> BACK</a>
                </div>
                <div class="register">
                    <a href="register.php">register here.</a>
                </div>

            </form>

        </div>

    </div>
</body>

</html>