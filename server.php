<?php
//Connection information
session_start();
include 'connection.php';
$link = connect();

//REGISTER USER
	if(isset($_POST['register_btn'])){
	    $fname = mysqli_real_escape_string($link, $_POST['fname']);
	    $lname = mysqli_real_escape_string($link,$_POST['lname']);
		$email = mysqli_real_escape_string($link,$_POST['email']);
		$pass = mysqli_real_escape_string($link,$_POST['password']);
		$pass2 = mysqli_real_escape_string($link,$_POST['password2']);
		if($pass != $pass2){
		    echo "Sorry Passwords don't match";
		}
		else{
	    $password = md5($pass);
		$sql = "INSERT INTO user (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

		if(mysqli_query($link, $sql)){
		    header('location:re_login.html');
		}
		else{
		    echo "Error try again";
		}
		}
		mysqli_close($link);
	}


///////////////////////////////////////////////////////
//LOGIN USER
	if(isset($_POST['login_btn'])){
	    $type = mysqli_real_escape_string($link,$_POST['type']);
	    $email = mysqli_real_escape_string($link,$_POST['email']);
		$pass = mysqli_real_escape_string($link,$_POST['password']);
		$password1 = md5($pass);

	    $sql2 = "SELECT * FROM user Where email='$email' AND password='$password1' AND type = '$type'";
	    $result = mysqli_query($link, $sql2);

	    if(mysqli_num_rows($result) == 1){
	        while($row = mysqli_fetch_assoc($result)){
	            if($row['email'] == $email && $row['password']==$password1 && $row['type'] == '0'){
	                 $name = $row["fname"];
	        $_SESSION['name'] = $name;
	        $user_ID = $row["user_ID"];
	        $_SESSION['user_ID'] = $user_ID;
	        $_SESSION['email'] = $email;
	        header('location:home.php');
	            }

	            elseif($row['email'] == $email && $row['password']==$password1 && $row['type'] == '1'){
	        header('location:employee_login.php');
	                $name = $row["fname"];
	        $_SESSION['name'] = $name;
	            }
	            elseif($row['email'] == $email && $row['password']==$password1 && $row['type'] == '2'){
	        header('location:admin.php');
	                $name = $row["fname"];
	        $_SESSION['name'] = $name;
	            }
	        else{
	        echo "<h1>incorrect username and password</h1>";
	        }
	}
}
else{
    echo "<h1>Incorrect username and password</h1>";
}
	 mysqli_close($link);
}
?>
