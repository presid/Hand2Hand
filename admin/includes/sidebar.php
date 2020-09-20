<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		
      <a class="navbar-brand mr-1" href="index.php?dashboard">Admin Area</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

     

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto mr-md-0">
       
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i> <?php echo $admin_name;?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
           <a class="dropdown-item" href="index.php?user_profile=<?php echo $admin_id;?>">
			 <i class="fa fa-fw fa-user"></i> Profile
			 
			</a>
		   <a class="dropdown-item" href="index.php?view_users">
			 <i class="fa fa-fw fa-users"></i> Users
			 <span class="badge"><?php echo $count_users;?></span>
			</a>
			<a class="dropdown-item" href="index.php?view_products">
			 <i class="fa fa-fw fa-envelope"></i> Products
			 <span class="badge"><?php echo $count_products;?></span>
			</a>
			<a class="dropdown-item" href="index.php?view_cats">
			 <i class="fa fa-fw fa-cogs"></i> Categories
			 <span class="badge"><?php echo $count_p_cat;?></span>
			</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" >
			 <i class="fa fa-fw fa-power-off"></i>
			Logout</a>
          </div>
        </li>
      </ul>

    </nav>
	<?php
	}
	?>