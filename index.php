<?php include("include/dbConfig.php");
?>
<?php include("include/header.php");?>



  <div class="wrapper">

    
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    <li data-target="#carousel-example-1z" data-slide-to="3"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <!--First slide-->
   <?php 
   
     $get_slides ="select *from slider LIMIT 0,1";
	 $run_slides = mysqli_query($db,$get_slides);
	 
	 while($row_slides =mysqli_fetch_array($run_slides)){
		$slide_name = $row_slides['slide_name'];
		$slide_image = $row_slides['slide_image'];
		$slide_url = $row_slides['slide_url'];
		echo"
			<div class='carousel-item active'>
			  <a href='$slide_url'>	
			  <img src ='admin/slides_imgs/$slide_image'>
			  </a>
			</div>
		";
	 }
	 
	  $get_slides ="select *from slider LIMIT 1,3";
	 $run_slides = mysqli_query($db,$get_slides);
	 
	 while($row_slides =mysqli_fetch_array($run_slides)){
		$slide_name = $row_slides['slide_name'];
		$slide_image = $row_slides['slide_image'];
		$slide_url = $row_slides['slide_url'];
		echo"
			<div class='carousel-item '>
			  <a href='$slide_url'>	
			  <img src ='admin/slides_imgs/$slide_image'>
			  </a>
			</div>
		";
	 }
   
   ?>
    <!--/Third slide-->
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
	</div>
	
	<div class="container">
		  <h2> Latest Items </h2>
		  <div class="row">
		 
		    	<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			</br>
			</br>
			</br>
				<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			
				<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
				    <button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>			
		   </div>
		     <div class="row">
		    	<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			</br>
			</br>
			</br>
				<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			
				<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>
			<div class =" col-sm-3 col-xm-3 shadow" id="box_pro">
				<div class="product-top">
				 <img src="img/rav4.png" class="card-img-top" alt="card img top">
				  <div class="overlay">
				    <button type="button" class="btn btn-secondary" title="Quick Shop"> <i class="fas fa-eye"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to wishlist"> <i class="fas fa-heart"></i></button>
				    <button type="button" class="btn btn-secondary" title="Add to Cart"> <i class="fas fa-cart-plus"></i></button>
				  </div>
				</div>
				
				<div class="product-bottom text-center">
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star" ></i>
				  <i class="fas fa-star-half-alt"></i>
				  <i class="far fa-star"></i>
				    <h3>Vehicle 4</h3>
					<h6>"K1040" <strike>K1400</strike></h6>
					<button type="button" class="btn btn-success btn-sm">Buy</button>
					<button type="button" class="btn btn-danger btn-sm">Details</button>
				</div>
			</div>			
		   </div>
		</div>
	
  
	<!-- carousel most viewed items-->
	
	<!-- carousel with owl-->
   
   <div class="container ">
        <!--slider-->
		<h2>Most Viewed </h2>
		<div class="owl-carousel owl-theme ">
		    <?php 
		     $get_hot ="select * from hot_deals order by 1 DESC ";
	$run_hot = mysqli_query($db,$get_hot);
	while ($row_hot = mysqli_fetch_array($run_hot))
	{
		$pro_hot_id =$row_hot ['pro_hot_id'];
		$pro_hot_title = $row_hot ['pro_hot_title'];
		$pro_hot_price = $row_hot ['pro_hot_price'];
		$pro_hot_img1 = $row_hot ['pro_hot_img1'];
		
		  
		
		echo "
		   	 <div class ='item shadow ' id='box_pro'>
			 
				<div class='product-top'>
				 <legend>Hot Deal</legend>
				<a href='hot_detail.php?pro_hot_id=$pro_hot_id'> <img src='admin/hot_imgs/$pro_hot_img1' class='card-img-top' alt='card img top'></a>
				  <div class='overlay'>
				    	<a href='hot_detail.php?pro_hot_id=$pro_hot_id' class='btn btn-secondary btn-sm '><i class='fas fa-cart-plus'></i></a>
				   
				  </div>
				</div>
				
				<div class='product-bottom text-center'>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star' ></i>
				  <i class='fas fa-star-half-alt'></i>
				  <i class='far fa-star'></i>
				    <h3>
						<a href='hot_detail.php?pro_hot_id=$pro_hot_id'> </a>
							$pro_hot_title
						</h3>
					<p class='price'>
							Zmk $pro_hot_price
					</p>
					
					<a  class='btn btn-secondary btn-sm ' href='hot_detail.php?pro_hot_id=$pro_hot_id'>Buy</a>
					<a href='hot_detail.php?pro_hot_id=$pro_hot_id' class='btn btn-secondary btn-sm '>Details</a>
				</div>
			
				
			
					
		   </div>
		
		";
		
	}
?>
				
				 
				
			</div>
			
		</div>
	<!-- -->
	
	<div class="container">
		  <h2 class="text-center"> Listed Items</h2>
		  <div class="row">
		  
		  
		  <?php 
		  
		  getPro();
		  ?>
		    
		  
         
		   
		</div>
		</div>
		<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

			<!-- Footer -->
<?php include("include/footer.php");?>