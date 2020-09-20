<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title> Add Admin</title>
   <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body>


<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">Add Admins</li>
          </ol>
	
	</div>
</div>

<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> Admin Registration
		  
		  </h3>
		  </div>
		  <div class="panel-body">
			<form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Admin Name</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="admin_name" required>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Admin Email</label>
				<div class="col-md-6">
				<input type="email" class="form-control"  name="admin_email" required>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Password</label>
				<div class="col-md-6">
				<input type="password" class="form-control"  name="admin_pass" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Admin Contact</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="admin_contact" required>
			 </div>
			 </div>
			 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Admin Profile Picture</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="admin_image" required>
			 </div>
			 </div>
			
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Admin About</label>
				<div class="col-md-6">
				<textarea name="admin_about" cols="10" rows="5" class="form-control"></textarea>
			 </div>
			 </div>
			 <div class="text-center">
			 
			   <button type="submit" name="submit" value="Insert Item"class="btn btn-success">
			   <i class="fa fa-user-md"> Add Admin</i></button>
			 
			 </div>
		   </form>
		  
		
		</div>
	  
	  </div>
	
	
 
 </div>

</div>

		
	<?php } ?>
<?php
if(isset($_POST['submit'])){
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$admin_pass = $_POST['admin_pass'];
	$admin_about = $_POST['admin_about'];
	$admin_contact = $_POST['admin_contact'];
	$admin_image = $_FILES['admin_image']['name'];
	$admin_image_tmp = $_FILES['admin_image']['tmp_name'];
	
	move_uploaded_file($admin_image_tmp,"admin_imgs/$admin_image");
	$add_admin ="insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_about,admin_contact) 
	values('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_about','$admin_contact')";
	$run_admin = mysqli_query($db,$add_admin);
	
	if ($run_admin){
		
		echo"<script>alert('You have Successfully added an Admin')</script>";
		echo"<script>window.open('view_admins.php','_self')</script>";
	}
}
?>
