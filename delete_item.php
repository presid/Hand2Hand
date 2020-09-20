<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_item'])){
		
		$delete_id = $_GET['delete_item'];
		$delete_pro = "delete from products where product_id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_pro);
		
		if($run_delete){
			echo"<script>alert('Item deleted')</script>";
			echo"<script>window.open('My_account.php?overview','_self')</script>";
		
		}
	}


?>



<?php
	}
?>