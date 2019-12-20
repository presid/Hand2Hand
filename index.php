<html>
<head>
	<title>RealDeal</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/ss.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scaleable=no">
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light " id="nav">

	 <a href="/index.php" class="navbar-brand"id="brand">RealDeal</a>
	 <button class="navbar-toggle navbar-toggler  navbar-toggler-right" type="button" style="border: 2px solid  #009e47;" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		 <span class="navbar-toggler-icon icon-bar" ></span>
	 </button>
	<div class="collapse navbar-collapse"  id="navbarNav">


<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
  <li class="nav-item">
    <a class="nav-link active" href="#">Vehicles</a>
  </li>
			<li class="nav-item">
    <a class="nav-link " href="#">Electronics</a>
     </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Real Estates</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Houses</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Land</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Apartments</a></div>

  </li>

   <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fashion</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Men</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Women</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Children</a></div>

  </li>
	<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Printing</a>
		<div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Car hire</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Decorations</a></div>
  </li>
	   	<li class="nav-item">
    <a class="nav-link " href="#">Extras</a>
     </li>
			</ul>
		<form class="form-inline my-2 my-lg-0" id="form">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
		<div class="authorization">
			<p>Sign-</p>
			<div class="connection_lines_up"></div>
			<div class="connection_lines_in"></div>
			<div class="auth_link">
				<a href="#" class="auth_up">up</a>
				<a href="#" class="auth_in">in</a>
			</div>
		</div>
		<script type="text/javascript">
		$(function() {
			$('.auth_up').hover(function() {
				$('.connection_lines_up').css('border', '2px solid green');
				$('.connection_lines_up').css('border-right', 'none');
				$('.connection_lines_up').css('border-bottom', 'none');
			}, function() {
				// on mouseout, reset the background colour
				$('.connection_lines_up').css('border', 'none');
			});
		});

		$(function() {
			$('.auth_in').hover(function() {
				$('.connection_lines_in').css('border', '2px solid green');
				$('.connection_lines_in').css('border-right', 'none');
				$('.connection_lines_in').css('border-top', 'none');
			}, function() {
				// on mouseout, reset the background colour
				$('.connection_lines_in').css('border', 'none');
			});
		});
</script>

	</div>
 </nav>

 <!-- main content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h2>main content</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-push-9 sidebar">
			<h2>sidebar</h2>
			<ul class="list-group">
				<li class="list-group-item">Service1</li>
				<li class="list-group-item">Service2</li>
				<li class="list-group-item">Service3</li>
			</ul>
		</div>
		<!--<div class="col-md-9 col-md-push-3 main_content">
			<h2>Recommendations</h2>
			<div class="row">
				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="panel">
						<a href="#"><img src="img/rav4.png" alt="Rav4"></a>
						<a class="title_link" href="#">Toyota Rav4</a>
						<p>12350$</p>
						<p>Lusaka, today 19:15</p>
					</div>
				</div>

			</div>

		</div>

		</div>-->
		<div class="card-deck" id="deck">
  <div class="card">
    <img src="img/rav4.png" alt="Rav4">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		 <p>$price</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
  <div class="card">
    <img src="img/rav4.png" alt="Rav4">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
		 <p>$price</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3mins ago</small>
    </div>
  </div>
  <div class="card">
     <img src="img/rav4.png" alt="Rav4">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
	 <p>$price</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">Last updated 3 mins ago</small>
    </div>
  </div>
</div>
	</div>


	<!-- Footer -->
 <footer class="page-footer font-small unique-color-dark pt-4">

  <!-- Footer Elements -->
  <div class="container">

 	 <!-- Call to action -->
 	 <ul class="list-unstyled list-inline text-center py-2">
 		 <li class="list-inline-item">
 			 <h5 class="mb-1">Register for free</h5>
 		 </li>
 		 <li class="list-inline-item">
 			 <a href="#!" class="btn btn-outline-white btn-rounded">Sign up!</a>
 		 </li>
 	 </ul>
 	 <!-- Call to action -->

  </div>
  <!-- Footer Elements -->

  <div class="footer-copyright text-center py-3">© 2019 Copyright:
 	 <a href="#"> realdeal.com</a>
  </div>

 </footer>
 <!-- end of Footer -->
</div>

 <!-- end of main content -->





</body>

</html>
