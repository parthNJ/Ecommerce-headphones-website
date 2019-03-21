<?php
//Connection information
session_start();
include 'connection.php';
$link = connect();
 if($_SESSION['name'] == ""){
      header('location:index.php');
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
            <h1>$ Welcome BOSS man $</h1>
            <div class = "move_a">
                <a href = "index.php">Logout</a>
            </div>
            <div class = "row">
                <div class = "col-lg-2"></div>
                    <div class = "col-lg-8">
                    <table class = "table">
                        
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Shipping</th>
                            <th>Quantity</th>
                            <th>Type</th>
                            <th>Change</th>
                            <th>Remove</th>
                        </thead>
                        
                        <?php 
                        
                        
                         $sql = "SELECT * FROM product";
                        $result = mysqli_query($link, $sql);
                             while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['productID'];
                                    $name = $row['p_name'];
                                    $imgs = $row['img'];
                                    $price = number_format($row['price'], 2);
                                    $quan = $row['Quantity'];
                                    $shipping = number_format($row['shipping'], 2);
                                    $type = $row['type'];
                                 ?>
                        <tr>
                            <td><?php echo $name?></td>
                            <td>
                                <?php echo $price?>
                            </td>
                            <td><?php echo $shipping?></td>
                            <td><?php echo $quan ?></td>
                            <td><?php echo $type ?></td>
                            <td>
                                <a href="admin_test.php?change= <?php echo $row['productID']; ?>"
                                    >edit
                                </a>
                            </td>
                            <td>
                                <a href="admin_test.php?remov= <?php echo $row['productID']; ?>"
                                    >remove
                                </a>
                            </td>
                        </tr>
                        
                    

        <?php
     }
?>
</table>
<hr>
<?php
     	 $sql = "SELECT * FROM orders";
            $result = mysqli_query($link, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $add += $row['paid'];
                    $add2 += $row['sendOrder'];
                    
                }
                echo "<div class = 'move_a'><h2>Quarter 1 revenue</h2>"."<h3 class = 'col_change'>$".$add."</div></h3>";
                    
                echo "<div class = 'move_a'><h2>Quarter 1 Items Sold</h2>";
                    echo "<h3 class = 'col_change'>".$add2."</div></h3>";
    mysqli_close($link);
?>
                    </div>
            </div>
    </body>
</html>