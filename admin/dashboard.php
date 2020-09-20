<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>

<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
	
	</div>
</div>
<!-- Icon Cards-->
  <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-tasks"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_products;?> Products!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?view_product">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_users;?> Users!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?view_users">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-cogs"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_p_cat;?> Categories!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?view_cat">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-fire"></i>
                  </div>
                  <div class="mr-5"><?php echo $count_hot_pro;?> Hot Deals!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="index.php?view_Hot">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
		  
		 
		<div class="container">
		
			<div class="row profile ">
				<div class="col-md-3 ml-auto">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="admin_imgs/<?php echo $admin_image;?>" class="img-responsive" alt="">
				</div>
				
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h2><?php echo $admin_name;?></h2>
					</div>
					<div class="profile-usertitle-name">
						<p><?php echo $admin_about;?></p>
					</div>
					<div class="profile-usertitle-name">
					    <i class="fa fa-phone"></i><span> Contact:</span>
						<?php echo $admin_contact;?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				
			</div>
		</div>
			
			
			</div>
		</div>
	<?php }?>