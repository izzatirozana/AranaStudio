<?php include 'includes/header.php'; ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Users</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['error']);
                endif; ?>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['success']);
                endif; ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th width="15%" class="text-center"><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = mysqli_query($connection, "SELECT * FROM users");
                                    if (mysqli_num_rows($result)) {
                                        while ($item = mysqli_fetch_array($result)) {
                                    ?>
                                            <tr>
                                                <td><?= $item['name'] ?></td>
                                                <td><?= $item['username'] ?></td>
                                                <td><?= $item['email'] ?></td>
                                                <td class="text-center align-middle">
                                                    <a href="edit_user.php?id=<?= $item['id'] ?>" class="btn btn-info">Edit</a>
                                                    <a href="delete_user.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Data Kosong</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>