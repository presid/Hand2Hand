<?php
	
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('index.php','_self')</script>";
	}else{
?>

</br>
</br>
</br>
</br>
</br>
<center>
  <h3>Do you Really want to delete your Account?</h3>
  <form action="" method="post">
  <input type="submit" name="Yes" value="Yes,I want to Delete" class="btn btn-danger">
  <input type="submit" name="No" value="No,I Do not want to Delete my Account" class="btn btn-success">
  
  </form>

</center>
<?php

$c_email = $_SESSION['user_email'];

if(isset($_POST['Yes'])){
	$delete_user = "delete from users where user_email='$c_email'";
	$run_delete = mysqli_query($db,$delete_user);
	
	if($delete_user){
		session_destroy();
		echo"<script>alert('Sucessfully deleted your account,although we would have loved to keep you')</script>";
		echo "<script>window.open('logout.php','_self')</script>";
	}
}
if(isset($_POST['No'])){
	echo "<script>window.open('My_account.php?overview','_self')</script>";
}
	}
?>