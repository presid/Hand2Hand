<?php
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

/// get getRealipuser

 function getRealIpUser(){
	 
	 switch(true){
		 
		 case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
		 case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
		 case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
	 
		 default : return $_SERVER['REMOTE_ADDR'];
	 }
 }
/// add_cart functions

/*function add_cart(){
	
	global $db;
	
	if(isset($_POST['add_cart'])){
		$ip_add = getRealIpUser();
		$p_id = $_GET['add_cart'];
		
		$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check = mysqli_query($db,$check_product);
		
		if(mysqli_num_rows($run_check)>0){
			
			echo "<script>alert('This product was already added in cart')</script>";
			echo "<script>window.open('pro_id=','_self')</script>";
		}else{
			$query = "insert into cart(p_id,ip_add)values('$p_id','$ip_add')";  
			$run_query = mysqli_query($db,$query);
			echo "<script>window.open('pro_id=','_self')</script>";
		}
	}
}*/
///get categories from database


function show_menu(){
	
	global $db ;
	$categories = '';
	
	$categories .= generate_multilevel_menus($db);

    return $categories;
}

function generate_multilevel_menus($db,$parent_id=0){
	$menu = '';
	$sql ='';
	
	if(is_null($parent_id)){
		$sql = "SELECT * FROM `categories` WHERE `parent_id` IS 0";
	}
	else{
		$sql = "SELECT * FROM `categories` WHERE `parent_id`= $parent_id";
	}
	
	$result = mysqli_query($db,$sql);
	
	while ($row = mysqli_fetch_assoc($result)){
		
	if ($row ['id'] ){
		$menu.= '<li ><a  href = "shop.php?cat='.$row['id'].'">'.$row['name'].'</a>';
		
	}
	else {
		$menu.='<li ><a href ="#">'.$row['name'].'</a>';
	}
	$menu.= '<ul class ="dropdown sub_menu" >'.generate_multilevel_menus($db,$row['id']).'</ul>';

	$menu.= '</li>';
}
return $menu;
}
 /*$query=mysqli_query($db, "SELECT * FROM categories ");
     
	
	$arr_cat = array();
	
	while($row =mysqli_fetch_assoc($query)){
	
		$parent_id= $row['parent_id'];
		if($parent_id==0) $parent_id="#";
		$selected = false; $opened = false;
		
		if($row['id']== 2){
			$selected =true;
			$opened = true;
		}
		$arr_cat[] = array(
		 'id' =>$row['id'],
		 'parent'=> $parent_id,
		 'text' => $row['name'],
		 'state' => array(
			'selected' => $selected,
			'opened' => $opened
		 )
		);
        
	}


function categories_to_string($data){
    $string = '';
    foreach($data as $item){
        $string .= tplMenu($item);
    }
    return $string;
}

 

//Получаем HTML разметку
function categoryTree($parent_id = 0, $sub_mark = ''){
    global $db;
    $query = $db->query("SELECT * FROM categories WHERE parent_id = $parent_id ORDER BY name ASC");
   
    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
		
            echo '<ul  value="'.$row['id'].'">'.$sub_mark.$row['name'].'</ul>';
            categoryTree($row['id'], $sub_mark.'---');
        }
    }
}*/



//Выводим на экран
/*get products add by a particular person*/

function add_item(){
	global $db;
	
	$get_products ="select * from products order by 1 DESC ";
	$run_products = mysqli_query($db,$get_products);
	while ($row_products = mysqli_fetch_array($run_products))
	{
		$pro_id =$row_products ['product_id'];
		$pro_title = $row_products ['product_title'];
		$pro_price = $row_products ['product_price'];
		$pro_img1 = $row_products ['product_img1'];
		
		echo "
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
}



/*products frm db*/
function getPro(){
	global $db;
	
	$get_products ="select * from products order by 1 DESC ";
	$run_products = mysqli_query($db,$get_products);
	while ($row_products = mysqli_fetch_array($run_products))
	{
		$pro_id =$row_products ['product_id'];
		$pro_title = $row_products ['product_title'];
		$pro_price = $row_products ['product_price'];
		$pro_img1 = $row_products ['product_img1'];
		
		echo "
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
}


/*products frm db to hot deals*/

function getHot(){
	global $db;
	
	$get_products ="select * from 'hot_deals' order by 1 DESC ";
	$run_products = mysqli_query($db,$get_products);
	while ($row_products = mysqli_fetch_array($run_products))
	{
		$pro_id =$row_products ['pro_hot_id'];
		$pro_title = $row_products ['pro_hot_title'];
		$pro_price = $row_products ['pro_hot_price'];
		$pro_img1 = $row_products ['pro_hot_img1'];
		
		echo "
		   	<div class =' col-sm-3 col-xm-3 shadow' id='box_pro'>
				<div class='product-top'>
				<a href='details.php?pro_id=$pro_id'> <img src='admin/hot_imgs/$pro_img1' class='card-img-top' alt='card img top'></a>
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
}

function getHott(){
	global $db;
	
	$get_hot ="select * from hot_deals order by 1 DESC ";
	$run_hot = mysqli_query($db,$get_hot);
	while ($row_hot = mysqli_fetch_array($run_hot))
	{
		$pro_id =$row_hot ['pro_hot_id'];
		$pro_title = $row_hot ['pro_hot_title'];
		$pro_price = $row_hot ['pro_hot_price'];
		$pro_img1 = $row_hot ['pro_hot_img1'];
		
		  
		
		echo "
		   	 <div class ='item shadow ' id='box_pro'>
			 
				<div class='product-top'>
				 <legend>Hot Deal</legend>
				<a href='details.php?pro_id=$pro_id'> <img src='admin/hot_imgs/$pro_img1' class='card-img-top' alt='card img top'></a>
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
}
// get cat 
function getcat(){
global $db;

 if(isset($_GET['cat'])){
	 
	 $cat_id =$_GET['cat'];
	 
	 $get_cat = "select * from categories where id='$cat_id'";
	 $run_cat = mysqli_query($db,$get_cat);
	 $row_cat = mysqli_fetch_array($run_cat);
	 $cat_name = $row_cat['name'];
	 
	 $get_pro = "select * from products where cat_id='$cat_id'";
	
	  $run_pro = mysqli_query($db,$get_pro);
	  $count = mysqli_num_rows($run_pro);
	  
	  if($count==0){
		  echo " <div class='col-md-12 h1'>
					
					<p> No Products found in this category </p>
					</div>
		  
		  ";
	  } else {
		  echo"
			 <div class='col-md-12 h1'>
					
					<p> $cat_name</p> 
					</div>	
		  ";
	  }
	  while ($row_products = mysqli_fetch_array($run_pro)){
		$pro_id =$row_products ['product_id'];
		$pro_title = $row_products ['product_title'];
		$pro_price = $row_products ['product_price'];
		$pro_img1 = $row_products ['product_img1'];
		  
		echo "
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
 }
	
}
 ///items in cart
 function items(){
	 global $db;
	 
		$ip_add = getRealIpUser();
		
		$get_items = "select * from cart where ip_add='$ip_add'";
		$run_items = mysqli_query($db,$get_items);
	    $count_items = mysqli_num_rows($run_items);
	   echo $count_items;
	 
 }
?>