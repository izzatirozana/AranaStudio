<?php
include 'includes/header.php';
$totalUsers = mysqli_query($connection, "SELECT * FROM users");
$totalWorks = mysqli_query($connection, "SELECT * FROM works");
$totalImages = mysqli_query($connection, "SELECT * FROM sliders");
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Dashboard</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= mysqli_num_rows($totalWorks) ?></h3>
                        <p>Works</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-th"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= mysqli_num_rows($totalUsers) ?></h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>