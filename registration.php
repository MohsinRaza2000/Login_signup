<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php

    include('connection.php');
    $usernameErr = $emailErr =  $passErr = "";
    $emailwrr = $usernamestr = $passtr  = "";
    $username = $email = $password = "";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["username"])) {
                $usernameErr = "Name is required";
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            }
            if (empty($_POST["password"])) {
                $passErr = "password is required";
            }
            if ($_POST['username'] != "" || $_POST['email'] != "" || $_POST['password'] != "") {
                $query = "INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$password')";
                $result = mysqli_query($connection, $query);
                if ($result == true) {
                    echo "inserted";
                }
            }
        }
    }
    ?>
    <html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3 mt-3">
                <label for="uname" class="form-label">username:</label>
                <input type="text" placeholder="Enter username" name="username" required>
                <span class="error">* <?php echo $usernameErr; ?><?php echo $usernamestr; ?></span>
                <br><br>

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">email:</label>
                <input type="email" placeholder="Enter email" name="email" required>
                <span class="error">* <?php echo $emailErr; ?><?php echo $emailwrr ?></span>
                <br><br>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password:</label>
                <input type="password" placeholder="Enter password" name="password" required>
                <span class="error">* <?php echo $passErr; ?><?php echo $passtr; ?></span>
                <br><br>

                <input type="submit" name="submit" value="Register" class="btn btn-primary">
                <p class="link"><a href="login.php">Click to Login</a></p>
            </div>


        </form>
    </body>

    </html>
