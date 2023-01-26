<?php
include_once '../config/connection.php';
if (!isset($_SESSION["login"])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?php include_once 'navbar.php' ?>
        <?php include_once 'sidebar.php' ?>
        <div class="content-wrapper">