<?php
include 'includes/header.php';
$result = mysqli_query($connection, "SELECT * FROM works WHERE id='$_GET[id]'");
if ($result) {
    if (mysqli_num_rows($result)) {
        $data = mysqli_fetch_array($result);
    } else {
        header('location:page.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename_image = $data['image'];
    if ($_FILES['image']['name']) {
        if (unlink('../images/projects/' . $data['image'])) {
            $filename = $_FILES["image"]["name"];
            if (move_uploaded_file($_FILES["image"]["tmp_name"], '../images/projects/' . $filename)) {
                $filename_image = $filename;
            } else {
                $_SESSION['error'] = 'Gagal upload gambar';
            }
        } else {
            $_SESSION['error'] = 'Gagal upload gambar';
        }
    } else {
        $_SESSION['error'] = 'Silahkan pilih gambar';
    }

    $query = "UPDATE works SET image='$filename_image', title = '$_POST[title]', description = '$_POST[description]' WHERE id='$_GET[id]'";
    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = 'Berhasil edit data';
        echo ("<script>location.href = 'page-works.php';</script>");
    } else {
        $_SESSION['error'] = 'Gagal edit data';
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
                <form action="?id=<?= $data['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</span></label>
                                <input type="text" name="title" id="title" class="form-control required" required value="<?= $data['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control required" rows="4"><?= $data['description'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" accept="image/*" class="form-control">
                            </div>
                            <img width="280" src="../images/projects/<?= $data['image'] ?>">
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