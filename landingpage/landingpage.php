<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Public Health Disease Geomapping</title>
  <!-- <link rel="shortcut icon" href="https://img.icons8.com/office/16/null/longitude.png" type="image/x-icon"> -->
  <link rel="shortcut icon" href="../assets/img/caviteLogo.png" type="image/png">

  <!-- chart.js cdn -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- All CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" style='color:white' ; href="#"><span class="text-success">Public </span>Health <span class="text-warning">Disease </span>Geomapping</a>
    </div>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <<div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/phhome1.jpg" class="d-block w-100" alt="Public Health Disease Geomapping" />
        <div class="carousel-caption">
          <h5>Stay Informed</h5>
          <p>
            Get the latest updates on disease geomapping and its impact on communities.
          </p>
          <p><a href="#about" class="btn btn-warning mt-3">Learn More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/phhome2.jpg" class="d-block w-100" alt="Public Health Disease Geomapping" />
        <div class="carousel-caption">
          <h5>Dedicated to Public Health</h5>
          <p>
            Discover our commitment to ensuring public health through effective disease geomapping initiatives.
          </p>
          <p><a href="" class="btn btn-warning mt-3">Learn More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/phhome3.jpg" class="d-block w-100" alt="Public Health Disease Geomapping" />
        <div class="carousel-caption">
          <h5>Empowering Communities</h5>
          <p>
            Explore how disease geomapping empowers communities in preventing and addressing public health challenges.
          </p>
          <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
        </div>
      </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
  <!-- about section starts -->
  <section id="about" class="about section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>What is Geomapping?</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-12">
          <div class="about-img">
            <img src="img/geomapping.svg" alt="" class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <p>
              Geomapping is a powerful tool that can be used to track and control diseases. By overlaying data on a map, public health officials can identify areas where diseases are most prevalent and take steps to prevent the spread of disease.
              <br>
              <br>
              For example, geomapping can be used to track the spread of influenza. This information can be used to warn residents about areas where the virus is present and to take steps to prevent the spread of the virus.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about section Ends -->

  <!-- services section Starts -->
  <section class="services section-padding" id="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Data Visualizations</h2>
          </div>
        </div>
      </div>
      <!-- Bar Chart -->
      <div class="row my-4">
        <div class="col-md-8">
          <div class="card shadow">
            <div class="card-body">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="">
            <div class="card-body text-center">
              <h5 class="card-title">Bar Graph</h5>
              <p class="card-text">The number of disease cases reported each year is depicted in a bar graph. The vertical axis shows the number of disease cases, and the horizontal axis reflects the years under consideration. A vertical bar is used to represent each year, and its length reflects how many cases were reported during that particular year. The graph makes it simple to compare different years by clearly visualizing the annual fluctuations in disease incidence.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Pie Chart -->
      <div class="row my-4">
        <div class="col-md-6">
          <div class="">
            <div class="card-body text-center">
              <h5 class="card-title">Pie Chart</h5>
              <p class="card-text">The distribution of disease cases each year is shown in the pie chart. The size of each slice on the graph represents the percentage of disease cases that were reported in year 2022, and each slice represents a different municipality. The graph gives a clear picture of how the disease burden each municipality.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body">
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- services section Ends -->

  <!-- project strats -->
  <section id="project" class="project section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Heatmap</h2>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-8">
          <div class="">
            <div class="">
              <?php
              include('../components/googlemap.php');
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cavite Health Disease Heatmap</h5>
              <p class="card-text">A disease heatmap is a graphic that shows the severity or incidence of an illness across several geographic areas using color gradients. In general, larger illness rates or concentrations are represented by darker, warmer colors, whereas lower rates are depicted by lighter, cooler colors. The heatmap makes it simple and quick to locate hotspots with higher disease activity, which helps public health professionals better understand disease trends and carry out focused interventions.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- project ends -->
  <!-- team starts -->
  <!-- <section class="team section-padding" id="team">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Our Team</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body">
              <img src="img/team-1.jpg" alt="" class="img-fluid rounded-circle" />
              <h3 class="card-title py-2">Jack Wilson</h3>
              <p class="card-text">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sequi ipsam nostrum illo tempora esse quibusdam.
              </p>

              <p class="socials">
                <i class="bi bi-facebook text-dark mx-1"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body">
              <img src="img/team-2.jpg" alt="" class="img-fluid rounded-circle" />
              <h3 class="card-title py-2">Jack Wilson</h3>
              <p class="card-text">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sequi ipsam nostrum illo tempora esse quibusdam.
              </p>
              <p class="socials">
                <i class="bi bi-facebook text-dark mx-1"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body">
              <img src="img/team-3.jpg" alt="" class="img-fluid rounded-circle" />
              <h3 class="card-title py-2">Jack Wilson</h3>
              <p class="card-text">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sequi ipsam nostrum illo tempora esse quibusdam.
              </p>
              <p class="socials">
                <i class="bi bi-facebook text-dark mx-1"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- about section starts -->
  <section id="about" class="about section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-12">
          <div class="about-img">
            <img src="img/phabout.jpg" alt="" class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <p>
              Our Public Health Disease Geomapping website is a detailed online resource made to offer engaging and educational representations of disease data on maps of Cavite. For information on the geographic distribution of diseases and their effects on various locations, public health authorities, researchers, and the general public can all benefit from visiting our website.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about section Ends -->
  <!-- footer starts -->
  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">Copyright © Public Health Disease Geo mapping 2023</p>
    </div>
  </footer>
  <!-- footer ends -->

  <!-- All Js -->
  <?php
  include('js/chart.php')
  ?>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>

<!--for getting the form download the code from download button-->