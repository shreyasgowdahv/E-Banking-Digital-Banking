<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Federal Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .login-form {
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-panel {
            text-align: center;
        }
    </style>
</head>

<?php
    $con = new mysqli('localhost','root','','charusat_bank');

    $error = "";
    if (isset($_POST['userlogin'])) {
        $user = $_POST['email'];
        $pass = $_POST['password'];

        $result = $con->query("SELECT * FROM userAccounts WHERE email='$user' AND password='$pass'");
        if($result->num_rows > 0) { 
            session_start();
            $data = $result->fetch_assoc();
            $_SESSION['userid'] = $data['id'];
            $_SESSION['user'] = $data;
            header('Location: home.php?id=' . $_SESSION['userid']);
            exit();
        } else {
            echo '<script>alert("Username or password wrong. Try again!")</script>';
        }
    }
?>

<body>
    <form method="POST" class="login-form">
        <h2 class="login-panel">User Login</h2>
        <p class="login-panel">Login with your email and password.</p>

        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email Address" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <input class="btn btn-primary btn-block" type="submit" name="userlogin" value="Login">
        </div>

        <div class="text-center login-panel">
            Not a member? <a href="manager_login.php">Manager Login</a>
        </div>
    </form>
</body>
</html>
