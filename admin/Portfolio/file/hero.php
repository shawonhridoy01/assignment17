
<section id="home-section" class="hero">
    <h3 class="vr">Welcome to DigiLab</h3>
    <div class="home-slider js-fullheight owl-carousel">
<?php

// This two get variable is from url link msg is from bannerUpdate.php and message is from bannerDelete.php 

// require "./config.php";
$selectQuery = "select * from banner where status = 1 limit 2";
$selectQueryResult = mysqli_query($conn, $selectQuery) or die("Sorry We can't retrive data due to some problem try after few minutes");
if (mysqli_num_rows($selectQueryResult) > 0) {
  while ($row = mysqli_fetch_assoc($selectQueryResult)) {
    


?>

      

<div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid p-0">
          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
            data-scrollax-parent="true">
            <div class="one-third order-md-last img js-fullheight"
              style="background-image:url(../assets/images/banner/<?php echo $row['image']; ?>)">
              <div class="overlay"></div>
            </div>
            <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
              data-scrollax=" properties: { translateY: '70%' }">
              <div class="text">
                <span class="subheading"><?php echo $row["title"] ?></span>
                <h1 class="mb-4 mt-3"><?php echo $row["sub_title"] ?></h1>
                <p><?php echo $row["details"] ?></p>
                <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Get in touch</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid p-0">
          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
            data-scrollax-parent="true">
            <div class="one-third order-md-last img js-fullheight"
              style="background-image:url(images/xbg_2.jpg.pagespeed.ic.suoronuwns.jpg)">
              <div class="overlay"></div>
            </div>
            <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
              data-scrollax=" properties: { translateY: '70%' }">
              <div class="text">
                <span class="subheading">Welcome to the digilab</span>
                <h1 class="mb-4 mt-3"><span>Strategic</span> Design And <span>Technology</span> Agency</h1>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                  paradisematic country.</p>
                <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Get in touch</a></p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

<?php  }} ?>
    
    </div>
  </section>