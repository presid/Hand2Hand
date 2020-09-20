<?php include("include/header.php");?>


<!--

--><div class = "wrapper">
 <div class="container">
 <div class="col-md-12">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		
		<li>
			Cart 
		</li>
	
	</ul>
 
 </div>
  
 <div id="cart" class="col-md-9">
     <div class="box">
       <form action="cart.php" method="POST" enctype="multipart/form-data">
         <h2>Shopping Cart</h2>
           <p class="text-muted">You have <?php echo items();?> item(s) in your Cart</p>
      
            <?php 
				$ip_add = getRealIpUser();
				$select_cart ="select * from cart where ip_add='$ip_add'";
				$run_cart = mysqli_query($db,$select_cart);
				$count = mysqli_num_rows($run_cart);
			?>
           <div class="table-responsive">
                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Item</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Delete</th>
                     
                    </tr>
                  </thead>
                  <tbody>
				  <?php 
					
					$total =0;
					while($row_cart = mysqli_fetch_array($run_cart)){
						$pro_id = $row_cart['p_id'];
						$get_products = "select *from products where product_id ='$pro_id'";
						$run_products = mysqli_query($db,$get_products);
						while($row_products = mysqli_fetch_array($run_products)){
							
							$product_title = $row_products['product_title'];
							$product_img1 = $row_products['product_img1'];
							$product_price = $row_products['product_price'];
							
							?>
					
				  
				 
                    <tr>
                      <th scope="row"><img class="img-responsive" src="admin/product_images/<?php echo $product_img1;?>"></th>
                      <td><a href="details.php?pro_id=<?php echo $pro_id;?>"> <?php echo$product_title;?></a></td>
                      <td><?php echo $product_price;?></td>
                      <td> <input type="checkbox" name ="remove[]" value="<?php echo $pro_id;?>"></td>
                      
                    </tr>
                    
                    
                      <?php }}?>
                   
                  </tbody>
                     
                    
                     
                   
                </table>
           
           </div>
		   <div class="center">
			<button type="submit" name="update" value="update Cart" class="btn btn-default">
				<i class="fa fa-refresh"></i> Update Cart </button>
		<!--   <a href="checkout.php" class="btn btn-primary"> 
		   <i class="fa fa-chevron-right"></i></a>-->
		   </div>
		   
         
         </form>
             
         
         
     </div><!--box-->
     <!--recommeded-->
    <?php
	 function update_cart(){
		 global $db;
		 if(isset($_POST['update'])){
			 foreach($_POST['remove'] as $remove_id){
				 $delete_product = "delete from cart where p_id='$remove_id'";
				 $run_delete = mysqli_query ($db,$delete_product);
				 if($run_delete){
					 echo"<script>window.open('cart.php','_self')</script>";
				 }
			 }
		 }
	 }
	  echo $up_cart= update_cart();
	?>
     
 </div> <!--cart-->
     
     <div class="col-md-3">
       <div id="order-summary" class="box">
         
         <div class="box-header">
           
            <h3>Summary</h3>
           
           </div>
         
         </div>
     
     </div>
      <div class="container">
       <h2 class="text-center">Items you might like</h2>
      <div class="row">
		    
			<?php 
			   $get_products = "select * from products order by rand() LIMIT 0,4";
			   $run_products = mysqli_query($db,$get_products);
			   
			   while($row_products = mysqli_fetch_array($run_products)){
				   $pro_id = $row_products['product_id'];				   
				   $pro_title = $row_products['product_title'];				   
				   $pro_price = $row_products['product_price'];				   
				   $pro_img1 = $row_products['product_img1'];				   
				 
				echo"
				
				<div class =' col-sm-3 col-xm-3 shadow' id='box_pro'>
				<div class='product-top'>
				<a href='details.php?pro_id=$pro_id'> <img src='admin/product_images/$pro_img1' class='card-img-top' alt='card img top'></a>
				  <div class='overlay'>
				    	<a href='details.php?pro_id=$pro_id' class='btn btn-secondary btn-sm '><i class='fas fa-cart-plus'></i></a>
				   
				  </div>
				</div>
				
				<div class='product-bottom text-center'>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star-half-alt'></i>
				  <i class='far fa-star'></i>
				    <h3>
						<a href='details.php?pro_id=$pro_id'> </a>
							$pro_title
						</h3>
					<p class='price'>
							Zmk $pro_price
					</p>
					
					<a  class='btn btn-secondary btn-sm ' href='details.php?pro_id=$pro_id'>Buy</a>
					<a href='details.php?pro_id=$pro_id' class='btn btn-secondary btn-sm '>Details</a>
				</div>
			
				
			
					
		   </div>
		
		";
				
				
				 
			   }
			
			?>
				
			
				
					
		   </div>
     </div>
    
    
     
   
</div>
  

   
    

    

</div>


		
<?php include("include/footer.php");?>
