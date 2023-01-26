<?php
include_once '../config/connection.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if ($_SESSION['captcha'] == $_POST['captcha']) {
    $username = mysqli_real_escape_string($connection, stripslashes($_POST['username']));
    $password = mysqli_real_escape_string($connection, stripslashes($_POST['password']));

    if (!empty(trim($username)) && !empty(trim($password))) {
        $result = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($result) == 1) {
            if (password_verify($password, mysqli_fetch_assoc($result)['password'])) {
                $_SESSION["login"] = $username;
                unset($_SESSION['captcha']);
                header('location:index.php');
            } else {
                $_SESSION['error'] = 'Password salah';
            }
        } else {
            $_SESSION['error'] = 'Username salah';
        }
    } else {
        $_SESSION['error'] = 'Username dan Password tidak boleh kosong';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
</head>

<body class="login-page">
    <div class="login-box">
        <div class="login-logo font-weight-bold">
            <a href="#">Administrator</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to manage website</p>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['success']);
                endif; ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['error']);
                endif; ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="my-2 text-center">
                            <img src="../config/captcha.php">
                        </div>
                        <input type="text" class="form-control form-control-user" onchange="captchaHandler()" required placeholder="Captcha" name="captcha">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 text-center">
                    Don't have an account? <a href="register.php">Register a new account here.</a>
                </p>
                <p class="mt-3 text-center">
                    <a href="../index.php">Back to the home page</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>