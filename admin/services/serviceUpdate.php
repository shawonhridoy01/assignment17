<?php 

include "../includes/config.php";
if(basename(__DIR__)  != "admin" ){
	$isInternal = true;
	$baseUrl = "../";
}else{
	$isInternal = false;
	$baseUrl = "";
}

?>



<!DOCTYPE html>
<html lang="en">

<?php include "../includes/head.php" ?>

<body>

	<!-- Main navbar -->
	<?php include "../includes/mainNav.php"; ?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<?php include "../includes/navigations.php"; ?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="datatable_basic.html">Datatables</a></li>
							<li class="active">Basic</li>
						</ul>

				
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Service List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                	
		                	</div>
						</div>
										<!-- Basic examples -->
							<div class="panel panel-flat">
							<div class="panel-body">

                                <?php
                                    include "../includes/config.php";
                                    if(isset($_GET["service_id"])){
                                        $id =  $_GET["service_id"];
                                    }else{
                                        header("location:serviceList.php");
                                    }
                                    $fetchQuery = "select * from services where id = '{$id}'";
                                    $fetchQueryResult = mysqli_query($conn,$fetchQuery);
                                    if(mysqli_num_rows($fetchQueryResult) > 0){
                                        while($row = mysqli_fetch_assoc($fetchQueryResult)){

                            
                                ?>
								<!-- form start  -->
			
                                <form class="form-horizontal" method="POST" action="updateServiceData.php">
                                    <fieldset class="content-group mt-10">



                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="service_id">ID No</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="services_id" id="services_id" value="<?php echo $row['id'] ?>">
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="control-label col-lg-2" for="service_name">Service Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="service_name" id="service_name" value="<?php echo $row['service_name'] ?>">
                                            </div>
                                        </div>
                                        <!-- id 	service_name 	service_details 	icon_name 	design_status 	 -->

                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="service_details">Service Details</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="service_details" id="service_details" value="<?php echo $row['service_details'] ?>">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="icon_name">Icon Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="icon_name" id="icon_name" value="<?php echo $row['icon_name'] ?>">
                                            </div>
                                        </div>


                                    </fieldset>

                                    <div class="text-right">
                                        <a href="./bannerCreate.php" class="back_btn">Back to List</a>
                                        <button type="submit" class="submit_btn" name="service-update">Update Service </button>
                                    </div>
                                </form>
								<!-- form end -->
								<?php 
                                 }
                                    } ?>
							</div>
						</div>
						<!-- /basic examples -->
					</div>
					<!-- /pagination types -->


				

			

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<?php include "../includes/footer.php" ?>
</body>
</html>
