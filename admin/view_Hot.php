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
            <li class="breadcrumb-item active">View Hot</li>
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
                      <th>Hot ID</th>
                      <th>Hot Title</th>
                      <th>Hot Image</th>
                      <th>Hot Price</th>
                      <th>Hot Keywords</th>
                      <th>Hot Date</th>
					  <th>Contact Number</th>
					  <th>Hot Description</th>
                      <th>Hot Delete</th>
                      <th>Hot Edit</th>
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
					$i=0;
					$get_hot="select * from hot_deals";
					$run_hot = mysqli_query($db,$get_hot);
					while($row_pro = mysqli_fetch_array($run_hot)){
						$pro_hot_id = $row_pro['pro_hot_id'];
						$pro_hot_title = $row_pro['pro_hot_title'];
						$pro_hot_img1 = $row_pro['pro_hot_img1'];
						$pro_hot_price = $row_pro['pro_hot_price'];
						$pro_hot_keywords = $row_pro['pro_hot_keywords'];
						$pro_hot_date = $row_pro['date'];
						$pro_hot_desc = $row_pro['pro_hot_desc'];
						$contact= $row_pro['contact_number'];
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $pro_hot_title; ?></td>
                      <td><img src="hot_imgs/<?php echo $pro_hot_img1; ?>"></td>
                      <td><?php echo $pro_hot_price; ?></td>
                      <td><?php echo $pro_hot_keywords; ?></td>
                      <td><?php echo $pro_hot_date; ?></td>
					  <td><?php echo $contact; ?></td>
					  <td><?php echo $pro_hot_desc; ?></td>
                      <td><a href="index.php?delete_Hot=<?php echo $pro_hot_id; ?>">
						<i class="fa fa-trash"></i> Delete
					  </a></td>
					  <td><a href="index.php?edit_Hot=<?php echo $pro_hot_id; ?>">
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
         
          </div>



	<?php
	}
	?>