
<!DOCTYPE html>
<html>

<head>
    <title>students</title>
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
    <div class="content">
        <div class="image-box">
            <img src="ims.png" alt="Image">
        </div>

        <div class="form-field">
            <div class="text">register</div>
            <form action="register.php" method="post">
                <div class="input">
                    <label for="username">username</label>
                    <input type="text" name="username" placeholder="username" required>
                </div>

                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password">
                </div>

                <div class="login">
                    <button type="submit" class="btn" name="login">register</button>
                </div>
                <div class="register">
                    <a href="login.php">login here.</a>
                </div>

            </form>

        </div>

    </div>
</body>

</html>