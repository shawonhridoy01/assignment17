<!DOCTYPE html>
<html lang="en">

<?php



include "../includes/cssLink.php";
include "../includes/head.php";




?>

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
                            <h5 class="panel-title">Create New Project</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <!-- <li><a href="./add_banner.php" class="add_new">Add New</a></li> -->

                            </div>
                        </div>

                        <!-- Basic examples -->
                        <div class="panel panel-flat">

                            <div class="panel-body">

                                <!-- form start  -->


                                <form class="form-horizontal" method="POST" action="./addour_projects.php" enctype ="multipart/form-data">
                                    <fieldset class="content-group mt-10">



                                    


                            
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="category_id">Category</label>
                                            <div class="col-lg-10">
                                
                                                <select name="category_id" id="category_id" class="form-control" >
                                                    <option value="Select Category">Select Category</option>
                                                    <?php 
                                                        include "../includes/config.php";

                                                        $selectCategoryQuery = "SELECT * FROM categories WHERE status = 1";
                                                        $selectCategoryQueryResult = mysqli_query($conn,$selectCategoryQuery);
                                                        if(mysqli_num_rows($selectCategoryQueryResult) > 0){
                                                            while($row1 = mysqli_fetch_assoc($selectCategoryQueryResult)){
                                                                $id = $row1['id'] ;
                                                                echo "<option value = '$id'> {$row1['categories_name']}</option>";
                                                            
                                                            }
                                                        }    
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="project_name">Project Name</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="project_name" id="project_name" required>
                                            </div>
                                        </div>




                                        

                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="project_link">Project Link</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="project_link" id="project_link" required>
                                            </div>
                                        </div>



                                        
										<!-- Image input -->
										
										<div class="form-group">
										<label class="col-lg-2 control-label text-semibold" for="image" >Image</label>
										<div class="col-lg-10">
											<input type="file" name="image" class="file-input-extensions" name="image"  id="image">
											<span class="help-block">Allow extensions: <code>jpg</code>, <code>png</code> and <code>jpeg</code> and  Allow Size: <code>640 * 426</code> Only</span>
										</div>

										<!-- /Image input -->

                                    

                                    </fieldset>

                                    <div class="text-right">
                                        <a href="./our_clientsList.php" class="back_btn">Back to List</a>
                                        <button type="submit" class="submit_btn" name="our_projects-save">Add New Review </button>
                                    </div>
                                </form>
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