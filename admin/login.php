
<?php

include("includes/dbConfig.php");

?>

<?php include("includes/header.php");?>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header center">Admin Login</div>
        <div class="card-body">
          <form action="" class="form-login" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="admin_email" class="form-control"  required="required" >
                <label for="admin_email">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="admin_pass" class="form-control"  required="required">
                <label for="admin_pass">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="admin_login">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>


<?php

	if(isset($_POST['admin_login'])){
		
		$admin_email = mysqli_real_escape_string($db,$_POST['admin_email']);
		$admin_pass = mysqli_real_escape_string($db,$_POST['admin_pass']);
		
		$get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
		$run_admin = mysqli_query($db,$get_admin);
		$count = mysqli_num_rows($run_admin);
		
		if($count==1){
			$_SESSION['admin_email']=$admin_email;
			
			echo"<script>alert('logged in. welcome back')</script>";
			echo"<script>window.open('index.php?dashboard','_self')</script>";
		}else{
			echo"<script>alert('Email or Password incorrect')</script>";
		}
	}
?>
