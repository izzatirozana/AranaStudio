<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Aranastudio - Your Dream Project</title>

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="dist/main.css" rel="stylesheet" />
  <link href="dist/bootstrap.css" rel="stylesheet" />
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="container">
    <div class="card mb-5" style="margin-top: 130px; color: #302a69;">
      <img src="images/header.jpg" class="card-img" alt="header" width="500" height="600" style="opacity: 15%; position: relative" />
      <div class="card-img-overlay">
        <div class="card-body">
          <div class="text-center">
            <h1 class="display-4 fw-bold">ABOUT US</h1>
          </div>
          <?php
          include("config/connection.php");

          $id = $_GET['id'];

          $query = mysqli_query($connection, "SELECT * FROM about_us WHERE id = '$id'");
          while ($item = mysqli_fetch_array($query)) {
          ?>
            <form method="POST" action="admin/edit_about.php">
              <input type="hidden" name="id" id="id" value="<?php echo $item['id']; ?>">
              <div class="form-group">
                <label>Title</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $item['title'] ?>" required>
              </div>
              <div class="form-group">
                <label>Text</label>
                <textarea type="text" id="desc" name="desc" class="form-control" rows="8" required>
                  <?= $item['desc'] ?>
              </textarea>
              </div>
              <div class="btn-toolbar justify-content-center mt-4">
                <button type="submit" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> Save Changes </button>
              </div>
            </form>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php include("includes/footer.php") ?>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.slim.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="/script/navbar-scroll.js"></script>
</body>

</html>