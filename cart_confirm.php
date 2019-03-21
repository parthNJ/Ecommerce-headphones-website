<?php
session_start();
include 'connection.php';
$link = connect();
if($_SESSION['name'] == ""){
      header('location:index.php');
 }
/////////////////////////////////////////////////////
//when the explore button is clicked, select the product the user selected
if(isset($_GET['add'])){
    $x = ((int)$_GET['add']);
    $sql2 = "SELECT p_name, price, description, Quantity, img, shipping FROM product WHERE productID ='$x'";
    $result = mysqli_query($link, $sql2);
    if(mysqli_num_rows($result) == 1){
	   while($row = mysqli_fetch_assoc($result)){
	        $imgs = $row["img"];
	        $description = $row["description"];
            $name = $row["p_name"];
            $price = $row["price"];
            $Quantity = $row["Quantity"];
	        $_SESSION['Quantity'] = $Quantity;
            $shipping = $row["shipping"];
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
		<link rel="stylesheet" type = "text/css" href = "cart_confirm.css">
	            
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
	   <div class = "row">
		<div class = 'col-lg-2'></div>
			<div class = "col-lg-8">
			<div class = "row">
				<div class = "box_1">
					<div class = 'col-lg-1'></div>
					<div class = 'col-lg-6'>
						<img src = "<?php echo $imgs ?>">
					</div>
					<div class = "col-lg-4">
						<h1><?php echo $name ?></h1>
						<h4><?php echo $description ?></h4>
						<h3 >Price: $<?php echo $price ?></h3>
						<h3>Shipping: $<?php echo $shipping ?></h3>
						<form method = "post" action = "">
						<input  type = "text" name = "quantity" placeholder="Quantity"></input>
						<button type = "submit" class = "btclass" name = "go">ADD</button>
						</form>
						<a class = "backTO" href = "home.php">
						    Back to Shopping &nbsp;
						</a>
						<a class = "backTO_3" href = "checkout.php">
						     &nbsp; Shopping Cart
						</a>
					</div>
				</div>
			</div>	
			</div>
		</div>
	   </body>
	   </html>
	   <?php
    }
}
//////////////////////////////////////////////////////
//when the user tries to add the item to their cart, check to make sure there is enough stock
if(isset($_POST['go'])){
    $quan = mysqli_real_escape_string($link,$_POST['quantity']);
    if($quan <= $Quantity){
        $user = $_SESSION['user_ID'];
        $total = ($price * $quan)+$shipping;
        $left_quantity = $Quantity - $quan;
        $sql = "SELECT * FROM shoppingcart WHERE itemID =
        '$x' AND userID = '$user'";
        $result = mysqli_query($link, $sql);
	    if(mysqli_num_rows($result) >= 1){
	        ?>
	        <div class = "row">
	            <div class = "col-lg-4"></div>
	            <div class = "col-lg-4">
	                <h3 class = "backTo_2"> Item already in Cart</h3>
	            </div>
	            <div class = "col-lg-4"></div>
	        </div>
	        <?php
        }
            else {
                //add the item into the user's shoppingcart
                $sql2 = "INSERT INTO shoppingcart 
                (itemID, userID, quantity, price, shipping, total) 
                VALUES 
                ($x,$user,$quan,$price,$shipping,$total)";
                mysqli_query($link, $sql2);
            
                $sql3 = "UPDATE product SET 
                Quantity = $left_quantity
                WHERE productID = $x;";
                mysqli_query($link, $sql3);
            ?>
            <div class = "row">
	            <div class = "col-lg-4"></div>
	            <div class = "col-lg-4">
	                <h3 class = "backTo_2"> Successfully Added</h3>
	                <h3 class = "backTo_2"> Your Total: $
	                    <?php 
	                        echo $total;
	                     ?>
	                </h3>
	            </div>
	            <div class = "col-lg-4"></div>
	        </div>
            <?php
        }
    }
    else{
        echo "<h3 class = 'backTo_2'>sorry, we don't have that many items we have "." $Quantity"."</h3>";
    }
    mysqli_close($link);
}

?>