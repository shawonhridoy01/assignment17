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
							<h5 class="panel-title">My Project Link</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li class=<?php echo $baseUrl == 'our_projectsList' ? "active" :''; ?>> <a href="<?php echo $isInternal == true ? '' : 'our_projectsList/'; ?>our_projectsCreate.php" class="add_new">Add New</a></li>
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
											<th width=20%>Category Name</th>
											<th width=20%>Project Name</th>
											<th width=20%>Project Link</th>
											<th width=20%>Project Thumb</th>
											<th class="text-center" width=15%>Actions</th>
										</tr>

									</thead>
									<tbody>
                                    <?php
								
                                                    include "../includes/config.php";
													// categories_name 	status 	
													// id	category_id	project_name	project_link	project_thumb	
                                                    $our_projectsSelectQuery = "SELECT our_projects.*,categories.categories_name FROM our_projects INNER JOIN categories on our_projects.category_id = categories.id";
													// $our_projectsSelectQuery = "select * from our_projects where status = 1";

                                                    $our_projectsSelectQueryResult = mysqli_query($conn,$our_projectsSelectQuery) or die("stop query".mysqli_connect_error());
                                                    if(mysqli_num_rows($our_projectsSelectQueryResult) > 0){
                                                        $i = 1;
                                                        while($row = mysqli_fetch_assoc($our_projectsSelectQueryResult)){
                                                            
                                            ?>
											<tr>
		<!-- id	category_id	project_name	project_link	project_thumb	 -->
		<!-- d 	categories_name Ascending 1 	status 	 -->
												<td><?php echo $i++ ; ?></td>
												<td><?php echo $row["categories_name"] ; ?></td>
												<td><?php echo $row["project_name"] ; ?></td>
												<td><?php echo $row['project_link'];?></td>
												<td>
														<img src="../assets/images/projectThumb/<?php echo $row['image'];?>" width="60px" height="70px" alt="">
												</td>
										
											
												<td class="text-center">
													<a href="./our_projectsUpdate.php?our_projects_id=<?php echo $row['id'] ?>"><i class="icon-pencil7"></i></a>
													
													<a href="our_projectsDelete.php?our_projects_id=<?php echo $row['id'] ?>"><i class="icon-trash"></i></a>
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