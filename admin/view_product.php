<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>

<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">View products</li>
          </ol>
	
	</div>
</div>

 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
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
					$i=0;
					$get_pro="select * from products";
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
                      <td><img src="product_images/<?php echo $pro_img1; ?>"></td>
                      <td><?php echo $pro_price; ?></td>
                      <td><?php echo $pro_keywords; ?></td>
                      <td><?php echo $pro_date; ?></td>
					  <td><?php echo $contact; ?></td>
					  <td><?php echo $pro_desc; ?></td>
                      <td><a href="index.php?delete_product=<?php echo $pro_id; ?>">
						<i class="fa fa-trash"></i> Delete
					  </a></td>
					  <td><a href="index.php?edit_product=<?php echo $pro_id; ?>">
						<i class="fa fa-edit"></i> Edit
					  </a></td>
                     
                    </tr>
				  <?php
					}
				  ?>
                    
                  
                   
                     
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>



	<?php
	}
	?>