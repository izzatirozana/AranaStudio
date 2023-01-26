<?php
include '../config/connection.php';

$qry = "SELECT image FROM works WHERE id='$_GET[id]'";
$CURRENT = mysqli_fetch_array(mysqli_query($connection, $qry));
unlink('../images/projects/' . $CURRENT['image']);

if (mysqli_query($connection, "DELETE FROM works WHERE id='$_GET[id]'")) {
    $_SESSION['success'] = 'Berhasil hapus data';
} else {
    $_SESSION['error'] = 'Gagal hapus data';
}
header('location:page-works.php');
