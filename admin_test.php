<?php
session_start();
include 'connection.php';
$link = connect();

if($_SESSION['name'] == ""){
      header('location:index.php');
 }
 
if(isset($_GET['change'])){
    $x = ((int)$_GET['change']);
}
?>

<html>
    <head>
          <title>Admin</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="stylesheet" type = "text/css" href = "admin.css">
    </head>
    <body>
        <h1>Changes</h1>
        <div class = "row">
                <div class = "col-lg-2"></div>
                    <div class = "col-lg-8">
        <table class = "table">
            <form method = "post" action = "#">
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Shipping</th>
                <th>Quantity</th>
                <th>Type</th>
                <th></th>
            </thead>
            
            <?php
                $sql = "SELECT * FROM product WHERE productID = '$x'";
                 $result = mysqli_query($link, $sql);
                             while($row = mysqli_fetch_assoc($result)){
                                 
                                 ?>
                                  <tr>
                    <td><input type = "text" name = "name" value = "<?php echo $row['p_name'] ?>" required></td>
                
                    <td>$<input type = "text" name = "price" value = "<?php echo $row['price'] ?>" required></td>
                
                    <td>$<input type = "text" name = "shipping" value = "<?php echo $row['shipping'] ?>" required></td>
               
                    <td><input type = "text" name = "quantity" value = "<?php echo $row['Quantity'] ?>" required></td>
                
                    <td><input type = "text" name = "type" value = "<?php echo $row['type'] ?>" required></td>
                
                    <td><button type = "submit" name = "btn-sbm">Submit</button></td>
                </tr>
               <?php
            }
            
            if(isset($_POST['btn-sbm'])){
               
                $name = mysqli_real_escape_string($link,$_POST['name']);
                $price = mysqli_real_escape_string($link,$_POST['price']);
                $shipping = mysqli_real_escape_string($link,$_POST['shipping']);
                $quantity = mysqli_real_escape_string($link,$_POST['quantity']);
                $type = mysqli_real_escape_string($link,$_POST['type']);
                $sql = "UPDATE product SET p_name = '$name', price = '$price', shipping = '$shipping', Quantity = '$quantity', type='$type' WHERE productID = '$x'";
                mysqli_query($link, $sql);
                echo "<h1>Succefully Added</h1>";
            }
            
            ?>
               
         </div>
         </div>
         </form>
        </table>
        <a href = "admin.php">Go back</a>
    </body>
</html>