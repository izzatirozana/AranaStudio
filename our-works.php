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
  <link href="style/custom.css" rel="stylesheet" />
</head>

<body>
  <?php include("config/connection.php"); ?>
  <?php include("includes/navbar.php"); ?>

  <!-- Page Content -->
  <div class="page-content page-home">

    <section class="section-products" data-aos="zoom-in">
      <div class="container container-products">
        <!-- Title -->
        <div class="row">
          <div class="col-12">
            <h2 class="text-center fw-bolder" style="color: #302a69;">
              Our Projects
            </h2>
            <p class="text-center">An overview of projects done by Aranastudio over the years.</p>
          </div>
        </div>

        <!-- Project cards -->
        <div class="row mt-3">
          <!-- Loop fetch data from database -->
          <?php
          $result = mysqli_query($connection, "SELECT * FROM works");
          if (mysqli_num_rows($result)) {
            while ($item = mysqli_fetch_array($result)) {
          ?>
              <div class="col-6 col-md-4 col-sm-3 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="justify-content-center d-flex">
                  <div class="card">
                    <img src="images/projects/<?= $item['image'] ?>" class="card-img-top" alt="Project Image" style="height: 400px; object-fit:contain">
                    <div class="card-body">
                      <!-- echo title column -->
                      <h5 class="card-title fst-italic fw-bold"><?= $item['title'] ?></h5>
                      <!-- echo desc column -->
                      <p class="card-text"><?= $item['description'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          } //else { 
          //} 
          ?>
        </div>
      </div>
  </div>
  </section>
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