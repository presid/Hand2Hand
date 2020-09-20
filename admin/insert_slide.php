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
  <title> Insert Products</title>
   <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body>
<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">Insert Slide</li>
          </ol>
	
	</div>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> Insert Slide
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Name</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="slide_name" required>
			 </div>
			 </div>
			 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Image</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="slide_img" >
				
			 </div>
			 </div>
			 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Description</label>
				<div class="col-md-6">
				<textarea name="slide_desc" cols="10" rows="5" class="form-control"></textarea>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide url</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="slide_url" >
			 </div>
			 </div>
		
			
			
			
			
			
			
			 <div class="text-center">
			 
			   <button type="submit" name="submit" value="Insert Item"class="btn btn-success">
			   <i class="fa fa-plus-square"> Insert Slide</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
</div>
</div>

<?php 

	if(isset($_POST['submit'])){
		$slide_name = $_POST['slide_name'];
		$slide_desc = $_POST['slide_desc'];
		$slide_url = $_POST['slide_url'];
		
		$slide_img = $_FILES['slide_img']['name'];
	
		$temp_name = $_FILES['slide_img']['tmp_name'];
		
		$view_slide = "select * from slider";
		
		$slide = mysqli_query($db,$view_slide);
		
		$count = mysqli_num_rows($slide);
		
		if($count < 4){
		move_uploaded_file($temp_name, "slides_imgs/$slide_img");
		$insert_slide = "insert into slider (slide_name,slide_image,slide_desc,slide_url) values ('$slide_name','$slide_img','$slide_desc','$slide_url')";
		$run_slide = mysqli_query($db,$insert_slide);
		echo "<script>alert('Your new slide image has been inserted successfully') </script>";
		echo "<script>window.open('index.php?view_slides','_self') </script>";
	}else{
		echo"<script>alert('you already have 4 slides inserted')</script>";
	}
	
	}

?>


<?php } ?>