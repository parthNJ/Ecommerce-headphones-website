<?php
session_start();
 function connect(){
        $hostname = "Localhost";
	    $username = "patelp94_parth";
	    $password = "baseballsucks1";
	    $dbname ="patelp94_testDB";
	    
	    static $link;
	    $link = mysqli_connect($hostname, $username, $password, $dbname);
		 
		 if($link === false){
	        echo "Error cannot connect to DB";
	    }
	   return $link;
        }
?>