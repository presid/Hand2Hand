 <?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
 
 <h2> Change Password </h2>
		  <form action="" method="post" >
			 <div class="form-group">
				<label>Old Password</label>
				<input type="password" class="form-control"  name="old_pass" required>
			 </div>
			 <div class="form-group">
				<label>New Password</label>
				<input type="password" class="form-control"  name="new_pass" required>
			 </div>
			 
			 <div class="form-group">
				<label>Retype New Password</label>
				<input type="password" class="form-control"  name="retype_new_pass" required>
			 </div>
			 
		
			 <div class="text-center">
			 
			   <button type="submit" name="submit" class="btn btn-success">
			   <i class="fa fa-user-md">Update</i></button>
			 
			 </div>
		   </form>
		   
		   
		   <?php
		   if(isset($_POST['submit'])){
		   $c_email =$_SESSION['user_email'];
		   $old_pass = $_POST['old_pass'];
		   $new_pass = $_POST['new_pass'];
		   $retype_new_pass = $_POST['retype_new_pass'];
		   $select_old_pass = "select * from users where user_password='$old_pass'";
		   $run_old_pass = mysqli_query($db,$select_old_pass);
		   $check_old_pass = mysqli_fetch_array($run_old_pass);
		   if($check_old_pass==0){
			   echo"<script>alert('Sorry, you entered a wrong password, Please try again')</script>";
			   exit();
		   }
		   if($new_pass!=$retype_new_pass){
			   echo"<script>alert('Sorry, your new password did not match')</script>";
			   exit();
		   }
		   $update_pass = "update users set user_password='$new_pass' where user_email='$c_email'";
		   $run_pass= mysqli_query($db,$update_pass);
		   
		   if($run_pass){
			   echo"<script>alert('Your password has been changed')</script>";
			   echo "<script>window.open('logout.php','_self')</script>";
		   }
		   }
	}
		   ?>