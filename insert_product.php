<?php 
  include("includes/dbConfig.php");
?>
<?php
require ("includes/dbConfig.php");

function categoryTree($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$sub_mark.$row['name'].'</option>';
            categoryTree($row['id'], $sub_mark.'---');
        }
    }
}
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
     <ol class="breadcrumb">
		<li class="active">
		  <i class="fa fa-dashboard"></i> Dashboard / Insert Products
		
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
		  
			<i class="fa fa-money fa-fw"></i> Insert Product
		  
		  </h3>
		  </div>
		  <div class="panel-body">
		  
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Title</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="product_title" required>
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Category</label>
				<div class="col-md-6">
			<select name="category" class=" form-control">
			<option> Select a Category</option>
				<?php categoryTree(); ?>
			</select>	
			
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 1</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img1" required>
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 2</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img2" >
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 3</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img3" >
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 4</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img4" >
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Price</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="product_price" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Keywords</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="product_keywords" required>
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Description</label>
				<div class="col-md-6">
				<textarea name="product_desc" cols="19" rows="10" class="form-control"></textarea>
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
			   <i class="fa fa-plus-square">Insert Item</i></button>
			 
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
	if(isset($_SESSION['user_email'])){
	
		
		$user_email = $_SESSION['user_email'];
		
		$get_user = "select * from users where user_email='$user_email'";
		$run_user = mysqli_query($db,$get_user);
		$row_user = mysqli_fetch_array($run_user);
		$user_id = $row_user['user_id'];
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
		
		}
	$product_title = $_POST['product_title'];
	$category = $_POST['category'];
	$product_price = $_POST['product_price'];
	$product_keywords = $_POST['product_keywords'];
	$product_desc = $_POST['product_desc'];
	$contact_number = $_POST['contact_number'];
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];
	$product_img4 = $_FILES['product_img4']['name'];
	
	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
	$temp_name4 = $_FILES['product_img4']['tmp_name'];
	
	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img2");
	move_uploaded_file($temp_name3, "product_images/$product_img3");
	move_uploaded_file($temp_name4, "product_images/$product_img4");
	
	$insert_product = "insert into products(cat_id,date,product_title,product_img1,product_img2,product_img3,product_img4,
	product_price,product_keywords,product_desc,contact_number,user_email)
	values('$category',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_img4','$product_price',
	'$product_keywords','$product_desc','$contact_number','$user_email')";
	
	$run_product = mysqli_query($db,$insert_product);
	
	if($run_product){
		
		echo"<script>alert('item has been inserted sucessfully')</script>";
		echo"<script>window.open('inserting_products.php','_self')</script>";
	}
}

?>