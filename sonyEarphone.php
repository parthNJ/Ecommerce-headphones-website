<?php
 require'cart.php';
 session_start();
 if($_SESSION['name'] == ""){
      header('location:index.php');
 }
 ?>     

<html>
<head>
<title>Sony</title>
		 <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type = "text/css" href = "beats.css">
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
		    <div>
		        <img src = "https://s.aolcdn.com/hss/storage/midas/7585e60307cae2c9edc239e03947350f/204919535/sonycans.jpg" 
		        class = "img-responsive " width=1380px;>
		        <h1 class = "headLogo">Sony</h1>
		        <h3 class = "headLogo_2">Earphone</h3>
		    </div>
		    <h1 style="text-align:center;" class = "top_prod">Sony top Products</h1>
		    
		    <br><br><br><br> 
		<?php
		     sonyEarphone();
		?>
</body>
</html>