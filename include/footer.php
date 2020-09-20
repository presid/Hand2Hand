	<footer id="footer">
		<div class="footer-top">
			<div class="container">
			  <div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 footer-info md-mb-30 sm-mb-30">							
				  <h3>Hand2Hand</h3>
					<p>We are here to make your business digital!!!</p>
					
				  </div>
				  <div class="col-md-3 col-sm-6 col-xs-12 footer-links md-mb-30 sm-mb-30">
				  
				  <h4>Useful Links</h4>
					  <ul>
						  <li><i class="ion-ios-arrow-right"></i><a href="index.php">Home</a></li>
						  <li><i class="ion-ios-arrow-right"></i><a href="#">About Us</a></li>
						  <li><i class="ion-ios-arrow-right"></i><a href="#">Contacts</a></li>
						   <li><a href="termsC.php">Terms & Conditions </a></li>
					  </ul>
				  </div>
				  
				  <div class="col-md-3 col-sm-6 col-xs-12 footer-contact md-mb-30 sm-mb-30">
				   <h4>Follow Us</h4>
					<p>please follow us on social media.</p>
					  <a href="#" class="Facebook"><i class="fa fa-facebook"></i></a>
					  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
					  <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
				  
				  
				  </div>
				  <div class="col-md-3 col-sm-6 col-xs-12 footer-msg md-mb-30 sm-mb-30">
					  <h4>Contact Us</h4>
					   <p>For enquries or queries Write to us!!!						   </p>
				       <form action="" method="post">
						   
						   <input type="text" id="lname" name="lname" placeholder = "Your Name" onblur="this.placeholder=">
					    <input type="email" name="email" placeholder = "Your Email Address" onblur="this.placeholder=">
						<textarea id="text" rows="3"
								   placeholder = "Your Message"></textarea>
						<input type="submit" value="Contact Us" >
					  
					   </form>
					  
				  </div>
				  
				
				</div>
			
			</div>
		<p class="copyright-text-muted">Copyright &copy;Hand2Hand 2020</p>
		</div>
	
	</footer>

		
		
		
 
 <script src="https://kit.fontawesome.com/fc0bcca8a3.js"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
 <script src="dist/vertical-responsive-menu.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
 <script src="admin/js/tinymce/tinymce.min.js"></script>
 <script>tinymce.init({selector:'textarea'});</script>
  <script>
       
   $(document).ready(function(){
    
	$(".fa-search").click(function(){
	$(".icon").toggleClass("active");
	$("input[type='text']").toggleClass("active");
});
   });
   $('.owl-carousel').owlCarousel({
		    
        loop: true,
		margin: 20,
	
		autoplay:true,
        responsive: {
          0: {
            items: 1
          },
          485: {
            items: 2
          },
		  728: {
            items: 3
          },
		  960: {
            items: 4
          },
          1200: {
            items: 5
          }
        }
		 });
		 
		
		 </script>
		
  
</body>
</html>