<?php include("include/header.php");?>


<!--

--><div class = "wrapper">

 <div class="col-md-12">
	<ul class="breadcrumb crumb">
		<li>
			<a href="index.php">Home</a>
		</li>
		
		<li>
			Contact Us
		</li>
	
	</ul>
 
 </div>
 

 
    <div class="col-md-9">
	  <div class="box">
	    <div class="box-header">
		   <center>
			<h2> Feel free Contact us </h2>
			 <p class="text-muted"> 
			   If you have any enquires or queries write to us.
			 </p>
		   
		   </center>
		   
		   <form action="contact.php" method="post">
			 <div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control"  name="name" required>
			 </div>
			 <div class="form-group">
				<label>Email</label>
				<input type="text" class="form-control"  name="email" required>
			 </div>
			 
			 <div class="form-group">
				<label>Subject</label>
				<input type="text" class="form-control"  name="subject" required>
			 </div>
			 
			 <div class="form-group">
				<label>Message</label>
				<textarea name="message" class="form-control"></textarea>
			 </div>
			 
			 <div class="text-center">
			 
			   <button type="submit" name="submit" class="btn btn-success">
			   <i class="fa fa-user-md">Submit</i></button>
			 
			 </div>
		   </form>
		   <!--message for the admin-->
		   <?php 
			if(isset($_POST['submit'])){
				$sender_name =$_POST['name'];
				$sender_email =$_POST['email'];
				$sender_subject =$_POST['subject'];
				$sender_message =$_POST['message'];
				
				$receiver_email = "hand2handeco@gmail.com";
				mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
				//Auto reply
				$email =$_POST['email'];
				$subject = "Welcome to Hand2Hand";
				$msg = "Thank you for contacting us,our team will get back to you in a while";
				$from = "hand2handeco@gmail.com";
				mail($email,$subject,$msg,$from);
				echo"<h2 align='center'>Your message has been sent successfully</h2>";
			}
		   
		   ?>
		
		</div>
	  
	  </div>
	
	
 
 </div>

</div>

		
<?php include("include/footer.php");?>
