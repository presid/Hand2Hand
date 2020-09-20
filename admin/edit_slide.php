<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>
<?php
/*getting data from the database*/ 
	if(isset($_GET['edit_slide'])){
		$edit_slide = $_GET['edit_slide'];
		$edit_slide_query = "select * from slider where slide_id='$edit_slide'";
		$run_edit = mysqli_query($db,$edit_slide_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$slide_id = $row_edit['slide_id'];
		$slide_name = $row_edit['slide_name'];
		$slide_image = $row_edit['slide_image'];
		$slide_desc = $row_edit ['slide_desc'];
		$slide_url = $row_edit ['slide_url'];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title> Edit Category</title>
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
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
	
	</div>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-pencil fa-fw"></i> Edit Category
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Name</label>
				<div class="col-md-6">
				<input value="<?php echo $slide_name;?>" type="text" class="form-control"  name="slide_name" required>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Image</label>
				<div class="col-md-6">
				
				<input type="file" class="form-control form-control-lg"  name="slide_img" required>
				<br>
				<img class="img-responsive col-md-6"  src="slides_imgs/<?php echo $slide_image;?>" alt="<?php echo $pro_img1;?>">
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide Description</label>
				<div class="col-md-6">
				<textarea name="slide_desc" cols="10" rows="5" class="form-control"><?php echo $slide_desc;?></textarea>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Slide URL</label>
				<div class="col-md-6">
				<input value="<?php echo $slide_url;?>" type="text" class="form-control"  name="slide_url" required>
			 </div>
			 </div>
			 
			
		
			
			
			
			
			
			
			 <div class="text-center">
			 
			   <button type="update" name="update" value="update Item"class="btn btn-success">
			   <i class="fa fa-plus-square"> Update Slide</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
</div>
</div>

<?php 

	if(isset($_POST['update'])){
		$slide_name = $_POST['slide_name'];
		$slide_desc = $_POST['slide_desc'];
		$slide_url = $_POST['slide_url'];
		$slide_img = $_FILES['slide_img']['name'];
	
		$temp_name = $_FILES['slide_img']['tmp_name'];
		move_uploaded_file($temp_name, "slides_imgs/$slide_img");
		
		
		$update_slide = "update slider set slide_name='$slide_name', slide_image='$slide_img',
		slide_desc='$slide_desc', slide_url='$slide_url' where slide_id='$slide_id'";
		
		$run_slide = mysqli_query($db,$update_slide);
		
		if($run_slide){
		echo "<script>alert('Your slide has been updated successfully') </script>";
		echo "<script>window.open('index.php?view_slides','_self') </script>";
	}
	
	}

?>
<?php } ?>