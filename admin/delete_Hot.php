<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_Hot'])){
		
		$delete_id = $_GET['delete_Hot'];
		$delete_pro = "delete from hot_deals where pro_hot_id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_pro);
		
		if($run_delete){
			echo"<script>alert('Hot deleted')</script>";
			echo"<script>window.open('index.php?view_Hot','_self')</script>";
		
		}
	}


?>



<?php
	}
?>