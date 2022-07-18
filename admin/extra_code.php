<?php 

 $manuName = basename(__DIR__); ?>
            <li class=<?php echo $manuName == 'admin' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../': '';?>index.php"><i class="icon-home4"></i> <span>Dashboard me</span></a></li>
            
            <li class=<?php echo $manuName == 'banner' ? "active" : ''; ?> > <a href="<?php echo $isInternal == true ? '': 'banner/';?>bannerList.php"><i class="icon-image-compare"></i> <span>Banners</span></a></li>



