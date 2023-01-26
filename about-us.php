<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Aranastudio - Your Dream Project</title>

  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="dist/main.css" rel="stylesheet" />
  <link href="dist/bootstrap.css" rel="stylesheet" />
</head>

<body>
  <?php include("config/connection.php"); ?>
  <?php include("includes/navbar.php"); ?>
  <?php
  $arana = $history = '';
  $arana = "Aranastudio is a freelance IT development team based in Depok, Indonesia. We are committed to realize innovations and ideas into various digital products towards an integrated future.
  Our team have almost 5 years of experience working as a freelance software developer. Over the years we grow our team to keep up with demands from the industry, so we could help our clients to grow their businesses.
  With all that the future of IT has to offer, Aranastudio is ready to help you realize your needs. Established in March 2018, Aranastudio is a freelance IT development company found by three buddies of students of Politeknik Negeri Jakarta's Faculty of Information and Technology,
  Ari Ramandana (28), Dwi Kusuma Ramayana (27), and Dagda Humaira Jahza (28) who graduated in 2016. Aranastudio was started simply as a team of freelancers grouped together to be able
  to accomplish more as one. After accomplishing many projects as Aranastudio, Ari decided to make Aranastudio a bigger team, and started recruitments for new developers to add to the team.
  Today, Aranastudio is composed of 30 employees, working as freelancers to help each other as a team to help people get projects done faster as more efficient.";
  ?>
  <!-- Page Content -->

  <div class="container">
    <div class="card mb-5" style="margin-top: 130px; color: #302a69;">
      <img src="images/header.jpg" class="card-img" alt="header" width="500" height="600" style="opacity: 15%; position: relative" />
      <div class="card-img-overlay">
        <div class="card-body">
          <div class="text-center">
            <h1 class="display-4 fw-bold">ABOUT US</h1>
          </div>
          <?php
          $result = mysqli_query($connection, "SELECT * FROM about_us") or die("Query error : " . mysqli_error($connection));;
          $item = mysqli_fetch_array($result);
          ?>
          <div class="mb-3">
            <h4 class="card-title mb-3"><?= $item["title"]; ?></h4>
            <p class="card-text">
              <?= $item["desc"]; ?>
            </p>
          </div>
        </div>
        <?php

        if (isset($_SESSION["login"])) {
          echo '<div class="btn-toolbar justify-content-center mt-2">
          <a href="about-us-edit.php?id=' . $item["id"] . '" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> Edit About Us </a>
        </div>';
        } else {
          echo '<div class="btn-toolbar justify-content-center mt-2">
          <a href="https://wa.me/+6281806057343" target="_blank" class="btn btn-warning d-lg-block px-3 text-white mr-xl-4"> Contact Us </a>
        </div>';
        }
        ?>
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