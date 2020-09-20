<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title> Insert Hot Deal</title>
   <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body>

<div class="row">
  <div class="col-lg-12">
     <ol class="breadcrumb">
		<li class="active">
		  <i class="fa fa-dashboard"></i> Dashboard / Insert Hot Deal
		
		</li>
	 
	 </ol>
  
  </div>

</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> Insert Hot Deal
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Title</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="pro_hot_title" required>
			 </div>
			 </div>
			
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Image 1</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="pro_hot_img1" required>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Image 2</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="pro_hot_img2" >
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Image 3</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="pro_hot_img3" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Image 4</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="pro_hot_img4" >
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Price</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="pro_hot_price" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Keywords</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="pro_hot_keywords" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Hot Description</label>
				<div class="col-md-6">
				<textarea name="pro_hot_desc" cols="19" rows="10" class="form-control"></textarea>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Contact Number</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="contact_number" required>
			 </div>
			 </div> 
			 <div class="text-center">
			 
			   <button type="submit" name="submit" value="Insert Item"class="btn btn-success">
			   <i class="fa fa-plus-square">Insert Hot</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
	
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	
	$pro_hot_title = $_POST['pro_hot_title'];
	
	$pro_hot_price = $_POST['pro_hot_price'];
	$pro_hot_keywords = $_POST['pro_hot_keywords'];
	$pro_hot_desc = $_POST['pro_hot_desc'];
	$contact_number = $_POST['contact_number'];
	
	$pro_hot_img1 = $_FILES['pro_hot_img1']['name'];
	$pro_hot_img2 = $_FILES['pro_hot_img2']['name'];
	$pro_hot_img3 = $_FILES['pro_hot_img3']['name'];
	$pro_hot_img4 = $_FILES['pro_hot_img4']['name'];
	
	$temp_name1 = $_FILES['pro_hot_img1']['tmp_name'];
	$temp_name2 = $_FILES['pro_hot_img2']['tmp_name'];
	$temp_name3 = $_FILES['pro_hot_img3']['tmp_name'];
	$temp_name4 = $_FILES['pro_hot_img4']['tmp_name'];
	
	move_uploaded_file($temp_name1, "hot_imgs/$pro_hot_img1");
	move_uploaded_file($temp_name2, "hot_imgs/$pro_hot_img2");
	move_uploaded_file($temp_name3, "hot_imgs/$pro_hot_img3");
	move_uploaded_file($temp_name4, "hot_imgs/$pro_hot_img4");
	
	$insert_hot = "insert into hot_deals(pro_hot_title,	pro_hot_desc,date,pro_hot_price,pro_hot_keywords,pro_hot_img1,pro_hot_img2,
	pro_hot_img3,pro_hot_img4,contact_number)
	values('$pro_hot_title','$pro_hot_desc',NOW(),'$pro_hot_price','$pro_hot_keywords','$pro_hot_img1','$pro_hot_img2','$pro_hot_img3','$pro_hot_img4','$contact_number')";
	
	$run_hot = mysqli_query($db,$insert_hot);
	
	if($run_hot){
		
		echo"<script>alert('item has been inserted sucessfully')</script>";
		echo"<script>window.open('index.php?view_Hot','_self')</script>";
	}
}
	}
?>