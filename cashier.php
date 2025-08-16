<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Federal Bank</title>
    <link href="images/download (1).png" rel="icon">
    <link href="images/download (1).png" rel="apple-touch-icon">
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
            color: green;
        }

        .form-group1 {
            margin-top: 15px;
        }

        .login-link {
            margin-top: 10px;
        }
    </style>
</head>

<?php
$con = new mysqli('localhost','root','','charusat_bank');
if (isset($_POST['cashierLogin'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $result = $con->query("SELECT * FROM login WHERE email='$user' AND password='$pass'");
    if ($result->num_rows > 0) {
        session_start();
        $data = $result->fetch_assoc();
        $_SESSION['cashid'] = $data['id'];
        header('location:cashier_index.php');
        exit();
    } else {
        echo '<script>alert("Username or password wrong. Try again!")</script>';
    }
}
?>

<body>
    <form method="POST" autocomplete="" class="login-form">
        <h2 class="text-center1">Cashier Login</h2>
        <p class="text-center1">Login with your email and password.</p>

        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group1">
            <input class="btn btn-primary btn-block" type="submit" name="cashierLogin" value="Login">
        </div>

        <div class="login-link text-center">
            Not a member? <a href="manager_login.php">Manager Login</a>
        </div>
    </form>
</body>
</html>
