<?php 
////This page is responsible for showing the history of the user's orders 
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
		<link rel="stylesheet" type = "text/css" href = "user_order.css">
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
            <div class = "col-lg-2"></div>
            <div class = "col-lg-8">
                <div class = "row">
                    <div class = "box">
                        <h1>
                            <?php echo $_SESSION['name']; ?>'s Orders
                            <table class = "table table-dark">
                                 <thead>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                 </thead>
                                  <?php
                                 $sql = "SELECT * FROM orders WHERE userID = '$user'";
                                  $result = mysqli_query($link, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $status = $row['sendOrder'];
                                        $name = $row['name'];
                                        $quantity = $row['quantity'];
                                        $paid = $row['paid'];
                                 ?>
                                 <tr>
                                     <td><?php echo $name  ?></td>
                                    <td><?php echo $quantity  ?></td>
                                    <td><?php echo $paid  ?></td>
                                    <?php
                                        if($status == 1){
                                        echo "<td style = 'color:green;'>Item Has been Sent</td>";
                                        }
                                        else{
                                        echo "<td style = 'color:red;'>Not sent yet</td>";
                                        }
                                    ?>
                                 </tr>
                                 <?php
                                    }
                                 ?>
                            </table>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>