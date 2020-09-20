
<?php
	session_start();
	include("includes/dbConfig.php");
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else {
		
		$admin_session = $_SESSION['admin_email'];
		
		$get_admin = "select * from admins where admin_email='$admin_session'";
		$run_admin = mysqli_query($db,$get_admin);
		$row_admin = mysqli_fetch_array($run_admin);
		$admin_id = $row_admin['admin_id'];
		$admin_name = $row_admin['admin_name'];
		$admin_image = $row_admin['admin_image'];
		$admin_about = $row_admin['admin_about'];
		$admin_contact = $row_admin['admin_contact'];
		$get_products = "select * from products";
		$run_products = mysqli_query($db,$get_products);
		$count_products = mysqli_num_rows($run_products);
		$get_users = "select * from users";
		$run_users = mysqli_query($db,$get_users);
		$count_users = mysqli_num_rows($run_users);
		$get_p_cat = "select * from categories";
		$run_p_cat = mysqli_query($db,$get_p_cat);
		$count_p_cat = mysqli_num_rows($run_p_cat);
		$get_hot_pro = "select * from hot_deals";
		$run_hot_pro = mysqli_query($db,$get_hot_pro);
		$count_hot_pro = mysqli_num_rows($run_hot_pro);
		}
		
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin_Area</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
<?php include("includes/sidebar.php");?>
<body id="page-top">

<div id="wrapper">
	
	<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-tag"></i>
            <span>Products</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <h6 class="dropdown-header">Products:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?inserting_products">Insert Products</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_product">View Products</a>
            
          </div>
        </li>
		
		  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="p_catDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-edit"></i>
            <span>Categories</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="p_catDropdown">
            <h6 class="dropdown-header">Categories:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?insert_cat">Insert Category</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_cat">View Categories</a>
            
          </div>
        </li>
		
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="slides" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Slides</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="slides">
            <h6 class="dropdown-header">Slides:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?insert_slide">Insert Slide</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_slides">View Slides</a>
            
          </div>
        </li>
        
        
		
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hot_deals" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-fire"></i>
             <span>Hot Deals</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="slides">
            <h6 class="dropdown-header">Hot deals Products:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?insert_Hot">Insert Hot Deal</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_Hot">View Hot Deals</a>
            
          </div>
        </li>
		
			 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hot_deals" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
             <span> Users</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="slides">
            <h6 class="dropdown-header">Users:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?insert_user">Insert Users</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_users">View Users</a>
           
          </div>
        </li>
		
		<div class="dropdown-divider"></div>
		 <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="hot_deals" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
             <span> Admins</span>
          </a>
		  
          <div class="dropdown-menu" aria-labelledby="slides">
            <h6 class="dropdown-header">Admins:</h6>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?add_admin">Add Admin</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?view_admins">View Admins</a>
            <div class="dropdown-divider"></div>
			<a class="dropdown-item" href="index.php?user_profile=<?php echo $admin_id;?>">Edit Admin Profile</a>
          </div>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
        
           <?php 
			if(isset($_GET['dashboard'])){
			  
				include("dashboard.php");
		   } 
		   if(isset($_GET['inserting_products'])){
			  
				include("inserting_products.php");
		   } 
		   if(isset($_GET['view_product'])){
			  
				include("view_product.php");
		   }
		    if(isset($_GET['delete_product'])){
			  
				include("delete_product.php");
		   }
		    if(isset($_GET['edit_product'])){
			  
				include("edit_product.php");
		   }
			if(isset($_GET['insert_cat'])){
			  
				include("insert_cat.php");
			}
		    if(isset($_GET['view_cat'])){
			  
				include("view_cat.php");
		   }
		     if(isset($_GET['delete_cat'])){
			  
				include("delete_cat.php");
		   }  
		   if(isset($_GET['edit_cat'])){
			  
				include("edit_cat.php");
		   }
		    if(isset($_GET['insert_slide'])){
			  
				include("insert_slide.php");
		   }
		    if(isset($_GET['view_slides'])){
			  
				include("view_slides.php");
		   }
		    if(isset($_GET['edit_slide'])){
			  
				include("edit_slide.php");
		   }
		    if(isset($_GET['delete_slide'])){
			  
				include("delete_slide.php");
		   }
		   if(isset($_GET['insert_Hot'])){
			  
				include("insert_Hot.php");
		   } 
		   if(isset($_GET['view_Hot'])){
			  
				include("view_Hot.php");
		   }
		   if(isset($_GET['edit_Hot'])){
			  
				include("edit_Hot.php");
		   }
		    if(isset($_GET['delete_Hot'])){
			  
				include("delete_Hot.php");
		   }
		    if(isset($_GET['view_users'])){
			  
				include("view_users.php");
		   }
		    if(isset($_GET['delete_user'])){
			  
				include("delete_user.php");
		   }
		    if(isset($_GET['view_admins'])){
			  
			include("view_admins.php");
			}
				
			/*if(isset($_GET['delete_admin'])){
			  
			include("delete_admin.php");} if to delete
			an admin*/
		   if(isset($_GET['add_admin'])){
			  
		   include("add_admin.php");
		   } 
		  /* if(isset($_GET['user_profile'])){
			  
		   include("user_profile.php"); to edit an admin
		   }*/
		   
		   ?>
          </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Hand2Hand 2020</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
<?php}?>