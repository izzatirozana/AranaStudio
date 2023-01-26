<?php
$status = $reg = $link = '';

if (isset($_SESSION["login"])) {
    $status = $_SESSION["login"];
    $reg = "Logout";
    $link = "./admin/logout.php";
} else {
    $status = "Login";
    $reg = "Register";
    $link = "./admin/register.php";
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white navbar-arana fixed-top">
    <div class="container">
        <a href="index.php" class="navbar-brand navbar-logo-journal">
            <img src="images/logo.svg" alt="Logo" class="logo-journal" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item text-center active">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item text-center">
                    <a href="about-us.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item text-center">
                    <a href="our-works.php" class="nav-link">Our Works</a>
                </li>
                <li class="nav-item text-center">
                    <a href="https://wa.me/+6281806057343" target="_blank" class="nav-link">Contact Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-center me-5">
                    <a href=<?= $link ?> class="nav-link"><?= $reg ?></a>
                </li>
                <li class="nav-item text-center">
                    <a href="./admin/login.php" class="btn btn-primary nav-link px-4 text-white"><?= $status ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>