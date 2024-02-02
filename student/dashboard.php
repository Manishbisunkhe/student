<?php
// start the session.
session_start();

if (!isset($_SESSION['user'])) header('Location: login.php');
$user = $_SESSION['user'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        hello from dashboard
    </h1>
</body>
</html>