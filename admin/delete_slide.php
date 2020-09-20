<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_slide'])){
		
		$delete_id = $_GET['delete_slide'];
		$delete_slide = "delete from slider where slide_id = '$delete_id'";
		$run_delete = mysqli_query($db,$delete_slide);
		
		if($run_delete){
			echo"<script>alert('Slide deleted')</script>";
			echo"<script>window.open('index.php?view_slides','_self')</script>";
		
		}
	}


?>



<?php
	}
?>