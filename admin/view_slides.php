<?php 
 if(!isset($_SESSION['admin_email'])){
		echo"<script>window.open('login.php','_self')</script>";
	}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,500" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title> view category</title>
   <link href='src/vendor/fontawesome/css/font-awesome.min.css' rel='stylesheet'>

</head>
<body>
<div class="row">
	<div class="col-lg-12">
	  <h1 class="page-header">Dashboard</h1>
	  
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard
            </li>
            <li class="breadcrumb-item active">View Slides</li>
          </ol>
	
	</div>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-12">
	  <div class="panel-default panel">
	    <div class="panel-heading">
		  <h3 class="panel-title">
		  
			<i class="fa fa-money fa-fw"></i> View Slides
		  
		  </h3>
		  </div>
		<!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Slides</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Slide ID</th>
                      <th>Slide Name</th>
                      <th>Slide Image</th>
                      <th>Slide Description</th>
                      <th>Slide URL</th>
                      
                      <th>Product Delete</th>
                      <th>Product Edit</th>
                    </tr>
                  </thead>
                 
                  <tbody>
				  <?php 
					$i=0;
					$get_slide="select * from slider";
					$run_slide = mysqli_query($db,$get_slide);
					while($row_slide = mysqli_fetch_array($run_slide)){
						$slide_id = $row_slide['slide_id'];
						$slide_name = $row_slide['slide_name'];
						$slide_image = $row_slide['slide_image'];
						$slide_desc = $row_slide['slide_desc'];
						$slide_url = $row_slide['slide_url'];
						
						
						$i++;
					
				  
				  ?>
				  <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $slide_name; ?></td>
                      <td><img src="slides_imgs/<?php echo $slide_image; ?>" class="col-md-6"></td>
                      <td><?php echo $slide_desc; ?></td>
                      <td><?php echo $slide_url; ?></td>
                      
					 
                      <td><a href="index.php?delete_slide=<?php echo $slide_id; ?>">
						<i class="fa fa-trash"></i> Delete
					  </a></td>
					  <td><a href="index.php?edit_slide=<?php echo $slide_id; ?>">
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
		
		</div>
	  
	  </div>
</div>
</div>


<?php } ?>