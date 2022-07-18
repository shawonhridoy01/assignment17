<?php

include "../includes/config.php";
if (basename(__DIR__)  != "admin") {
	$isInternal = true;
	$baseUrl = "../";
} else {
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
							<h5 class="panel-title">Banner Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">

							</div>
						</div>
						<!-- Basic examples -->
						<div class="panel panel-flat">
							<div class="panel-body">

								<?php
								if (isset($_GET["banner_id"])) {
									$id = $_GET["banner_id"];

									$dataFetch = "SELECT * from banner where id ='{$id}'";
									$dataFetch_query = mysqli_query($conn, $dataFetch) or die("fetch failed");

									while ($row = mysqli_fetch_assoc($dataFetch_query)) {


								?>

										<!-- form start  -->
										<form class="form-horizontal" method="POST" action="bannerUpdateController.php" enctype="multipart/form-data">
											<fieldset class="content-group mt-10">

												<div class="form-group">
													<!-- <label class="control-label col-lg-2" for="title">Id</label> -->
													<div class="col-lg-10">
														<input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id']; ?>">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-2" for="title">Title</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title']; ?>">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-2" for="sub_title">Sub Title</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo  $row['sub_title']; ?>">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-lg-2" for="details">Description</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" id="details" name="details" value="<?php echo  $row['details']; ?>">
													</div>
												</div>



												<!--   Image                              input               -->
												<div class="form-group">
													<label class="col-lg-2                      control-label                                                  text-semibold">Image</label>
													<div class="col-lg-10">
														<input type="file" name="image" class="file-input-extensions">
														<span class="help-block">Allow extensions : <code>jpg</code>, <code>png</code> and <code>jpeg</code> and Allow Size: <code>640 * 426</code> Only</span>
														<div class="file-preview">
															<div class="close                         fileinput-remove                                               text-right">×</div>
															<div class="file-preview-thumbnails">
																<div class="file-preview-frame" id="preview-1656524947587-0">
																	<img src="../assets/images/banner/<?php echo                                                           $row['image'];                             ?>" class="file-preview-image" title="" alt="" style="width: auto;height: 160px;">
																</div>
															</div>
															<div class="clearfix"></div>
															<div class="file-preview-status           text-center                                                    text-success"></div>
															<div class="kv-fileinput-error            file-error-message" style="display                                                                                         :                          none;"></div>
														</div>


													</div>

												</div>

												<!--   Image                              input               -->


											</fieldset>
											<div class="text-right">
												<a href="./bannerCreate.php" class="back_btn">Back to List</a>
												<input type="submit" value="Update Data" class="submit_btn" style="background-color: purple !important;" name="update_btn">

											</div>
										</form>
								<?php 	}
								} ?>


								<!-- form end -->

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