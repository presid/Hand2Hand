<?php
	
	if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php 
	if(isset($_GET['delete_product'])){
		
		$delete_id = $_GET['delete_product'];
		$delete_pro = "delete from products where product_id='$delete_id'";
		$run_delete = mysqli_query($db,$delete_pro);
		
		if($run_delete){
			echo"<script>alert('Product deleted')</script>";
			echo"<script>window.open('index.php?view_product','_self')</script>";
		
		}
	}


?>



<?php
	}
?>