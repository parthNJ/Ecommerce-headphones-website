<?php
session_start();
include'connection.php';
$link = connect();
if($_SESSION['name'] == ""){
      header('location:index.php');
 }
?>
<html>
    <head>
      <title>Employee</title>  
      <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel = "stylesheet" href = "employee_login.css" type = "text/css">
    </head>
    
    <body>
        <div class = "move">
            <h1>ICON Employee Page -<?php echo $_SESSION['name']; ?></h1>
            <a href = "index.php">Logout</a>
            <br>
        </div>
        <div class = "row">
            <div class = "col-lg-2"></div>
            <div class = "col-lg-8">
                <div class = "row">
                    <div class = "col-lg-1"></div>
                        <div class = "box">
                            <table class = "table table-dark">
                                 <thead>
                                    <th >UserID</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Paid</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>zip</th>
                                    <th>Submit</th>
                                 </thead>
                                 
                                 <?php
                                 //Display the paid orders from users
                                 $sql = "SELECT * FROM orders WHERE sendOrder = 0";
                                  $result = mysqli_query($link, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $orderid = $row['orderID'];
                                        $userid = $row['userID'];
                                        $name = $row['name'];
                                        $quantity = $row['quantity'];
                                        $paid = $row['paid'];
                                        $street = $row['street'];
                                        $city = $row['city'];
                                        $state = $row['state'];
                                        $zip = $row['zip'];
                                 ?>
                                 <tr>
                                    <td><?php echo $userid  ?></td>
                                    <td><?php echo $name  ?></td>
                                    <td><?php echo $quantity  ?></td>
                                    <td><?php echo $paid  ?></td>
                                    <td><?php echo $street  ?></td>
                                    <td><?php echo $city  ?></td>
                                    <td><?php echo $state  ?></td>
                                    <td><?php echo $zip  ?></td>
                                    <form method="post">
                                    <td>
                                      <a href = "employee_login.php?send= <?php echo $row['orderID']; ?>">Send Item</a>
                                     </td>
                                 </tr>
                                 <?php
                                    }
                                    	if(isset($_GET['send'])){
			                                $x = ((int)$_GET['send']);
			                                //When the button is clicked update to the order table to say that the order has been sent for the user.
			                                
			                                $sql = "UPDATE orders SET sendOrder=1 WHERE orderID = '$x'";
			                               mysqli_query($link, $sql);
                                    	}
                                     mysqli_close($link);
                                 ?>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>