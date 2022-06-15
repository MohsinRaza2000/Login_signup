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
include("connection.php");
session_start();
$emailErr =  $passErr ="";
$emailwrr= $usernamestr = $passtr  ="";
 $email = $password ="";
if(isset($_SESSION["email"],$_SESSION["password"])) {
    header("Location: dashboard.php");
    exit();
}
if (isset($_POST['submit'])) {
    $email = stripslashes($_REQUEST['email']);
    $password = stripslashes($_REQUEST['password']);
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    if (empty($_POST["password"])) {
        $passErr = "password is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailwrr = "wrong";
    }
    if (strlen($_POST['password']) <= 8) {
        $passtr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$_POST['password'])) {
        $passtr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$_POST['password'])) {
        $passtr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$_POST['password'])) {
        $passtr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }

    $query    = "SELECT * FROM `users` WHERE email = '$email' AND password ='" . md5($password) . "'";
    $result = mysqli_query($connection, $query) ;
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("Location: dashboard.php");
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
              </div>";
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="mb-3 mt-3">
    <label for="email" >email:</label>
    <input type="email"  id="email" placeholder="Enter email" name="email">
    <span class="error">* <?php echo $emailErr;?><?php echo $emailwrr ?></span>
                <br><br>
  </div>
  <div class="mb-3">
    <label for="password" >password:</label>
    <input type="password"  id="password" placeholder="Enter password" name="password" >
    <span class="error">* <?php echo $passErr;?><?php echo $passtr ;?></span>
                <br><br>
    <input type="submit" name="submit" value="Login" class="btn btn-primary">


  </div>


</form>
</body>
</html>

