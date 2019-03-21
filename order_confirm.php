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

		<link rel="stylesheet" type = "text/css" href = "order_confirm.css">
    </head>
    <body>
        <div class = "box">


<?php
 if(isset($_POST['btn_go'])){

         $sql = "SELECT * FROM shoppingcart WHERE userID = '$user'";

         $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) == 0){
                    echo "<h1>You have nothing in Cart</h1>";
                }
         else{
        $street = mysqli_real_escape_string($link,$_POST['street']);
	    $city = mysqli_real_escape_string($link,$_POST['city']);
		$state = mysqli_real_escape_string($link,$_POST['state']);
		$zip = mysqli_real_escape_string($link,$_POST['zip']);
		$country = mysqli_real_escape_string($link,$_POST['country']);

        $sql3 = "SELECT shoppingcart.quantity, shoppingcart.itemID, shoppingcart.price, shoppingcart.shipping, shoppingcart.total, product.p_name
	                FROM product
	                INNER JOIN shoppingcart
	                ON product.productID=shoppingcart.itemID
	                WHERE shoppingcart.userID = '$user'";
        $result = mysqli_query($link, $sql3);

        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                        $quantity = $row['quantity'];
                        $item = $row['itemID'];
                        $name = $row['p_name'];
                        $total = $row['total'];

      $sql4 = "INSERT INTO orders (itemID, userID, name, quantity, paid, street, city, state, zip, country, sendOrder) VALUES ('$item', '$user', '$name', '$quantity', '$total', '$street', '$city', '$state', '$zip', '$country','0')";
                mysqli_query($link, $sql4);
            }
        }




        $sql5 = "DELETE FROM shoppingcart WHERE userID = '$user'";
            mysqli_query($link, $sql5);

        echo "<h1>Your order has been placed. Thank you for shopping at ICON</h1>";


         }
       mysqli_close($link);
 }
?>
    <div class = "center_flo">
        <a href = "home.php">Back to Shopping</a><br>
        <a href = "user_order.php">My Orders</a><br>
        <a href = "index.php">Logout</a>
    </div>
        </div>
    </body>
</html>
