
		<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
		
		<?php include("include/dbConfig.php");?>
		
				<!-- END MENU -->
		<?php
		
		  $user_session = $_SESSION['user_email'];
		  $get_user = "select * from users where user_email='$user_session'";
		  $run_user = mysqli_query($db,$get_user);
		  $row_user = mysqli_fetch_array($run_user);
		  $user_id = $row_user['user_id'];
		  $user_name = $row_user['user_name'];
		  $user_email = $row_user['user_email'];
		 
		  $user_town = $row_user['user_town'];
		  $user_contact = $row_user['user_contact'];
		  $user_image = $row_user['user_image'];
		
		?>
		
           
			   <h2> Edit Account </h2>
		  <form action="" method="post" enctype="multipart/form-data">
			 <div class="form-group">
				<label>User Name</label>
				<input type="text" class="form-control"  name="c_name" value="<?php echo $user_name;?>" required>
			 </div>
			 <div class="form-group">
				<label>User Email</label>
				<input type="email" class="form-control"  name="c_email" value="<?php echo $user_email;?>" required>
			 </div>
			 
			 
			  <div class="form-group">
				<label>User Town</label>
				<input type="text" class="form-control"  name="c_town" value="<?php echo $user_town;?>" required>
			 </div>
			 <div class="form-group">
				<label>User Contact</label>
				<input type="text" class="form-control"  name="c_contact"value="<?php echo $user_contact;?>" required>
			 </div>
			 <div class="form-group" >
			 
				<label>User Profile Picture</label>
				<input type="file" class="form-control form-height-custom"  name="c_image">
				<img class="img-responsive" src="Client/img/<?php echo $user_image;?>" alt="Client Profile Picture"/>
			 </div>
			
			 
			 <div class="text-center">
			 
			   <button type="submit" name="Update" class="btn btn-success">
			   <i class="fa fa-user-md"> Update</i></button>
			 
			 </div>
		   </form>
		   
		   <?php 
		   if (isset($_POST['Update'])){
			   $update_id =$user_id;
			   $c_name = $_POST['c_name'];
			   $c_email = $_POST['c_email'];
			   $c_town = $_POST['c_town'];
			   $c_contact = $_POST['c_contact'];
			   $c_image = $_FILES['c_image']['name'];
			   $c_image_tmp = $_FILES['c_image']['tmp_name'];
			   
			   move_uploaded_file($c_image_tmp,"Client/img/$c_image");
			   
			   $update_user = "update users set user_name='$c_name',
			   user_email='$c_email',user_town='$c_town',user_contact='$c_contact',
			   user_image='$c_image' where user_id='$update_id'";
			   $run_update = mysqli_query($db,$update_user);
		   
				if($run_update){
					echo"<script>alert('Your account has been updated')</script>";
					echo "<script>window.open('logout.php','_self')</script>";
				}
		   }
		   
	}
		   ?>
		
	


		

