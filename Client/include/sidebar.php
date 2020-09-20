<?php
	
	include("include/dbConfig.php");
	if(isset($_SESSION['user_email'])){
	
		
		$user_session = $_SESSION['user_email'];
		
		$get_user = "select * from users where user_email='$user_session'";
		$run_user = mysqli_query($db,$get_user);
		$row_user = mysqli_fetch_array($run_user);
		$user_id = $row_user['user_id'];
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		
		}
		
?>

<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="Client/img/<?php echo $user_image;?>" class="img-responsive" alt="">
				</div>
				
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				

				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h3><?php echo $user_name;?></h3>
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="container">
 
					  <ul class="nav flex-column">
						
						<li class="<?php if(isset($_GET['overview'])){echo"active";}?> nav-items">
						  <a href="My_account.php?overview">
							<i class="fa fa-home"></i> Overview
						  </a>
							
						</li>
						<li class="<?php if(isset($_GET['edit_account'])){echo"active";}?> nav-items">
						  <a href="My_account.php?edit_account">
							<i class="fa fa-pencil"></i> Edit Account
						  </a>
							
						</li>
						<li class="<?php if(isset($_GET['change_pass'])){echo"active";}?> nav-items">
						  <a href="My_account.php?change_pass">
							<i class="fa fa-user"></i> Change Password
						  </a>
							
						</li>
						<li class="<?php if(isset($_GET['delete_account'])){echo"active";}?> nav-items">
						  <a href="My_account.php?delete_account">
							<i class="fa fa-trash-o"></i> Delete Account
						  </a>
							
						</li>
						<li class="<?php if(isset($_GET['add_item'])){echo"active";}?> nav-items">
						  <a href="My_account.php?add_item">
							<i class="fa fa-plus-square"></i> Add Item
						  </a>
							
						</li>
						
						<li class=" nav-items">
						  <a href="logout.php">
							<i class="fa fa-sign-out"></i> Log Out
						  </a>
							
						</li>
						
					  </ul>
</div>
				
				<!-- END MENU -->
			</div>
		</div>