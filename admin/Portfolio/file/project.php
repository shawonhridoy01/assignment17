<section class="ftco-section ftco-project bg-light" id="projects-section">
    <div class="container px-md-5">
      <div class="row justify-content-center pb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Accomplishments</span>
          <h2 class="mb-4">Our Projects</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row">

      <?php

      $selectQuery = "select our_projects.*, categories.categories_name from our_projects left join categories on our_projects.category_id = categories.id ";
      $selectQueryResult = mysqli_query($conn, $selectQuery) or die("Sorry We can't retrive data due to some problem try after few minutes");
      if (mysqli_num_rows($selectQueryResult) > 0) {

      ?>
        <div class="col-md-12 testimonial">
          <div class="carousel-project owl-carousel">

          <?php

// This two get variable is from url link msg is from bannerUpdate.php and message is from bannerDelete.php 

      
            while ($row = mysqli_fetch_assoc($selectQueryResult)) {
              

?> 

            <div class="item">
              <div class="project">
                <div class="img">
                  <img src="./../assets/images/projectThumb/<?php echo $row['image']; ?>" class="img-fluid"
                    alt="Colorlib Template">
                
                    
                  <div class="text px-4">
                    <h3><a href="<?php echo $row['project_link']; ?>"><?php echo $row['project_name']; ?></a></h3>
                    <span><?php echo $row['categories_name']; ?></span>
                  </div>
                </div>
              </div>
            </div>

<?php 

            }
          }

?>
            <!-- <div class="item">
              <div class="project">
                <div class="img">
                  <img src="images/xproject-2.jpg.pagespeed.ic.d_wlp1pl3f.jpg" class="img-fluid"
                    alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="#">Work Name</a></h3>
                    <span>Web Design</span>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="item">
              <div class="project">
                <div class="img">
                  <img src="images/xproject-3.jpg.pagespeed.ic.7xydadbmqc.jpg" class="img-fluid"
                    alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="#">Work Name</a></h3>
                    <span>Web Design</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="project">
                <div class="img">
                  <img src="images/xproject-4.jpg.pagespeed.ic.nyuprcadj0.jpg" class="img-fluid"
                    alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="#">Work Name</a></h3>
                    <span>Web Design</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="project">
                <div class="img">
                  <img src="images/project-5.jpg" class="img-fluid" alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="#">Work Name</a></h3>
                    <span>Web Design</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="project">
                <div class="img">
                  <img src="images/project-6.jpg" class="img-fluid" alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="#">Work Name</a></h3>
                    <span>Web Design</span>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>