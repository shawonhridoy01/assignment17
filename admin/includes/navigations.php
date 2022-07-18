
	
	<!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
							
								<li class=<?php echo $baseUrl == 'admin' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../': '';?>index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>


								<li class=<?php echo $baseUrl == 'banner' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'banner/';?>banners.php"><i class="icon-image-compare"></i> <span>Banners</span></a></li>
								
								<li class=<?php echo $baseUrl == 'services' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'services/';?>serviceList.php"><i class="icon-image-compare"></i> <span>Services</span></a></li>

								<li class=<?php echo $baseUrl == 'services' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'section/';?>sectionList.php"><i class="icon-image-compare"></i> <span>Sections</span></a></li>


								<li class=<?php echo $baseUrl == 'services' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'our_projects/';?>our_projectsList.php"><i class="icon-image-compare"></i> <span>Our Projects</span></a></li>

								<li><a href="#"><i class="icon-home4"></i> <span>Our Staffs</span></a></li>
								<li ><a href="#"><i class="icon-home4"></i> <span>Our Clients</span></a></li>								<li>
								<li ><a href="#"><i class="icon-home4"></i> <span>Contact Messages</span></a></li>								<li>
									<a href="#"><i class="icon-gear"></i> <span>Back Office Setup</span></a>
									<ul>
										<li><a href="#">Categories</a></li>
										<li class=<?php echo $baseUrl == 'designations' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'designations/';?>designationList.php"><i class="icon-image-compare"></i> <span>Designation</span></a></li>
										
									</ul>
								</li>
							
						
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Back Page Setting</span></a>
									<ul>
									
										<li>
											<a href="#">3 columns</a>
											<ul>
												<li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
												<li><a href="starters/3_col_double.html">Double sidebars</a></li>
											</ul>
										</li>
							
									</ul>
								</li>
							
								<!-- /main -->

								</li>
							</ul>
						</div>
    </div>
					<!-- /main navigation -->