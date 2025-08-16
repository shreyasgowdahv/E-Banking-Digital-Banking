<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Federal Bank</title>
    <link href="images/charusat_symbol.jpg" rel="icon">
    <link href="images/charusat_symbol.jpg" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .text-center1 {
            text-align: center;
            color: red;
        }

        .form-group1 {
            margin-top: 15px;
        }

        .login-link {
            margin-top: 10px;
        }

        h6 {
            overflow: hidden;
            text-align: center;
            color: grey;
            margin-top: 15px;
        }

        h6:before,
        h6:after {
            background-color: #000;
            content: "";
            display: inline-block;
            height: 1px;
            position: relative;
            vertical-align: middle;
            width: 30%;
        }

        h6:before {
            right: 0.5em;
            margin-left: -50%;
        }

        h6:after {
            left: 0.5em;
            margin-right: -50%;
        }
    </style>
</head>

<?php
$con = new mysqli('localhost','root','','charusat_bank');
if (isset($_POST['login'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $result = $con->query("SELECT * FROM manager WHERE email='$user' AND password='$pass' AND type='manager'");
    if ($result->num_rows > 0) {
        session_start();
        $data = $result->fetch_assoc();
        $_SESSION['loginid'] = $data['id'];
        header('location:manager_home.php');
        exit();
    } else {
        echo '<script>alert("Username or password wrong. Try again!")</script>';
    }
}
?>

<body>
    <form method="POST" class="login-form">
        <h2 class="text-center1">Manager Login</h2>
        <p class="text-center1">Login with your email and password.</p>

        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group1">
            <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
        </div>

        <div class="login-link text-center">
            Not a member? <a href="login.php">User Login</a>
        </div>

        <h6>or</h6>

        <div class="login-link text-center">
            <a href="cashier.php">Cashier Login</a>
        </div>
    </form>
</body>
</html>
