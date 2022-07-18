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
							<h5 class="panel-title">Staff List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li class=<?php echo $baseUrl == 'staffList' ? "active" :''; ?>> <a href="<?php echo $isInternal == true ? '' : 'staffList/'; ?>staffCreate.php" class="add_new">Add New</a></li>

							</div>
						</div>

						<div class="panel-body" style="margin-top: 20px;">
		
						<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<?php 
								if(isset($_GET["message"])){
									$id = $_GET['message'];
									
									echo '<strong>'.$_GET['message'].'!</strong>';
								}
								
								?>
								</div>
							
								<table class="table datatable-basic table-bordered">
									<thead>
                            
										<tr>


											<th width=5%>S.No</th>
											<th width=15%>Staff Name</th>
											<th width=15%>Staff Designation</th>
											<th width=15%>Staff Image</th>
											<th width=10%>Twitter</th>
											<th width=10%>Facebook</th>
											<th width=10%>Linkedin</th>
											<th width=10%>Instagram</th>

											<th class="text-center" width=20%>Actions</th>
										</tr>

									</thead>
									<tbody>
                                    <?php
									// designations
									// staff
                                                    include "../includes/config.php";
                                                    $staffSelectQuery = "SELECT staff.*,designations.designation_name FROM staff INNER JOIN designations on staff.designation_id = designations.id ";

                                                    $staffSelectQueryResult = mysqli_query($conn,$staffSelectQuery) or die("stop query").mysqli_connect_error($staffSelectQuery);
                                                    if(mysqli_num_rows($staffSelectQueryResult) > 0){
                                                        $i = 1;
                                                        while($row = mysqli_fetch_assoc($staffSelectQueryResult)){
                                                            
                                            ?>
											<tr>
	
												<td><?php echo $i++ ; ?></td>
												<td><?php echo $row["staff_name"] ; ?></td>
												<td><?php echo $row["designation_name"] ; ?></td>
												<td>
													<img src="../assets/images/ourStaff/<?php echo $row['image'];?>" width="70px" height="80px" alt="">
												</td>
												<td><a href="<?php echo $row['facebook'];?>"> <i class="fa-brands fa-facebook"> </i></a></td>
												<td><a href="<?php echo $row['twitter'];?>"> <i class="fa-brands fa-twitter"> </i></a></td>
												<td><a href="<?php echo $row['linkedin'];?>"> <i class="fa-brands fa-linkedin"> </i></a></td>
												<td><a href="<?php echo $row['instagram'];?>"> <i class="fa-brands fa-instagram"> </i></a></td>
											
												<td class="text-center">
													<a href="./staffUpdate.php?staff_id=<?php echo $row['id'] ?>"><i class="icon-pencil7"></i></a>
													
													<a href="staffDelete.php?staff_id=<?php echo $row['id'] ?>"><i class="icon-trash"></i></a>
												</td>
											</tr>
                                    <?php                 
                                                        }
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