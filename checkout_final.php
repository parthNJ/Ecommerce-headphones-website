<?php
session_start();
include'connection.php';
$link = connect();
$user = $_SESSION['user_ID'];
if($_SESSION['name'] == ""){
      header('location:index.php');
 }
?>
<html>
<head>
    <title>Address</title>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel = "stylesheet" href = "checkout_final.css" type = "text/css">
</head>
<body>
    <div class = "row">
        <div class = "col-lg-2"></div>
        <div class = "col-lg-8">
            <div class = "row">
                <div class = "col-lg-2"></div>
                <div class = "col-lg-8">
                    <div class = "box">
                        <form class="form-address" method = "post" action = "order_confirm.php">
    <h2 style = "text-align:center;"><b>Send your items to</b></h2>
    <!-- Search Field -->
    <div class="flex-container c-1column colo_chng" id="locationField">
      <label class = "lable_txt"><b>Address/apt#</b></label>
      <input class="flex-item" id="autocomplete"  type="text" name = "street" required></input>
    </div>
    <!-- City -->
    <div class="flex-container">
      <label class = "lable_txt"><b>City</b></label>
      <input type = "text" class="flex-item c-1column" name = "city" required></input>
    </div>

    <!-- State & Zip -->
    <div class="flex-container">
      <div class="flex-item c-2column">
        <label class = "lable_txt"><b>State</b></label>
        <select name="state" class = "flex-item c-1column" style = "height:35px;">
            <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
        </select>
      </div>
      <div class="flex-item c-2column">
        <label class = "lable_txt"><b>Zip code</b></label>
        <input type = "text" name = "zip" required ></input>
      </div>
    </div>

    <!-- Country -->
    <div class="flex-container">
      <label class = "lable_txt"><b>Country</b></label>
      <select name="country" style = "height:45px;" >
            <option value="United States">United States of America</option>
        </select>
    </div>
    <h2 style = "text-align:center;"><b>Payment Information</b></h2>
    
    <div class="flex-container">
      <label class = "lable_txt"><b>Card Number</b></label>
      <input type = "text" class="flex-item c-1column" disabled ></input>
    </div>
    
    <div class="flex-container">
      <div class="flex-item c-2column">
        <label class = "lable_txt"><b>MM/YY</b></label>
        <input type = "text" disabled ></input>
      </div>
      <div class="flex-item c-2column">
        <label class = "lable_txt"><b>CVV</b></label>
        <input type = "text" disabled></input>
      </div>
    </div>
  
      <h2 style = "text-align:center;">Your Item(s) <a href = "checkout.php">EDIT</a></h2>  
  
  <table class = "table">
      <thead>
          <th>Item</th>
          <th>Quantity</th>
          <th>Total</th>
      </thead>
      
      <?php 
      if(isset($_POST['checkout_btn'])){
         
        $sql= "SELECT shoppingcart.quantity, shoppingcart.itemID, shoppingcart .price, shoppingcart.shipping, shoppingcart.total, product.p_name,   product.img
	         FROM product
	         INNER JOIN shoppingcart 
	         ON product.productID=shoppingcart.itemID 
	         WHERE shoppingcart.userID = '$user'";
	         
	          $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) == 0){
                    echo "<h1>You have nothing in Cart</h1>";
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        $add += $row['total'];
                    ?>
                    <tr>
                      <td><img src = "<?php echo $row['img']; ?>" class = " table_img"></td>
                      <td><?php echo $row['quantity']; ?></td>
			          <td>$<?php echo $row['total']; ?> </td>
			         </tr>
			<?php
                    }
                }
                mysqli_close($link);
     }
      ?>
  </table>
  <h2 style = "color:red;" class = "total">Your Total is: $<?php echo $add; ?> </h2>
    <div class = "total">
        <button input type ="text" name = "btn_go">Place Order</button>
    </div>
    </form>
                    </div>
                </div>        
            </div>
        </div>
    </div>
   
</body>
</html>