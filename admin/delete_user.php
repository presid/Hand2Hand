<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_user'])){
		
		$delete_id = $_GET['delete_user'];
		$delete_pro = "delete from users where user_id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_pro);
		
		if($run_delete){
			echo"<script>alert('User deleted')</script>";
			echo"<script>window.open('index.php?view_users','_self')</script>";
		
		}
	}


?>



<?php
	}
?>