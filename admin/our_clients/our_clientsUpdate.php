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
							<h5 class="panel-title">Update Clients Information</h5>
							<div class="heading-elements">
								<ul class="icons-list">

							</div>
						</div>
						<!-- Basic examples -->
						<div class="panel panel-flat">
							<div class="panel-body">

								<?php
								include "../includes/config.php";
								if (isset($_GET["our_clients_id"])) {
									$id =  $_GET["our_clients_id"];
								} else {
									header("location:our_clientsList.php");
								}
								$fetchQuery = "select * from our_clients where id = '{$id}'";
								$fetchQueryResult = mysqli_query($conn, $fetchQuery);
								if (mysqli_num_rows($fetchQueryResult) > 0) {
									while ($row = mysqli_fetch_assoc($fetchQueryResult)) {



								?>
										<!-- form start  -->

										<form class="form-horizontal" method="POST" action="./updateour_clientsData.php" enctype="multipart/form-data">
											<fieldset class="content-group mt-10">


												<div class="form-group">

													<div class="col-lg-10">
														<input type="hidden" class="form-control" name="our_clients_id" id="our_clients_id" value="<?php echo $row['id']; ?>">
													</div>
												</div>


												<div class="form-group">
													<label class="control-label col-lg-2" for="clients_name">Clients Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="clients_name" id="clients_name" value="<?php echo $row['clients_name']; ?>">
													</div>
												</div>





												<div class="form-group">
													<label class="control-label col-lg-2" for="our_clients_designation">Clients Designation</label>
													<div class="col-lg-10">

														<select name="our_clients_designation" id="our_clients_designation" class="form-control">

															<?php
															include "../includes/config.php";

															$selectDesignationQuery = "SELECT * FROM designations WHERE status = 1";
															$selectDesignationQueryResult = mysqli_query($conn, $selectDesignationQuery);
															if (mysqli_num_rows($selectDesignationQueryResult) > 0) {
																while ($row1 = mysqli_fetch_assoc($selectDesignationQueryResult)) {
																	$id = $row1['id'];
																	echo "
                                                                <option value = '$id' >{$row1['designation_name']}</option>
                                                                
                                                                ";
																}
															}

															?>
														</select>
													</div>
												</div>


											

												<!--   Image                              input               -->
												<div class="form-group">
													<label class="col-lg-2             control-label                                                  text-semibold">Image</label>
													<div class="col-lg-10">
														<input type="file" name="image" class="file-input-extensions">
														<span class="help-block">Allow extensions : <code>jpg</code>, <code>png</code> and <code>jpeg</code> and Allow Size: <code>640 * 426</code> Only</span>
														<div class="file-preview">
															<div class="close                         fileinput-remove                                               text-right">×</div>
															<div class="file-preview-thumbnails">
																<div class="file-preview-frame" id="preview-1656524947587-0">
																	<img src="../assets/images/clients/<?php echo                                                           $row['image'];                             ?>" class="file-preview-image" title="" alt="" style="width: auto;height: 160px;">
																</div>
															</div>
															<div class="clearfix"></div>
															<div class="file-preview-status           text-center                                                    text-success"></div>
															<div class="kv-fileinput-error            file-error-message" style="display                                                                                         :                          none;"></div>
														</div>


													</div>

												</div>

												<!--   Image     input               -->


												<div class="form-group">
													<label class="control-label col-lg-2" for="client_review">Client Review</label>
													<div class="col-lg-10">

														<textarea name="client_review" id="client_review" cols="10" rows="10" class="form-control" placeholder="Type Your Opinion..." value=" "><?php echo $row['client_review'] ?></textarea>
													</div>
												</div>



											</fieldset>

											<div class="text-right">
												<a href="./our_clientsList.php" class="back_btn">Back to List</a>
												<button type="submit" class="submit_btn" name="our_clients-update">Update Clients Review </button>
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