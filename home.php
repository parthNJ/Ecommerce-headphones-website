<?php
 session_start();
 if($_SESSION['name'] == ""){
      header('location:index.php');
 }

 ?>
<html>
    <head>
		<title>Welcome</title>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		
		<link rel="stylesheet" type = "text/css" href = "home.css">
	</head>
	<body>
		<nav class = "navbar navbar-inverse">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<button type = "button" class = "navbar-toggle" data-toggle = "collapse"
					data-target = "#myNavbar">
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
					<a class = "navbar-brand" href = "home.php">Home</a>
				</div>
				<div class = "collapse navbar-collapse" id = "myNavbar">
				<ul class = "nav navbar-nav">
					<li class = "dropdown">
						<a class = "dropdown-toggle" data-toggle="dropdown" 
						href = "#">Headphones<span class = "caret" ></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "beats.php">Beats</a></li>
							<li><a href = "sony.php">Sony</a></li>
							<li><a href = "skullcandy.php">skullCandy</a></li>
							<li><a href = "bose.php">Bose</a></li>
						
						</ul>
					</li>
					<li class = "dropdown">
						<a class = "dropdown-toggle" data-toggle="dropdown"
						href = "#">Earphones<span class = "caret"></span></a>
						<ul class = "dropdown-menu">
							<li><a href = "beatsEarphone.php">Beats</a></li>
							<li><a href = "sonyEarphone.php">Sony</a></li>
							<li><a href = "skullcandyEarphone.php">skullCandy</a></li>
							<li><a href = "boseEarphone.php">Bose</a></li>
							
						</ul>
					</li>
					<li><a href = "speaker.php">Speakers</a></li>
					<li><a href = "accessories.php">Accessories</a></li>
					<li><a href = "contact.php">Contact Us</a></li>
				</ul>
				<form class = "navbar-form navbar-left" method = "post" action = "search.php">
					<div class = "form-group">
						<input class = "form-control" type = "text" name = "search" placeholder="Search">
					</div>
					<button type = "submit" class = "btn btn-default" name="search_btn"><span class = "glyphicon glyphicon-search"></span></button>
				</form>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
					    <a class = "dropdown-toggle" data-toggle="dropdown"  href = "#"><span class = "glyphicon glyphicon-user"></span><?php echo $_SESSION['name']; ?>
					    </a>
					    <ul class = "dropdown-menu">
					        <li><a href = "checkout.php">ShoppingCart</a></li>
					        <li><a href = "user_order.php">Orders</a></li>
					        <li><a href = "index.php">Logout</a></li>
					    </ul>
				    </li>
				</ul>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
		<div class = "row">
			<div class = "col-lg-12">
				<img src = "http://www.picshouse2.com/vb/imgcache/2/33918poster.jpg"
				class = "img-responsive img-three">
				<h1 class = "centered">ICON</h1>
				<p class = "centered-two">"Without music Life would be a mistake"</p>
			</div>
		</div>
		<div class = "row">
			<div class = "col-lg-4">
				<img src="http://q7-rus.ru/photo/1/serye_naushniki_1600x1200.jpg" class="img-responsive img-four">
			</div>
			<div class = "col-lg-4 box">
				<h2><b>Top notch</b></h2>
				<p class = "smaller-par-size">
					At Icon our main goal is to develop an environment for our users to browse through top notch
					headphones and accessories all around.
				</p>
			</div>
			<div class = "col-lg-4">
				<img src="https://c.slashgear.com/wp-content/uploads/2009/02/sony-headphones.jpg" class="img-responsive img-five">
			</div>
		</div>
		<br></br>
		<div class = "shop_at_Icon">
			<h2>Shop @ ICON</h2>
		</div>
		<div class = "row">
			<div class = "col-lg-1"></div>
			<div class = "col-lg-3 another">
				<img src = "https://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/M/QU/MQUF2/MQUF2?wid=572&hei=572&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1502831144597
				" class = "img-responsive image">
				<div class = "overlay">
				    <div class = "text">Beats</div>
				</div>
			</div>
			<div class = "col-lg-3 another">
				<img src = "https://www.staples-3p.com/s7/is/image/Staples/m002947009_sc7?$splssku$
				" class = "img-responsive image">
				<div class = "overlay">
				    <div class = "text">Sony</div>
				</div>
			</div>
			<div class = "col-lg-3 another">
				<img src = "https://cdn8.bigcommerce.com/s-k11cg5mzh9/content/pdp_images/1280x1280_571_2083.jpg
				" class = "img-responsive image">
				<div class = "overlay">
				    <div class = "text">SkullCandy</div>
				</div>
			</div>
			<div class = "col-lg-1"></div>
		</div>
		
		
		
		
		<div class = "product-title">
			<h2>ICON's Top Brands</h2>
		</div>
		<div class = "row">
			<div class = "col-md-4"></div>
			<div class = "col-md-1">
				<img src = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Beats_Electronics_logo.svg/2000px-Beats_Electronics_logo.svg.png
				" class = "img-responsive smaller">
				
			</div>
			<div class = "col-md-1">
				<img src = "http://videogamedude.com/wp-content/uploads/2015/05/skullcandy-logo.png
				" class = "img-responsive smaller">
			</div>
			<div class = "col-md-1">
				<img src = "https://s3.amazonaws.com/freebiesupply/large/2x/apple-logo-transparent.png
				"  class = "img-responsive smaller">
			</div>
			<div class = "col-md-1">
				<img src = "http://assets.stickpng.com/thumbs/5848242ecef1014c0b5e49c8.png
				" class = "img-responsive smaller">
			</div>
			<div class = "col-md-1">
				
			</div>
			<div class = "col-md-1">
			
			</div>
			<div class = "col-md-2"></div>
		</div>
		</div>
	</body>
   
</html>