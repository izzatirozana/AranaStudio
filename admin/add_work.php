<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['image']['name']) {
        $filename = $_FILES["image"]["name"];
        if (move_uploaded_file($_FILES["image"]["tmp_name"], '../images/projects/' . $filename)) {
            $query = "INSERT INTO works SET image='$filename', title = '$_POST[title]', description = '$_POST[description]'";
            if (mysqli_query($connection, $query)) {
                $_SESSION['success'] = 'Berhasil tambah data';
                echo ("<script>location.href = 'page-works.php';</script>");
            } else {
                $_SESSION['error'] = 'Gagal tambah data';
            }
        } else {
            $_SESSION['error'] = 'Gagal upload gambar';
        }
    } else {
        $_SESSION['error'] = 'Silahkan pilih gambar';
    }
}
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Works</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php unset($_SESSION['error']);
        endif; ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control required">
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control required" rows="4"></textarea>
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" accept="image/*" class="form-control" required>
                                <div class="small text-danger d-none">Tidak Boleh Kosong</div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>