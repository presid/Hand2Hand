<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
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


		 
				<h2> Add Item </h2>
		     <form method="post" enctype="multipart/form-data">
			 <div class="form-group">
				<label class="col-md-3 col-form-label">Product Title</label>
				
				<input type="text" class="form-control"  name="product_title" required>
			
			 </div>
			  <div class="form-group ">
				<label class="col-md-3 col-form-label">Category</label>
				
			<select name="category" class=" form-control">
			<option> Select a Category</option>
				<?php categoryTree(); ?>
			</select>	
			
			 
			 </div>
			 <div class="form-group ">
				<label for="exampleFormControlFile1">Product Image 1</label>
				
				<input type="file" class="form-control-file" id="exampleFormControlFile1"  name="product_img1" required>
			
			 </div>
			 <div class="form-group">
				<label for="exampleFormControlFile1">Product Image 2</label>
				
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img2" >
			
			 </div>
			 <div class="form-group ">
				<label for="exampleFormControlFile1">Product Image 3</label>
				
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img3" >
			 
			 </div> 
			 <div class="form-group">
				<label for="exampleFormControlFile1">Product Image 4</label>
				
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="product_img4" >
			 
			 </div>
			 <div class="form-group">
				<label class="col-md-3 col-form-label">Product Price</label>
				
				<input type="text" class="form-control "  name="product_price" required>
			
			 </div> 
			 <div class="form-group ">
				<label class="col-md-3 col-form-label">Product Keywords</label>
				
				<input type="text" class="form-control "  name="product_keywords" required>
			 
			 </div> 
			 <div class="form-group ">
				<label class="col-md-3 col-form-label">Product Description</label>
				
				<textarea name="product_desc" cols="19" rows="10" class="form-control"></textarea>
			
			 </div>
			  <div class="form-group ">
				<label class="col-md-3 col-form-label">Contact Number</label>
				
				<input type="text" class="form-control "  name="contact_number" required>
			 
			 </div> 
			 
			 <div class="text-center">
			 
			   <button type="submit" name="submit" value="Insert Item"class="btn btn-success">
			   <i class="fa fa-plus-square">Insert Item</i></button>
			 
			 </div>
		   </form>
		  
		
	

	


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
		echo"<script>window.open('add_item.php','_self')</script>";
	}
}
	}
?>

