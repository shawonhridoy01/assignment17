<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center pb-5">
      <div class="col-md-6 heading-section text-center ftco-animate">
        <span class="subheading">About Us</span>
        <h2 class="mb-4">Our Staff</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    <div class="row">


    

      
        <div class="col-md-12 testimonial">
          <div class="carousel-project owl-carousel">
              
            <?php

// This two get variable is from url link msg is from bannerUpdate.php and message is from bannerDelete.php 




$selectQuery = "select staff.*, designations.designation_name from staff left join designations on staff.designation_id = designations.id ";
$selectQueryResult = mysqli_query($conn, $selectQuery) or die("Sorry We can't retrive data due to some problem try after few minutes");
if (mysqli_num_rows($selectQueryResult) > 0) {
while ($row = mysqli_fetch_assoc($selectQueryResult)) {


?>

              <div class="col-md-6 col-lg-3 ftco-animate">

                <div class="staff">
                  <div class="img-wrap d-flex align-items-stretch">
                    <div class="img align-self-stretch" style="background-image:url(./../assets/images/ourStaff/<?php echo $row['image']; ?>)">
                    </div>
                  </div>
                  <div class="text d-flex align-items-center pt-3 text-center">
                    <div>
                      <h3 class="mb-2"><?php echo $row["staff_name"] ?></h3>
                      <span class="position mb-4"><?php echo $row["designation_name"] ?></span>
                      <div class="faded">
                        <ul class="ftco-social text-center">
                          <li class="ftco-animate"><a href="<?php echo $row['twitter'] ?>"><span class="icon-twitter"></span></a></li>
                          <li class="ftco-animate"><a href="<?php echo $row['facebook'] ?>"><span class="icon-facebook"></span></a></li>
                          <li class="ftco-animate"><a href="<?php echo $row['linkedin'] ?>"><span class="icon-google-plus"></span></a></li>
                          <li class="ftco-animate"><a href="<?php echo $row['instagram'] ?>"><span class="icon-instagram"></span></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
          
              </div>
              <?php

}
}

?>
              </div>
              </div>


        
    
          </div>
          <!-- row  -->
        </div>
        <!-- container -->
</section>