<?php include("include/header.php");?>


<!--

--><div class = "wrapper">

 <div class="col-mb-3">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		
		<li>
			My Account
		</li>
	
	</ul>
 
 </div>
<div class="container">
    <div class="row ">
		 <?php include("Client/include/sidebar.php");?>
		 
		<div class="col-md-9">
           
			
			   
		  <?php 
		        if(isset($_GET['overview'])){
				include("overview.php");}
			
		  
		  ?>
		  
		  
		  <?php 
		        if(isset($_GET['edit_account'])){
				include("edit_account.php");}
			
		  
		  ?>
		  
		  <?php 
		        if(isset($_GET['change_pass'])){
				include("change_pass.php");}
			
		  
		  ?>
		  
		  <?php 
		        if(isset($_GET['delete_account'])){
				include("delete_account.php");}
			
		  
		  ?>
		   <?php 
		        if(isset($_GET['add_item'])){
				include("add_item.php");}
			
		  
		  ?>
		  <?php 
		        if(isset($_GET['delete_item'])){
				include("delete_item.php");}
			
		  
		  ?>
		   <?php 
		        if(isset($_GET['edit_item'])){
				include("edit_item.php");}
			
		  
		  ?>
		  
		  
		
	</div>
</div>
</div>
</div>

		
<?php include("include/footer.php");?>
