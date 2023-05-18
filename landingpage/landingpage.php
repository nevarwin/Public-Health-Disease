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
          <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/phhome2.jpg" class="d-block w-100" alt="Public Health Disease Geomapping" />
        <div class="carousel-caption">
          <h5>Dedicated to Public Health</h5>
          <p>
            Discover our commitment to ensuring public health through effective disease geomapping initiatives.
          </p>
          <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
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
        <div class="col-lg-4 col-md-12 col-12">
          <div class="about-img">
            <img src="img/phabout.jpg" alt="" class="img-fluid" />
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
          <div class="about-text">
            <h2>
              We Provide the Best Quality <br />
              Services Ever
            </h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam,
              labore reiciendis. Assumenda eos quod animi! Soluta nesciunt
              inventore dolores excepturi provident, culpa beatae tempora,
              explicabo corporis quibusdam corrupti. Autem, quaerat. Assumenda
              quo aliquam vel, nostrum explicabo ipsum dolor, ipsa perferendis
              porro doloribus obcaecati placeat natus iste odio est non earum?
            </p>
            <a href="#" class="btn btn-warning">Learn More</a>
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
            <h2>Our Services</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur <br />adipisicing elit.
              Non, quo.
            </p>
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
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lorem Ipsum</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem ligula, gravida vitae sodales ut, gravida in quam.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Pie Chart -->
      <div class="row my-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title">Lorem Ipsum</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem ligula, gravida vitae sodales ut, gravida in quam.</p>
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
            <h2>Our Projects</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur <br />adipisicing elit.
              Non, quo.
            </p>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body col-md-8">
              <?php
              include('../components/googlemap.php');
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lorem Ipsum</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lorem ligula, gravida vitae sodales ut, gravida in quam.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- project ends -->
  <!-- team starts -->
  <section class="team section-padding" id="team">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Our Team</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur <br />adipisicing elit.
              Non, quo.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
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
                <i class="bi bi-twitter text-dark mx-1"></i>
                <i class="bi bi-facebook text-dark mx-1"></i>
                <i class="bi bi-linkedin text-dark mx-1"></i>
                <i class="bi bi-instagram text-dark mx-1"></i>
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
                <i class="bi bi-twitter text-dark mx-1"></i>
                <i class="bi bi-facebook text-dark mx-1"></i>
                <i class="bi bi-linkedin text-dark mx-1"></i>
                <i class="bi bi-instagram text-dark mx-1"></i>
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
                <i class="bi bi-twitter text-dark mx-1"></i>
                <i class="bi bi-facebook text-dark mx-1"></i>
                <i class="bi bi-linkedin text-dark mx-1"></i>
                <i class="bi bi-instagram text-dark mx-1"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card text-center">
            <div class="card-body">
              <img src="img/team-4.jpg" alt="" class="img-fluid rounded-circle" />
              <h3 class="card-title py-2">Jack Wilson</h3>
              <p class="card-text">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Sequi ipsam nostrum illo tempora esse quibusdam.
              </p>
              <p class="socials">
                <i class="bi bi-twitter text-dark mx-1"></i>
                <i class="bi bi-facebook text-dark mx-1"></i>
                <i class="bi bi-linkedin text-dark mx-1"></i>
                <i class="bi bi-instagram text-dark mx-1"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- team ends -->
  <!-- Contact starts -->
  <section id="contact" class="contact section-padding">
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Contact Us</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur <br />adipisicing elit.
              Non, quo.
            </p>
          </div>
        </div>
      </div>
      <div class="row m-0">
        <div class="col-md-12 p-0 pt-4 pb-4">
          <form action="#" class="bg-light p-4 m-auto">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <input class="form-control" placeholder="Full Name" required="" type="text" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <input class="form-control" placeholder="Email" required="" type="email" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <textarea class="form-control" placeholder="Message" required="" rows="3"></textarea>
                </div>
              </div>
              <button class="btn btn-warning btn-lg btn-block mt-3" type="button">
                Send Now
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- contact ends -->
  <!-- footer starts -->
  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-white">All Right Reserved By @website Name</p>
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