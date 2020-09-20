<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>

<?php
if (isset($_GET['edit_item'])){
	$edit_id = $_GET['edit_item'];
	$get_pro = "select * from products where product_id='$edit_id'";
	$run_edit = mysqli_query($db,$get_pro);
	$row_edit = mysqli_fetch_array($run_edit);
	$pro_id = $row_edit['product_id'];
	$cat_id = $row_edit['cat_id'];
	$pro_title = $row_edit['product_title'];
	$pro_img1 = $row_edit['product_img1'];
	$pro_img2 = $row_edit['product_img2'];
	$pro_img3 = $row_edit['product_img3'];
	$pro_img4 = $row_edit['product_img4'];
	$pro_price = $row_edit['product_price'];
	$pro_keywords = $row_edit['product_keywords'];
	$pro_desc = $row_edit['product_desc'];
}
	$get_cat = "select * from categories where id='$cat_id' ";
	$run_cat = mysqli_query($db,$get_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_title = $row_cat['name']; 

?>
<?php

require ("include/dbConfig.php");

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


		 
				<h2> Edit Item </h2>
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Title</label>
				<div class="col-md-6">
				<input type="text" class="form-control"  name="product_title" required value="<?php echo$pro_title?>">
			 </div>
			 </div>
			  <div class="form-group row">
				<label class="col-md-3 col-form-label">Category</label>
				<div class="col-md-6">
			<select name="category" class=" form-control">
			<option value="<?php echo $cat_id; ?>"> <?php echo $cat_title; ?></option>
				<?php categoryTree(); ?>
			</select>	
			
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 1</label>
				<div class="col-md-6">
				
				<input type="file" class="form-control form-control-lg"  name="product_img1" required >
				<br>
				<img class="img-responsive col-md-6"  src="admin/product_images/<?php echo $pro_img1;?>" alt="<?php echo $pro_img1;?>">
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 2</label>
				<div class="col-md-6">
				<input type="file"  class="form-control form-control-lg"  name="product_img2" >
				<br>
				<img class="img-responsive col-md-6"  src="admin/product_images/<?php echo $pro_img2;?>" alt="<?php echo $pro_img2;?>">
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 3</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img3" >
				<br>
				<img class="img-responsive col-md-6"  src="admin/product_images/<?php echo $pro_img3;?>" alt="<?php echo $pro_img3;?>">
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Image 4</label>
				<div class="col-md-6">
				<input type="file" class="form-control form-control-lg"  name="product_img4" >
				<br>
				<img class="img-responsive col-md-6"  src="admin/product_images/<?php echo $pro_img4;?>" alt="<?php echo $pro_img4;?>">
			 </div>
			 </div>
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Price</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="product_price" required value="<?php echo $pro_price;?>">
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Keywords</label>
				<div class="col-md-6">
				<input type="text" class="form-control "  name="product_keywords" required value="<?php echo $pro_keywords;?>">
			 </div>
			 </div> 
			 <div class="form-group row">
				<label class="col-md-3 col-form-label">Product Description</label>
				<div class="col-md-6">
				<textarea name="product_desc" cols="19" rows="10" class="form-control">
					<?php echo $pro_desc;?>
				</textarea>
			 </div>
			 </div>
			 <div class="text-center">
			 
			   <button type="update" name="update" value="update Item"class="btn btn-success">
			   <i class="fa fa-plus-square"> Update Item</i></button>
			 
			 </div>
		   </form>
		  
		
	

	


<?php
if(isset($_POST['update'])){
	
	$product_title = $_POST['product_title'];
	$category = $_POST['category'];
	$product_price = $_POST['product_price'];
	$product_keywords = $_POST['product_keywords'];
	$product_desc = $_POST['product_desc'];
	
	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];
	$product_img4 = $_FILES['product_img4']['name'];
	
	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];
	$temp_name4 = $_FILES['product_img4']['tmp_name'];
	
	move_uploaded_file($temp_name1, "admin/product_images/$product_img1");
	move_uploaded_file($temp_name2, "admin/product_images/$product_img2");
	move_uploaded_file($temp_name3, "admin/product_images/$product_img3");
	move_uploaded_file($temp_name4, "admin/product_images/$product_img4");
	
	$update_product = "update products set cat_id='$category',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',
	product_img4='$product_img4',product_keywords='$product_keywords',product_desc='$product_desc' where product_id='$pro_id'";

	$run_product = mysqli_query($db,$update_product);
	
	if($run_product){
		echo "<script>alert('Your item has been updated successfully') </script>";
		echo "<script>window.open('My_account.php?overview','_self') </script>";
	}
}
	}
?>
