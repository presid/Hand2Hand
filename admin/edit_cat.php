<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>
<?php
/*getting data from the database*/ 
	if(isset($_GET['edit_cat'])){
		$edit_cat = $_GET['edit_cat'];
		$edit_cat_query = "select * from categories where id='$edit_cat'";
		$run_edit = mysqli_query($db,$edit_cat_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$id = $row_edit['id'];
		$cat_title = $row_edit['name'];
		$parent_id = $row_edit ['parent_id'];
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
				<label class="col-md-3 col-form-label">Category Title</label>
				<div class="col-md-6">
				<input value="<?php echo $cat_title;?>" type="text" class="form-control"  name="cat_title" required>
			 </div>
			 </div>
			 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Parent ID</label>
				<div class="col-md-6">
				<input value="<?php echo $parent_id;?>" type="text" class="form-control"  name="parent_id" required>
			 </div>
			 </div>
			 
			
		
			
			
			
			
			
			
			 <div class="text-center">
			 
			   <button type="update" name="update" value="update Item"class="btn btn-success">
			   <i class="fa fa-plus-square"> Update Category</i></button>
			 
			 </div>
		   </form>
		  
		  </div>
		
		</div>
	  
	  </div>
</div>
</div>

<?php 

	if(isset($_POST['update'])){
		$cat_title = $_POST['cat_title'];
		$parent_id = $_POST['parent_id'];
		$update_cat = "update categories set name='$cat_title', parent_id='$parent_id',	updatedAt=NOW() where id='$id'";
		
		$run_cat = mysqli_query($db,$update_cat);
		
		if($run_cat){
		echo "<script>alert('Your category has been updated successfully') </script>";
		echo "<script>window.open('index.php?view_cat','_self') </script>";
	}
	
	}

?>
<?php } ?>