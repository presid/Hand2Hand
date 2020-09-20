
<?php
session_start();
include("includes/db.php");

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
        <link rel="stylesheet" href="css/style.css"> 
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" name="form1" action=""method="post">
    <p><input type="text" placeholder="Username" required name="username"></p>
    <p><input type="password" placeholder="Password" required name="password"></p>
    <p><input type="submit" name="submit1" value="Login"></p>
  </form>
</div>
 
<?php


if(isset($_POST["submit1"])){
 

$username = mysqli_real_escape_string($con,$_POST['username']) ;
$password = mysqli_real_escape_string($con,$_POST['password']) ;

$sql = "SELECT * FROM admin_login WHERE username ='$username' AND password ='$password'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
if ($row = $res -> fetch_assoc()){
	//$_SESSION['id'] =$row['id'];
	$_SESSION['admin'] =$row['username'];
	header("Location: inserting_slider.php?loginsuccess");
	exit();
}

}

else {
	header("Location: admin_login.php?loginerror");
	
	exit();
}
}

?>
    

    
  </body>
</html>