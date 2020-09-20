
<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>
<?php

	if(isset($_SESSION['user_email'])){

			$user_session = $_SESSION['user_email'];
			$get_product ="select * from products where user_email='$user_session'";
			$run_product = mysqli_query($db,$get_product);
			$row_product = mysqli_fetch_array($run_product);
			$cat_id = $row_product['cat_id'];
			$pro_title = $row_product['product_title'];
			$pro_price = $row_product['product_price'];
			$pro_desc = $row_product['product_desc'];
			$pro_img1 = $row_product['product_img1'];
			$pro_img2 = $row_product['product_img2'];
			$pro_img3 = $row_product['product_img3'];
			$pro_img4 = $row_product['product_img4'];
		
			$get_cat = "select * from categories where id='$cat_id'";
			$run_cat = mysqli_query($db,$get_cat); 
			$row_cat = mysqli_fetch_array($run_cat);
			$cat_name = $row_cat['name'];
		}
	 

?>

  




 <h2> Your Items  </h2>
		

 
            <!-- DataTables Example -->
        
           
              <i class="fas fa-table"></i>
              uploded items
          
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Product Price</th>
                      <th>Product Keywords</th>
                      <th>Product Date</th>
					  <th>Contact Number</th>
					  <th>Product Description</th>
                      <th>Product Delete</th>
                      <th>Product Edit</th>
                    </tr>
                  </thead>
               
                  <tbody>
				  <?php 
				  global $db;
					$i=0;
					$user_session = $_SESSION['user_email'];
					$get_pro ="select * from products where user_email='$user_session'";
					
					$run_pro = mysqli_query($db,$get_pro);
					while($row_pro = mysqli_fetch_array($run_pro)){
						$pro_id = $row_pro['product_id'];
						$pro_title = $row_pro['product_title'];
						$pro_img1 = $row_pro['product_img1'];
						$pro_price = $row_pro['product_price'];
						$pro_keywords = $row_pro['product_keywords'];
						$pro_date = $row_pro['date'];
						$pro_desc = $row_pro['product_desc'];
						$contact= $row_pro['contact_number'];
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $pro_title; ?></td>
                      <td><img src="admin/product_images/<?php echo $pro_img1; ?>"></td>
                      <td><?php echo $pro_price; ?></td>
                      <td><?php echo $pro_keywords; ?></td>
                      <td><?php echo $pro_date; ?></td>
                      <td><?php echo $contact; ?></td>
					  <td><?php echo $pro_desc; ?></td>
                      
					  
                      <td><a href="My_account.php?delete_item=<?php echo $pro_id; ?>">
						<i class="fa fa-trash"></i> Delete
					  </a></td>
                      <td><a href="My_account.php?edit_item=<?php echo $pro_id; ?>">
						<i class="fa fa-edit"></i> Edit
					  </a></td>
                    </tr>
				  <?php
					}
				  ?>
                    
                  
                   
                     
                  </tbody>
                </table>
            
          
           
          </div>
		
	
	

<?php
	} ?>
		

