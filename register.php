<?php include("include/header.php");?>


<!--

--><div class = "wrapper">

 <div class="col-mb-3">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		
		<li>
			Registration
		</li>
	
	</ul>
 
 </div>
 
<div class="container">
    <div class="row ">
 
    <div class="col-md-12">
	  <div class="box">
	    <div class="box-header">
		   <center>
			<h2> Sign Up </h2>
			 <p class="text-muted"> 
			   We move your bussiness to another level.
			 </p>
		   
		   </center>
		   
		   <form action="register.php" method="post" enctype="multipart/form-data">
			 <div class="form-group">
				<label>Your Name</label>
				<input type="text" class="form-control"  name="r_name" required>
			 </div>
			 <div class="form-group">
				<label>Your Email</label>
				<input type="email" class="form-control"  name="r_email" required>
			 </div>
			 
			 <div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control"  name="r_pass" required>
			 </div>
			  <div class="form-group">
				<label>Your Town</label>
				<input type="text" class="form-control"  name="r_town" required>
			 </div>
			 <div class="form-group">
				<label>Your Contact</label>
				<input type="text" class="form-control"  name="r_contact" required>
			 </div>
			 <div class="form-group" >
			 
				<label for="exampleFormControlFile1">Your Profile Picture</label>
				<input type="file" class="form-control-file "  id="exampleFormControlFile1" name="r_image"/>
			 </div>
			
			 
			 <div class="text-center" style="margin-bottom: 15px;">
			 
			   <button type="submit" name="register" class="btn btn-success">
			   <i class="fa fa-user-md">Register</i></button>
			 
			 </div>
		   </form>
		
		</div>
	  
	  </div>
	
	</div>
 </div>
 </div>

</div>

		
<?php include("include/footer.php");?>
<?php
if(isset($_POST['register'])){
	$r_name = $_POST['r_name'];
	$r_email = $_POST['r_email'];
	$r_pass = $_POST['r_pass'];
	$r_town = $_POST['r_town'];
	$r_contact = $_POST['r_contact'];
	$r_image = $_FILES['r_image']['name'];
	$r_image_tmp = $_FILES['r_image']['tmp_name'];
	$user_ip = getRealIpUser();
	move_uploaded_file($r_image_tmp,"Client/img/$r_image");
	$insert_user ="insert into users (user_name,user_email,user_password,user_town,user_contact,reg_date,user_image,user_ip) 
	values('$r_name','$r_email','$r_pass','$r_town','$r_contact',NOW(),'$r_image','$user_ip')";
	$run_user = mysqli_query($db,$insert_user);
	$sel_cart = "select * from where ip_add='$c_ip'";
	$run_cart = mysqli_query($db,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if ($check_cart>0){
		//if a person registering has item(s) in cart
		$_SESSION['user_email']=$r_email;
		echo"<script>alert('You have Successfully Registered')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}else{
		//if a person registering has no item(s) in cart
		$_SESSION['user_email']=$r_email;
		echo"<script>alert('You have Successfully Registered')</script>";
		echo"<script>window.open('index.php','_self')</script>";
	
	}
}
?>
