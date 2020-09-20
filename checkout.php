<?php include("include/header.php");?>


<!--

--><div class = "wrapper">

 <div class="col-mb-3">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		
		<li>
			Login
		</li>
	
	</ul>
 
 </div>
 
	<?php 
	
		if(!isset($_SESSION['user_email'])){
			include("Client/client_login.php");
		}else{
			/*include("error_page.html");*/
		}
	?>
 
 

</div>

		
<?php include("include/footer.php");?>

