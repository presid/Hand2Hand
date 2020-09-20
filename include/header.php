<?php 
session_start();
include("include/dbConfig.php");
 include("functions/functions.php");
 
?>
<?php
if(isset($_GET['pro_id'])){
			$product_id = $_GET['pro_id'];
			$get_product ="select * from products where product_id='$product_id'";
			$run_product = mysqli_query($db,$get_product);
			$row_product = mysqli_fetch_array($run_product);
			$cat_id = $row_product['cat_id'];
			$pro_title = $row_product['product_title'];
			$pro_price = $row_product['product_price'];
			$pro_desc = $row_product['product_desc'];
			$contact_number = $row_product['contact_number'];
			$pro_img1 = $row_product['product_img1'];
			$pro_img2 = $row_product['product_img2'];
			$pro_img3 = $row_product['product_img3'];
			$pro_img4 = $row_product['product_img4'];
		
			$get_cat = "select * from categories where id='$cat_id'";
			$run_cat = mysqli_query($db,$get_cat); 
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_name = $row_cat['name'];
		}
	 

?>

<?php
if(isset($_GET['pro_hot_id'])){
			$product_id = $_GET['pro_hot_id'];
			$get_product ="select * from hot_deals where pro_hot_id='$product_id'";
			$run_product = mysqli_query($db,$get_product);
			$row_product = mysqli_fetch_array($run_product);
			$pro_hot_id = $row_product['pro_hot_id'];
			$pro_hot_title = $row_product['pro_hot_title'];
			$pro_hot_price = $row_product['pro_hot_price'];
			$pro_hot_desc = $row_product['pro_hot_desc'];
			$contact_hot_number = $row_product['contact_number'];
			$pro_hot_img1 = $row_product['pro_hot_img1'];
			$pro_hot_img2 = $row_product['pro_hot_img2'];
			$pro_hot_img3 = $row_product['pro_hot_img3'];
			$pro_hot_img4 = $row_product['pro_hot_img4'];
		
			
		}
	 

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hand2Hand E-Shop </title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href='src/vendor/normalize.css/normalize.css' rel='stylesheet'>
  <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href="dist/vertical-responsive-menu.min.css" rel="stylesheet">
  <!-- Owl Stylesheets -->
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet" />
  <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />	
  <link href="css/ss.css" rel="stylesheet">
  <link href="css/style_detail.css" rel="stylesheet">
  <link href="css/style_userprofile.css" rel="stylesheet">
</head>

<body>
  <div id="top">
	<div class="container">
		<div class="col-md-6 offer">
			<a href="#" class="btn btn-link btn-sm"> 
				<?php
					if(!isset($_SESSION['user_email'])){
						echo "Welcome: Guest";
					}else{
						echo "Welcome: ".$_SESSION['user_email']."";
					}
					
				
				?>

			</a>
			
			<a href="checkout.php"> <?php echo items();?> Items in your Cart</a>
			
			<?php
			
			
			
			$ip_add = getRealIpUser();
				$select_cart ="select * from cart where ip_add='$ip_add'";
				$run_cart = mysqli_query($db,$select_cart);
				$count = mysqli_num_rows($run_cart);
			
			?>
		</div>
	
	</div>
  
  </div>
  <header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
      <i class="fa fa-bars"></i>
    </button>
    <nav class="navbar navbar-expand-lg navbar-light " id="nav">

	 <a href="index.php" class="navbar-brand"id="brand">Hand2Hand</a>
	 
	<div class="collapse navbar-collapse"  id="navbarNav">


<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
  <li class="nav-item">
    <a class="nav-link active" href="#">Vehicles</a>
  </li>
			<li class="nav-item">
    <a class="nav-link " href="#">Electronics</a>
     </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Real Estates</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Houses</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Land</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Apartments</a></div>

  </li>

   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fashion</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Men</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Women</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Children</a></div>

  </li>
	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Printing</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Car hire</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Decorations</a></div>
  </li>
	   	<li class="nav-item">
    <a class="nav-link " href="contact.php">Contact Us</a>
     </li>
			</ul>
	</div>

		<div class="authorization">
			<ul class="auth">
			
			<li class="<?php if(isset($_GET['overview'])){echo"active";}?> ">
						  
							<?php
								if(!isset($_SESSION['user_email'])){
									echo "<a href ='checkout.php'>My Account</a>";
								}else{
									echo "<a href ='My_account.php?overview'>My Account</a>";
								}

							?>
						</li>
			<li>  <a  href="register.php">Sign Up</a></li>
			<li>  <a  href="cart.php">Cart</a></li>
			<li>  <a  href="checkout.php">
				<?php
					if(!isset($_SESSION['user_email'])){
						echo "<a href='checkout.php'>Login</a>";
					}else{
						echo "<a href='logout.php'>Logout</a>";
					}
					
				
				?>
			
			</a></li>
			
			
			</ul>
		</div>
		

	
 </nav>

  </header>
   <?php include("include/nav.php");
   ?>
  <?php
		if(!isset($_GET['cat'])){
			
		}
	 
	 ?>