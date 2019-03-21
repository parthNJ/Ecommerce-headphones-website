<?php
session_start();
require 'server.php';
if($_SESSION['name'] == ""){
      header('location:index.php');
 }


function beats(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 1 AND p_type = 'headphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}


function beatsEarphone(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 1 AND p_type = 'earphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}



function sony(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 3 AND p_type = 'headphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}

function sonyEarphone(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 3 AND p_type = 'earphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}

//SkullCandy//
function skullcandy(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 2 AND p_type = 'headphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}


function skullcandyEarphone(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 2 AND p_type = 'earphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}


///Bose////

function bose(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 4 AND p_type = 'headphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}


function boseearphone(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 4 AND p_type = 'earphone'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}



//speakers///


function speakers(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 6 AND p_type = 'speaker'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}


//accessories//


function accessories(){
$link = connect();
$sql ="SELECT productID, p_name, description, price, img FROM product WHERE type = 7 AND p_type = 'accessory'" ;
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "nothing to display";
}
else{
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['p_name'];
        $desc = $row['description'];
        $imgs = $row['img'];
        $price = number_format($row['price'], 2);
        echo "
        <head>
            <link rel='stylesheet' type = 'text/css' href = 'cart.css'>
        </head>
         <body>
            <div class = 'container-fluid'>
                <div class = 'row back'>
			        <div class = 'col-lg-1'>
			        </div>
			        <div class = 'col-lg-3 another'>
			            <img src = '$imgs' class = 'img-responsive'>
			        </div>".
			        "<div class = 'col-lg-3 another'>
			            <h1 style = color:blue;><h1 class = 'title_name'>$name</h1> 
			            <p class = 'someimg'>".$desc."</p>". 
			            '<a class = "explore" href = "cart_confirm.php?add='.$row['productID'].'">Explore</a>'."
			         </div>'
			     </div>
			     <br><br>
			</div>
        </body>
        <br>
    </html>";
    }
}
mysqli_close($link);
}
?>