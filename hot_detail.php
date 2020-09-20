<?php include("include/header.php");

?>


<!--

--><div class = "wrapper">

 <div class="col-md-12">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		<li>
			Details
		</li>
		
		<li>
		 <?php echo $pro_hot_title;?>
		</li>
	</ul>
 
 </div>
 <div class="container product">
    <div class="row">
		<div class="col-md-5">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                   <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                   <li data-target="#carouselExampleControls" data-slide-to="1" ></li>
                   <li data-target="#carouselExampleControls" data-slide-to="2" ></li>
                   <li data-target="#carouselExampleControls" data-slide-to="3" ></li>
                
                
                </ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
					  <img class="d-block w-100" src="admin/hot_imgs/<?php echo $pro_hot_img1?>" alt="First slide">
					</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="admin/hot_imgs/<?php echo $pro_hot_img2?>" alt="Second slide">
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="admin/hot_imgs/<?php echo $pro_hot_img3?>" alt="Third slide">
						</div>
						<div class="carousel-item">
						  <img class="d-block w-100" src="admin/hot_imgs/<?php echo $pro_hot_img4?>" alt="fourth slide">
						</div>
					  </div>
					  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
			</div>
		</div>
		<div class="col-sm-6">
		
			<div class="box">
			
			<h2><?php echo $pro_hot_title;?></h2>
			<?php add_cart();?>
		  <form action="hot_detail.php?add_cart=<?php echo $pro_hot_id;?>"class="form-horizontal" method="post">
			<p class="price">Zmk <?php echo $pro_hot_price;?></p>
			<!--<p><b>Availability: </b> In Stock</p>
			<p><b>Condition: </b> New</p>-->
			
			<p><i class="fa fa-phone"></i><span> Contact:</span> <?php echo $contact_hot_number;?></p>
			
			<h2> Description </h2>
			<p><?php echo $pro_hot_desc;?></p>
			<p class="text-center buttons"> <button type="submit" 
			class="btn btn-success  i fa fa-shopping-cart">Add to cart</button></p>
		  </form>
			</div>
			<div class="row" id="thumbs">
				<div class="col-xs-4">
				  <a  href=""data-target="#carouselExampleControls" data-slide-to="0" class="thumb">
				    <img src="admin/hot_imgs/<?php echo $pro_hot_img1?>" alt=" product 1" class="img-responsive">
				  </a>
				</div> <!--col-xs-4-->
				<div class="col-xs-4">
				  <a href=""data-target="#carouselExampleControls" data-slide-to="1" class="thumb">
				    <img src="admin/hot_imgs/<?php echo $pro_hot_img2?>" alt=" product 2" class="img-responsive">
				  </a>
				</div> <!--col-xs-4-->
				<div class="col-xs-4">
				  <a  href=""data-target="#carouselExampleControls" data-slide-to="2" class="thumb">
				    <img src="admin/hot_imgs/<?php echo $pro_hot_img3?>" alt=" product 3" class="img-responsive">
				  </a>
				</div> <!--col-xs-4-->
                <div class="col-xs-4">
				  <a  href=""data-target="#carouselExampleControls" data-slide-to="3" class="thumb">
				    <img src="admin/hot_imgs/<?php echo $pro_hot_img4?>" alt=" product 4" class="img-responsive">
				  </a>
				</div> <!--col-xs-4-->
               
			
			</div>
			
		</div>
	   
	
	</div> <!--row -->

  <!--box details-->

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
