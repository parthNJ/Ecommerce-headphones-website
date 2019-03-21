<?php
session_start();
 function connect(){
        $hostname = "Localhost";
	    $username = "Your Username";
	    $password = "Your password";
	    $dbname ="Your databaseNAME";
	    
	    static $link;
	    $link = mysqli_connect($hostname, $username, $password, $dbname);
		 
		 if($link === false){
	        echo "Error cannot connect to DB";
	    }
	   return $link;
        }
?>
