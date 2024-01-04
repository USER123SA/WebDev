<?php
session_start();
  extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/icon.png" rel="icon">
    <title>My Health</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>





<body >

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope"></i> <a href="mailto:myhealth@gmail.com">myhealth@gmail.com</a>
      <i class="bi bi-phone"></i> +216 23 189 557
    </div>
    <div class="d-none d-lg-flex social-links align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
  </div>
</div>


     <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">MyHealth</a></h1>
     

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#docteur/login.html">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
<?php

  extract($_POST);
mysql_connect('localhost','root','');
mysql_select_db('render_vousdb');


 
 // Vérifier si l'utilisateur est connecté en tant que patient ou médecin
if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'patient' || $_SESSION['user_type'] == 'medecin')) {
  // Si l'utilisateur est connecté, masquer les boutons de connexion
  echo ' <a href="patient/login.html" class="btnPatient scrollto" style="display: none;">Patient</a>
      <a href="docteur/login.html" class="btnDoctor scrollto" style="display: none;">Doctor</a> ';

      } else {
  // Si l'utilisateur n'est2 pas connecté, afficher les boutons de connexion
  echo '<a href="patient/login.html" class="btnPatient scrollto">Patient</a>
      <a href="docteur/login.html" class="btnDoctor scrollto" >Doctor</a> ';


  }

?>
    </div>
  </header>
      
     <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to MyHealth</h1>
      <h2>Empower your patients to book appointments.<br> Reduce back-and-forth calls and spend more time <br> providing care with MyHealth.</h2>
    </div>
  </section><!-- End Hero -->





     
    
     
      
      


      <section class="content" style="margin-top: 100px;">
        <div class="container my-5">
          <div class="row align-items-center">
            <div class="col">
              <h1 style="font-size: 60px;">What is MyHealyh</h1>
              <p style="font-size: 25px;">It is an arrangement to meet the doctor and patient at a particular time in the clinic.</p>
            </div>
            <div class="col">
              <img src="assets/img/gallery/gallery-1.jpg" alt="ok" height="450px" width="600px">
            </div>
          </div>
        </div>
      </section>
      
      <section class="content">
        <div class="container my-5">
          <div class="row align-items-center">
            <div class="col">
              <img src="assets/img/departments-3.jpg" alt="ok" height="450px" width="600px">
            </div>
            <div class="col" style="margin-left: 40px;">
              <h1 style="font-size: 60px;">why choose MyHealth?</h1>
              <p style="font-size: 25px;">Adopting an online clinic booking system increases patient loyalty and makes your practice more competitive. Online medical booking makes it fast and easy for patients to book appointments at the click of a button. You can set it all up in less than 15 minutes.</p>
            </div>
          </div>
        </div>
      </section>
      
      
      <section class="specialists-section">
        <div class="container">
        <div class="row align-items-center">
        <div class="col-12 col-lg-5 offset-lg-1 offset-md-0 offset-sm-0 offset-xs-0 order-md-2">
        <h2 tabindex="0">Life-changing expert medical advice</h2>
        <p tabindex="0">Get the confidence to move forward when you use our Medical Experts for advice on a diagnosis, treatment plan, or surgery.</p>
        <p><a class="link-arrow" href="" tabindex="0">Learn more about Medical Experts</a></p>
        </div>
        <div class="col-12 col-lg-5 order-md-1 text-center">
        <img tabindex="0" class="charts-image optanon-category-C0001" src="https://www.teladoc.com/wp-content/uploads/2019/10/charts.jpg" alt="Charts showing the following statistics: 45% of diagnoses modified, 39% surgeries avoided, 79% treatments modified">
        </div>
        </div>
        </div>
        
        <img class="specialists-image optanon-category-C0001" src="https://www.teladoc.com/wp-content/uploads/2019/10/specialists2.jpg" alt="A group of medical specialists reviewing diagnostics and medical records." aria-hidden="true">
        </section>

        <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->
      <footer id="footer">

        
    
        <div class="container d-md-flex py-4">
    
          <div class="me-md-auto text-center text-md-start" style="display: flex; align-items: center;">
            <div class="copyright">
              &copy; Copyright <strong><span>MyHealth</span></strong>. All Rights Reserved
            </div>
            <div style="display: inline-block; margin-left: 860px;">
              Need Help ? <a href="mailto:myhealth@gmail.com">Contact us</a>
            </div>
          </div>
          
          </div>
        </div>
      </footer><!-- End Footer -->
      
     
      
      <div id="preloader"></div>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      

       <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>