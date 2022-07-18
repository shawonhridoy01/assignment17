<?php 



?>


<!DOCTYPE html>
<html lang="en">

<?php

if (basename(__DIR__)  != "admin") {
	$isInternal = true;
	$baseUrl = "../";
} else {
	$isInternal = false;
	$baseUrl = "";
}



?>
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
							<h5 class="panel-title">Banner List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li class=<?php echo $baseUrl == 'banner' ? 'active' : ''; ?>> <a href="<?php echo $isInternal == true ? '' : 'banner/'; ?>bannerCreate.php" class="add_new">Add New</a></li>
							</div>
						</div>

						<div class="panel-body mb-4" style="margin-top:20px">
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<?php 
								if(isset($_GET["msg"])){
									$id = $_GET['msg'];
									
									echo '<strong>'.$_GET['msg'].'!</strong>';
								}
								
								?>
								</div>
							
								
							




							<?php

							// This two get variable is from url link msg is from bannerUpdate.php and message is from bannerDelete.php 



							include "../includes/config.php";
							$selectQuery = "select * from banner where status = 1 ";
							$selectQueryResult = mysqli_query($conn, $selectQuery) or die("Sorry We can't retrive data due to some problem try after few minutes");
							if (mysqli_num_rows($selectQueryResult) > 0) {




							?>


								<table class="table datatable-basic table-bordered">
									<thead>

										<tr>
											<th width="5%">S.No</th>
											<th width="15%">Title</th>
											<th width="20%">Sub Title</th>
											<th width="20%">Description</th>
											<th width="10%">Image</th>

											<th class="text-center" width="15%">Actions</th>
										</tr>

									</thead>
									<tbody>
										<?php
										$i = 1;
										while ($row = mysqli_fetch_assoc($selectQueryResult)) {

										?>
											<tr>
												<td><?php echo $i++ ?></td>
												<td><a href="#"><?php echo $row["title"] ?></a></td>
												<td><?php echo $row["sub_title"] ?></td>
												<td width="20%"> <?php echo $row["details"] ?></td>
												<td>
													<img src="../assets/images/banner/<?php echo $row['image']; ?>" style="max-width:50px;height:50px;" alt="">

												</td>
												<td class="text-center">
													<a href="bannerUpdate.php?banner_id=<?php echo $row['id']; ?>"><i class="icon-pencil7"></i></a>

													<a href="bannerDelete.php?banner_id=<?php echo $row['id']; ?>"><i class="icon-trash"></i></a>
												</td>
											</tr>
									<?php }
									} else {
										echo "<tr>
										<td collspan=4'>Data Not Found</td>
								</tr>";
									} ?>
									</tbody>
								</table>

						</div>
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