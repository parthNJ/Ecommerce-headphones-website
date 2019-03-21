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
        <title>Shopping Cart</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type = "text/css" href = "checkout.css">
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
			
		    
		        
		        
		            
		              
		                    <h1><?php echo $_SESSION['name']; ?>'s shopping cart</h1>
		                
            <table class = "table table-striped">
                <form method = "post">
	            <thead class = "thead-dark">
	        	<tr>
	        	    <th></th>
			        <th>Item Name</th>
			        <th>Price</th>
			        <th>Shipping</th>
			        <th>Quantity</th>
			        <th>Total</th>
			        <th></th>
			        <th></th>
			        <th></th>
			      
		        </tr>
	            </thead>
			 <?php
///////////////////////////////////////////////////////////////////////////
///////////UPDATE Cart quantity when adding more quantity//////////////////
			if(isset($_GET['add'])){
			     $x = ((int)$_GET['add']);
			     //retrieve the total item quantity form product table
			     $sql5 = "SELECT Quantity FROM product WHERE productID = '$x'";
			                $result5 = mysqli_query($link, $sql5);
			                if(mysqli_num_rows($result5)){
			                     while($row5 = mysqli_fetch_assoc($result5)){
			                         $total_quantity =  $row5['Quantity'];
			                         
			                     }
			                 }
			     //retrieve curremt data of shoppingcart for later update. 
			     $sql3 = "SELECT quantity, price, total 
	                FROM shoppingcart
	                WHERE userID = '$user' and itemID = '$x'";;
			      $result3 = mysqli_query($link, $sql3);
			       if(mysqli_num_rows($result3)){
			           while($row3 = mysqli_fetch_assoc($result3)){
			               $current_quantity =  $row3['quantity'];
			               $current_total =  $row3['total'];
			               $price = $row3['price']; 
			               $new_quantity = $current_quantity+1;
			               $new_total = $current_total + $price;
			               $new_quantity_product_add = $total_quantity - 1;
			                
			           }
			       }
			      if($new_quantity_product_add > 1){
			      $updateQuantityShoppingcart = "UPDATE shoppingcart SET quantity = '$new_quantity', total = '$new_total' WHERE itemID = '$x' AND userID = '$user'";
			      mysqli_query($link, $updateQuantityShoppingcart);
			      
			      $sql7 = "UPDATE product SET Quantity = '$new_quantity_product_add' WHERE productID = '$x'";
			      mysqli_query($link, $sql7);
			      }
			      else{
			          echo "<h1>sorry, no more in stock</h1>";
			      }
			 }
			 
			 
/////////////////////////////////////////////////////////////////////////////
////Remove ITEM from Cart///////////////////		 
			 if(isset($_GET['remove'])){
			     $x = ((int)$_GET['remove']);
			     //retrieve the total item quantity form product table
			     $sql5 = "SELECT Quantity FROM product WHERE productID = '$x'";
			                $result5 = mysqli_query($link, $sql5);
			                if(mysqli_num_rows($result5)){
			                     while($row5 = mysqli_fetch_assoc($result5)){
			                         $total_quantity =  $row5['Quantity'];
			                         
			                     }
			                 }
			     //retrieve curremt data of shoppingcart for later update. 
			     $sql3 = "SELECT quantity, price, total 
	                FROM shoppingcart
	                WHERE userID = '$user' and itemID = '$x'";;
			      $result3 = mysqli_query($link, $sql3);
			       if(mysqli_num_rows($result3)){
			           while($row3 = mysqli_fetch_assoc($result3)){
			               $current_quantity =  $row3['quantity'];
			               $current_total =  $row3['total'];
			               $price = $row3['price']; 
			               $new_quantity = $current_quantity-1;
			               $new_total = $current_total - $price;
			               $new_quantity_product_remove = $total_quantity + 1;
			               
			           }
			       }
			      if($new_quantity > 0){
			      $updateQuantityShoppingcart = "UPDATE shoppingcart SET quantity = '$new_quantity', total = '$new_total' WHERE itemID = '$x' AND userID = '$user'";
			      mysqli_query($link, $updateQuantityShoppingcart);
			      
			      $sql7 = "UPDATE product SET Quantity = '$new_quantity_product_remove' WHERE productID = '$x'";
			      mysqli_query($link, $sql7);
			      }
			      else{
			          $sql8 = "DELETE FROM shoppingcart WHERE userID = '$user' AND itemID = '$x'";
			      mysqli_query($link, $sql8);
			      }
			 }
			 
			 
			 
			 
//////////////////////////////////////////////////////////////////////////			 
			 if(isset($_GET['delete'])){
			     $x = ((int)$_GET['delete']);
			     //retrieve the total item quantity form product table
			     $sql5 = "SELECT Quantity FROM product WHERE productID = '$x'";
			                $result5 = mysqli_query($link, $sql5);
			                if(mysqli_num_rows($result5)){
			                     while($row5 = mysqli_fetch_assoc($result5)){
			                         $total_quantity =  $row5['Quantity'];
			                         
			                     }
			                 }
			     //retrieve curremt data of shoppingcart for later update. 
			     $sql3 = "SELECT quantity, price, total 
	                FROM shoppingcart
	                WHERE userID = '$user' and itemID = '$x'";;
			      $result3 = mysqli_query($link, $sql3);
			       if(mysqli_num_rows($result3)){
			           while($row3 = mysqli_fetch_assoc($result3)){
			               $current_quantity =  $row3['quantity'];
			               $current_total =  $row3['total'];
			               $price = $row3['price']; 
			               $new_total = $current_total - ($price * $current_quantity);
			               $new_quantity_product_delete = $total_quantity + $current_quantity;
			               
			           }
			       }
			      if($current_quantity >= 1){
			      $deleteItem = "DELETE FROM shoppingcart WHERE itemID = '$x' AND userID = '$user'";
			      mysqli_query($link, $deleteItem);
			      
			      $sql7 = "UPDATE product SET Quantity = '$new_quantity_product_delete' WHERE productID = '$x'";
			      mysqli_query($link, $sql7);
			      }
			      
			 }
			
			 
			 
	        
	           $sql= "SELECT shoppingcart.quantity, shoppingcart.itemID, shoppingcart.price, shoppingcart.shipping, shoppingcart.total, product.p_name, product.img
	                FROM product
	                INNER JOIN shoppingcart 
	                ON product.productID=shoppingcart.itemID 
	                WHERE shoppingcart.userID = '$user'";
	           
	            $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) == 0){
                    echo "<h1>You have nothing in cart</h1>";
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        $add += $row['total'];
                        
                    ?>
                      <td><img src = "<?php echo $row['img']; ?>" class = " table_img"></td>
                      <td><?php echo $row['p_name']; ?></td>
			          <td>$<?php echo $row['price']; ?> </td>
			          <td>$<?php echo $row['shipping']; ?> </td>
			          <td><?php echo $row['quantity']; ?> </td>
			          <td>$<?php echo $row['total']; ?> </td>
			          <td> 
			          <div class = "cola">
			          <a href = "checkout.php?add= <?php echo $row['itemID']; ?>"><span class = "glyphicon glyphicon-plus"></span></a>
			          </div>
			          </td>
			          <td>
			              <a href = "checkout.php?remove= <?php echo $row['itemID']; ?>"><span class = "glyphicon glyphicon-minus"></span></a>
			          </td>
			          <td>
			              <a href = "checkout.php?delete= <?php echo $row['itemID']; ?>">[Delete]</a>
			          </td>
			 </tr>
			 <?php
	}              
                }
                
	?>
    </table>
    </form>
    
    
      <?php
      
          echo "<div class = 'move_right'><h2>Total is: $".$add."
          <form method='post' action = 'checkout_final.php'>
            <button type = 'submit' name = 'checkout_btn' class = 'checkout_btn_'>Checkout</button><Br>
          </form><div>";
          mysqli_close($link);
   ?>
</body>
</html>