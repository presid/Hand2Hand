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
            <li class="breadcrumb-item active">View Admins</li>
          </ol>
	
	</div>
</div>

 <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              ADMINS</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Email</th>
                     
                      <th>Contact</th>
					  <th>About</th>
					  <th>Edit Admin</th>
                      <th>Delete Admin</th>
                    
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
					$i=0;
					$get_admin="select * from admins";
					$run_admin = mysqli_query($db,$get_admin);
					while($row_admin = mysqli_fetch_array($run_admin)){
						$admin_id = $row_admin['admin_id'];
						$admin_name = $row_admin['admin_name'];
						$admin_email = $row_admin['admin_email'];
						
						$admin_contact = $row_admin['admin_contact'];
						$admin_about = $row_admin['admin_about'];
						$admin_image = $row_admin['admin_image'];
						
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $admin_name ; ?></td>
                      <td><img src="admin_imgs/<?php echo $admin_image; ?>"class="img-responsive col-md-6"></td>
                      <td><?php echo $admin_email; ?></td>
                      
                      <td><?php echo $admin_contact; ?></td>
					  <td><?php echo $admin_about; ?></td>
					  <td><a href="index.php?user_profile=<?php echo $admin_id; ?>" onclick="popUp()">
						<i class="fa fa-edit"></i> Edit
					  </a></td>
                      <td><a href="index.php?delete_admin=<?php echo $admin_id; ?>" onclick="popUp()">
						<i class="fa fa-trash"></i> Delete
					  </a>
					  </td>
					  
                     
                    </tr>
				  <?php
					}
				  ?>
                    
                  
                   
                     
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>

 <script> 
		function popUp(){
			alert("You are not allowed to edit or delete admin (index)");
		}
 </script>

	<?php
	}
	?>