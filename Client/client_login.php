<?php include("include/dbConfig.php");
?>
<div class="container">
    <div class="row ">
		 
		<div class="col-md-12">
           
			
			  <center>
				<h1>Login</h1>
				<p class="lead">Already have an Account?</p>
				<p class ="text-muted"> If you do not have an account consider registering one,
				it will be of great benefit to your business.</p>
			  
			  
			  </center> 
		 <form action="checkout.php" method="POST" enctype="multipart/form-data">
			 
			 <div class="form-group">
				<label>Your Email</label>
				<input type="email" class="form-control "  name="c_email" required>
			 </div>
			 
			 <div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control"  name="c_pass" required>
			 </div>
			  
			
			 
			 <div class="text-center">
			 
			   <button type="submit" name="login" class="btn btn-success">
			   <i class="fa fa-sign-in"> Login</i></button>
			 
			 </div>
		   </form>
		   <center>
			<a href="register.php">
			<h2  style="margin-bottom: 75px;">Don't have an account? Click here</h2></a>
		   
		   </center>
		</div>
	</div>
	
	
</div>
</div>

<?php
	if(isset($_POST['login'])){
		$user_email = $_POST['c_email'];
		$user_password = $_POST['c_pass'];
		
		$select_user ="select * from users where user_email='$user_email' AND user_password ='$user_password'";
		$run_user = mysqli_query ($db,$select_user);
		$get_ip = getRealIpUser();
		$check_user = mysqli_num_rows($run_user);
		$select_cart ="select * from cart ip_add='$get_ip'";
		$run_cart = mysqli_query($db,$select_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if($check_user == 0){
			echo "<script> alert('your email or password is wrong')</script>";
			exit();
		}
		if($check_user==1 AND $check_cart==0){
			$_SESSION['user_email']=$user_email;
			echo "<script> alert('you have logged in')</script>";
			echo "<script> window.open('My_account.php?overview','_self')</script>";
		}else{
			$_SESSION['user_email']=$user_email;
			echo "<script> alert('you have logged in')</script>";
			echo "<script> window.open('checkout.php','_self')</script>";
		}
	}

?>