<?php
session_start();
include 'connection.php';
$link = connect();
$user = $_SESSION['user_ID'];
if($_SESSION['name'] == ""){
      header('location:index.php');
 }
?>
    <html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type = "text/css" href = "search.css">
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
					<li><a href = "#">Speakers</a></li>
					<li><a href = "#">Accessories</a></li>
					<li><a href = "#">Contact Us</a></li>
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
<?php

    if(isset($_POST['search_btn'])){
         $search = mysqli_real_escape_string($link,$_POST['search']);
         
         $sql = "SELECT * FROM product WHERE p_name LIKE '%$search%'";
         $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) == 0){
                    echo "<h1>Nothing to Show</h1>";
                }
         else{       
             while($row = mysqli_fetch_assoc($result)){
                        $id = $row['productID'];
                        $desc = $row['description'];
                        $name = $row['p_name'];
                        $price = $row['price'];
                        $shipping = $row['shipping'];
                        $img = $row['img'];
                ?>
                    
                   
                        
                <div class = 'row'>
			        <div class = 'col-lg-2'></div>
			        <div class = 'col-lg-8'>
			            <div class = "row">
			                <div class = "box">
			                    <div class = "col-lg-4">
			                <img src = "<?php echo $img ?>" class = 'img-responsive'>
			                    </div>
			                 <div class = "col-lg-4">   
			                    <h1 style = color:blue;><h1 class = 'title_name'>
			                    <?php echo $name ?> </h1> 
			                    <p class = "someimg"><?php echo $desc ?></p>
			                    <a class = "decorate_a" href = "cart_confirm.php?add= <?php echo $row['productID']; ?>">Explore</a>
			                 </div>
			              </div>
			            </div>
			         </div>
			     </div>
			     <br><br>
			
                    </body>
                </html>
                <?php
            }
         }
    }
    mysqli_close($link);
?>

