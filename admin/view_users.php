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
            <li class="breadcrumb-item active">View Users</li>
          </ol>
	
	</div>
</div>

 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              USERS</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Email</th>
                      <th>Town</th>
                      <th>Contact</th>
					  <th>Date of Registration</th>
					  
                      <th>Product Delete</th>
                    
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
					$i=0;
					$get_user="select * from users";
					$run_user = mysqli_query($db,$get_user);
					while($row_user = mysqli_fetch_array($run_user)){
						$user_id = $row_user['user_id'];
						$user_name = $row_user['user_name'];
						$user_email = $row_user['user_email'];
						$user_town = $row_user['user_town'];
						$user_contact = $row_user['user_contact'];
						$reg_date = $row_user['reg_date'];
						$user_image = $row_user['user_image'];
						
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $user_name ; ?></td>
                      <td><img src="../Client/img/<?php echo $user_image; ?>"class="img-responsive col-md-6"></td>
                      <td><?php echo $user_email; ?></td>
                      <td><?php echo $user_town; ?></td>
                      <td><?php echo $user_contact; ?></td>
					  <td><?php echo $reg_date; ?></td>
					  
                      <td><a href="index.php?delete_user=<?php echo $user_id; ?>">
						<i class="fa fa-trash"></i> Delete
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