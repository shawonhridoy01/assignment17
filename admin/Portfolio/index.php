<?php 

require "./file/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php  include "file/cssFile.php"; ?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <?php  include "file/header.php"; ?>
  <?php  include "file/hero.php"; ?>
  <?php  include "file/service.php"; ?>
  <?php  include "file/project.php"; ?>
  



  <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">

      <div class="row d-flex">
        <div class="col-md-6 col-lg-5 d-flex">
          <div class="img d-flex align-self-stretch align-items-center"
            style="background-image:url(images/xabout.jpg.pagespeed.ic.ddph6amxc8.jpg)">
          </div>
        </div>
        <div class="col-md-6 col-lg-7 pl-lg-5 py-5">
          <div class="py-md-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Welcome to digilab</span>
                <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">We Are Digital Agency</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                  paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic
                  life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the
                  far World of Grammar.</p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                  paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              </div>
            </div>
            <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text p-4 bg-primary">
                <p class="mb-0">
                  <span class="number" data-number="20">0</span>
                  <span>Years of experience</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php  include "file/staff.php"; ?>
  <?php  include "file/testimonial.php"; ?>
  <?php  include "file/blog.php"; ?>
  <?php  include "file/contact.php"; ?>
  <?php  include "file/footer.php"; ?>
  <?php  include "file/script.php"; ?>







</body>

</html>