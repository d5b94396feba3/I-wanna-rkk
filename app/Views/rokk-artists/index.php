  
<style>

.hero {
    width: 100%;
    height: 100vh !important;
    margin-bottom: -85px;
    margin-left: 0;
    margin-right: 0;
    padding-top: 65px;
}
.hero .container .row {
    padding: 0 !important;
    margin: 0 !important;
}
.hero-sign-out {
    height: 67vh !important;
    padding-top: 65px;
    margin-bottom: -30px;
}
.hero h1 {
    font-size: 55px;
    font-weight: 400;
    color: #ff8303;
    text-transform: uppercase;
    font-family: "TitlingGothicFBComp-Medium", sans-serif;
}
.hero-sign-out h1 {
    padding-top: 22px;
    padding-bottom: 10px;
    font-size: 63px;
    font-weight: 400;
    color: #ff8303;
    text-transform: uppercase;
    font-family: "TitlingGothicFBComp-Medium", sans-serif;
    line-height: 22px;
}
.hero h2,
.hero-sign-out h2 {
    color: rgba(255, 255, 255, 0.81);
    margin: 0;
    font-size: 49px;
    font-family: "Poppins", sans-serif;
}
.hero-sign-out h2 {
    margin-top: -10px;
    margin-left: 4px;
}
.hero-sign-out .hero-sign-in-btn {
    margin-left: 5px;
}
.hero .hero-sign-in-btn,
.hero-sign-out .hero-sign-in-btn {
    margin-top: 30px;
    line-height: 0;
    padding: 15px 0;
    border-radius: 4px;
    transition: 0.5s;
    color: #fff;
    font-family: "Poppins", sans-serif;
}
.hero .hero-sign-in-btn span,
.hero-sign-out .hero-sign-in-btn span {
    font-weight: 500;
    font-size: 19px;
    letter-spacing: 1px;
}
.hero .hero-sign-in-btn i,
.hero-sign-out .hero-sign-in-btn i {
    margin-left: 5px;
    font-size: 18px;
    transition: 0.3s;
}
.hero .btn-party-info,
.hero-sign-out .btn-party-info {
    margin-top: 0;
    margin-bottom: -10px;
}
.hero .hero-sign-in-btn:hover,
.hero-sign-out .btn-party-info:hover {
    color: #ff8303;
}
.hero .hero-sign-in-btn:hover i,
.hero-sign-out .hero-sign-in-btn:hover i {
    transform: translateX(5px);
}
.hero .hero-img {
    text-align: right;
}
@media (min-width: 1024px) {
    .hero {
        background-attachment: fixed;
    }
}
@media (max-width: 991px) {
    .hero {
        height: auto;
        padding: 120px 0 60px;
    }
    .hero .hero-img {
        text-align: center;
        margin-top: 80px;
    }
    .hero .hero-img img {
        width: 80%;
    }
}
@media (max-width: 768px) {
    .hero,
    .hero-sign-out {
        text-align: center;
    }
    .hero h1,
    .hero-sign-out h1 {
        font-size: 32px;
    }
    .hero h2,
    .hero-sign-out h2 {
        font-size: 24px;
    }
    .hero .hero-img img {
        width: 100%;
    }
}
.hero .top-left-carousel {
    background: #282828;
    border: 4px solid #353535;
    border-radius: 15px;
    max-height: 493px;
    padding: 40px 35px;
    transition: background 0.3s ease, transform 0.3s ease;
    width: 985px;
}
.hero-sign-out .top-left-carousel {
    background: #282828;
    border: 4px solid #353535;
    border-radius: 15px;
    max-height: 493px;
    padding: 110px 90px;
    transition: background 0.3s ease, transform 0.3s ease;
    width: 100% !important;
}
.hero .top-left-carousel:hover {
    transform: translateY(-5px);
}
.hero .top-left-carousel:hover:before {
    opacity: 0.5;
}
.hero-sign-out .top-left-carousel:hover {
    transform: translateY(-5px);
}
.hero .top-left-carousel #carousel-top-teasers h5 {
    color: #ffffffcc;
    font-size: 46px;
    margin-bottom: 20px;
    font-family: "TitlingGothicFBComp-Medium", sans-serif;
    font-weight: 600;
    line-height: 55px;
    letter-spacing: 0.03em;
    text-align: left;
    text-transform: uppercase;
}
.hero .top-left-carousel #carousel-top-teasers p {
    color: #ffffff80;
    line-height: 26px;
    margin-top: 0;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
    font-family: "Poppins", sans-serif;
}
.hero .carousel-caption1 span {
    color: #ffffffcc;
}
.divider {
    border: 1px solid rgba(255, 255, 255, 0.1);
    width: 86%;
    display: flex;
    margin: 60px auto 47px auto;
}
#main {
    background: #111;
    background: linear-gradient(0deg, #111 100%, rgba(0, 0, 0, 0) 27.82%), linear-gradient(0deg, #0b0b0b, #080808);
    width: 94% !important;
    display: block;
    margin: 0 auto;
    z-index: 99999;
    padding-left: 0 !important;
    padding-right: 0 !important;
}
.selected-country {
    display: flex;
    align-items: center;
}
.selected-country img {
    margin-right: 5px;
    margin-left: 15px;
    height: 16px;
}

img#rokk-logo-indx {
    width: 300px;
    margin-top: -17px;
}
</style>



  <section id="hero" class="hero-sign-out d-flex align-items-center">

  <div class="container" >
  <div class="row" >
  <div class="col-lg-12 top-left-carousel">
  <h1>
    <img src="<?php echo base_url('assets/images/rokk-logo-white.png') ?>" alt="Rokk logo" id="rokk-logo-indx">

    Artist</h1><br>

    <?php

    if(isset($_SESSION['success-msg']))
    { ?>

      <div class="alert alert-success mt-4">
      <?php echo $_SESSION['success-msg'];

      unset($_SESSION['success-msg']);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>

      </div>

      <?php   }  ?>

      <?php

      if(isset($_SESSION['error-msg']))
      { ?>

      <div class="alert alert-danger">
      <?php echo $_SESSION['error-msg'];

      unset($_SESSION['error-msg']);
      ?>
      <span class="alert-close-icon" style="cursor: pointer;">&times;</span>

      </div>

    <?php   }  ?>

    <h2 style="font-size: 18px;">Sign In to your ROKK Artist account.</h2>
    <div>
      <div class="text-center text-lg-start">
        <a href="<?php echo base_url(); ?>Home/login" class="hero-sign-in-btn scrollto d-inline-flex align-items-center justify-content-center align-self-center">
          <span>Sign In</span>
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
    </div>
  </div>
  </div>

 </section>


<script>

//load css and custom select dropdown js


document.addEventListener("DOMContentLoaded", function() {


function loadCSS(e) {
    var t = document.createElement("link");
    (t.type = "text/css"), (t.rel = "stylesheet"), (t.href = e), document.head.appendChild(t);
}
loadCSS("<?php echo base_url('assets/src/new/vendor/aos/aos.css') ?>"),
    loadCSS("<?php echo base_url('assets/src/new/vendor/bootstrap-icons/bootstrap-icons.css') ?>"),
    loadCSS("<?php echo base_url('assets/src/new/vendor/remixicon/remixicon.css') ?>"),
    loadCSS("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i");
});


</script>
   