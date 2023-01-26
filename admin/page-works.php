<?php include 'includes/header.php'; ?>
<?php
$limit = 5;
$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$type = (isset($_GET['type']) ? $_GET['type'] : null);
$q = (isset($_GET['q']) ? $_GET['q'] : null);

$limitStart = ($page - 1) * $limit;
if ($type) {
    $sql = "SELECT * FROM works WHERE $type LIKE '%$q%'";
} else {
    $sql = "SELECT * FROM works";
}
$no = $limitStart + 1;
$qry = mysqli_query($connection, $sql . " LIMIT $limitStart, $limit");

$totalData = mysqli_num_rows(mysqli_query($connection, $sql));
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Projects</h1>
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
            <div class="card-header py-3">
                <a href="add_work.php" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="d-flex flex-lg-row flex-column mb-3">
                    <div class="ml-auto">
                        <div class="d-flex">
                            <form action="" method="get">
                                <input type="hidden" name="page" value="1">
                                <div class="input-group">
                                    <select name="type" class="form-control mr-3">
                                        <option <?= ($type == 'title' ? 'selected' : null) ?> value="title">Title</option>
                                        <option <?= ($type == 'description' ? 'selected' : null) ?> value="description">Description</option>
                                    </select>
                                    <input value="<?= (isset($_GET['q']) ? $_GET['q'] : null) ?>" type="text" class="form-control" name="q" placeholder="Kata Kunci..." autofocus autocomplete="off">
                                    <button class="btn btn-info" type="submit">Cari</button>
                                    <button class="btn btn-secondary" type="button" onclick="location.href='page-works.php'">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">Image</th>
                                <th>Title</th>
                                <th width="50%">Description</th>
                                <th width="10%" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($totalData > 0) :
                                while ($item = mysqli_fetch_array($qry)) :
                            ?>
                                    <tr>
                                        <td><img width="80" src="../images/projects/<?= $item['image'] ?>"></td>
                                        <td><?= $item['title'] ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td class="text-center align-middle">
                                            <a href="edit_work.php?id=<?= $item['id'] ?>" class="btn btn-info">Edit</a>
                                            <a href="delete_work.php?id=<?= $item['id'] ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile;
                            else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">Data Kosong</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex">
                    <div class="ml-auto">
                        <nav>
                            <ul class="pagination shadow-sm">
                                <?php if ($page == 1) : ?>
                                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <?php
                                else :
                                    $linkPrev = ($page > 1) ? $page - 1 : 1;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= "?page=$linkPrev&type=$type&q=$q" ?>">Previous</a></li>
                                <?php endif; ?>

                                <?php
                                $totalPages = ceil($totalData / $limit);
                                $num = 1;
                                $startNum = ($page > $num ? $page - $num : 1);
                                $endNum = ($page < ($totalPages - $num) ? $page + $num : $totalPages);
                                for ($i = $startNum; $i <= $totalPages; $i++) :
                                ?>
                                    <li class="page-item"><a class="page-link <?= $page == $i ? 'bg-primary text-white' : null ?>" href="<?= "?page=$i&type=$type&q=$q" ?>"><?= $i ?></a></li>
                                <?php endfor ?>

                                <?php if ($page == $totalPages) : ?>
                                    <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                <?php
                                else :
                                    $linkNext = ($page < $totalPages) ? $page + 1 : $totalPages;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= "?page=$linkNext&type=$type&q=$q" ?>">Next</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include 'includes/footer.php'; ?>