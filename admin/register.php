<?php
include_once '../config/connection.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['captcha'] == $_POST['captcha']) {
        $name = mysqli_real_escape_string($connection, stripslashes($_POST['name']));
        $username = mysqli_real_escape_string($connection, stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($connection, stripslashes($_POST['password']));
        $email = mysqli_real_escape_string($connection, stripslashes($_POST['email']));
        $repassword = mysqli_real_escape_string($connection, stripslashes($_POST['repassword']));

        if ($password == $repassword) {
            if (checkUsername($connection, $username)) {
                $query = "INSERT INTO users SET username = '" . $username . "', password = '" . password_hash($password, PASSWORD_DEFAULT) . "', email = '" . $email . "', name = '" . $name . "'";
                if (mysqli_query($connection, $query)) {
                    $_SESSION['success'] = 'Berhasil daftar';
                    echo ("<script>location.href = 'login.php';</script>");
                } else {
                    $_SESSION['error'] = 'Gagal daftar';
                }
            } else {
                $_SESSION['error'] = 'Username sudah digunakan';
            }
        } else {
            $_SESSION['error'] = 'Password tidak sesuai';
        }
    } else {
        $_SESSION['error'] = 'Captcha salah';
    }
}

function checkUsername($connection, $username)
{
    $result = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) == 1) {
        return false;
    } else {
        return true;
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Afandi Aziz">
    <title>Register</title>
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
</head>

<body class="register-page">
    <div class="register-box">
        <div class="register-logo font-weight-bold pt-5">
            <a href="#">Administrator</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new account</p>
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
                        <input type="text" class="form-control" required placeholder="Full name" name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required placeholder="Retype password" name="repassword">
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
                        <input type="text" required class="form-control" onchange="captchaHandler()" placeholder="Captcha" name="captcha">
                        <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="text-center mt-3">
                    Already have an account? <a href="login.php">Sign in to the website here.</a>
                </p>
                <p class="mt-3 text-center">
                    <a href="../index.php">Back to the home page</a>
                </p>
            </div>
        </div><!-- /.card -->
    </div>

</body>

</html>