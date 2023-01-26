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
    <section class="section-arana-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-4" data-aos="zoom-in">
            <h1 class="title-header">We Help You Build Your Dream Projects.</h1>
            <p class="description-header">The right choice to make everything you need in realizing your Digital Products</p>
            <div class="btn-toolbar">
              <a href="https://wa.me/+6281806057343" target="_blank" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> Build Your Project Now </a>
            </div>
          </div>
          <div class="col-md-12 col-lg-8" data-aos="zoom-in">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-75 mx-auto" src="images/portfolio-banner-1.png" alt="First slide" />
                </div>
                <div class="carousel-item">
                  <img class="d-block w-75 mx-auto" src="images/portfolio-banner-1.png" alt="Second slide" />
                </div>
                <div class="carousel-item">
                  <img class="d-block w-75 mx-auto" src="images/portfolio-banner-1.png" alt="Third slide" />
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-products">
      <div class="container container-products">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center fw-bolder" style="color: #302a69;">
              Our Projects
            </h2>
            <p class="text-center">A preview of our recent projects.</p>
          </div>
        </div>
        <div class="row">
          <!-- fetch loop from database -->
          <?php
          $result = mysqli_query($connection, "SELECT * FROM works ORDER BY RAND() LIMIT 3");
          if (mysqli_num_rows($result)) {
            while ($item = mysqli_fetch_array($result)) {
          ?>
              <div class="col-6 col-md-4 col-sm-3 mt-2" data-aos="fade-up" data-aos-delay="100">
                <div class="justify-content-center d-flex">
                  <div class="card">
                    <img src="images/projects/<?= $item['image'] ?>" class="card-img-top" alt="Project Image" style="height: 400px; object-fit:contain">
                    <div class="card-body">
                      <!-- echo title column -->
                      <h5 class="card-title"><?= $item['title'] ?></h5>
                      <!-- echo desc column -->
                      <p class="card-text"><?= $item['description'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
          }
          ?>
        </div>
        <div class="row mt-4">
          <div class="btn-toolbar justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <a href="our-works.php" target="_blank" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> See Other Projects </a>
            <a href="https://wa.me/+6281806057343" target="_blank" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> Contact Us </a>
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