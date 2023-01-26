<?php
include '../config/connection.php';

if (mysqli_query($connection, "DELETE FROM users WHERE id='$_GET[id]'")) {
    $_SESSION['success'] = 'Berhasil hapus data';
} else {
    $_SESSION['error'] = 'Gagal hapus data';
}
header('location:page-users.php');
