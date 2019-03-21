<?php
session_start();
session_destroy();
?>
<html>
	<head>
	 <!-- Alot of bootstrap stuff -->
	    <title>Login</title>
	     <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
		 </script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
		</script>
		<link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
		<link rel="stylesheet"  href="index.css" media="Screen" type = "text/css" >
	</head>
	<body background="http://4.bp.blogspot.com/-J01L-VTcVJg/T-LtAxjueBI/AAAAAAAAE4M/svIRkrh_Cag/s1600/Disc+Jokie+Headphones+Wallpapers.jpg">
	    <div class="container">
<!-- Box for Loggin in input -->
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>Welcome to ICON</b></h1>
            <div class="account-wall">
                <img class="profile-img" src="https://cdn1.iconfinder.com/data/icons/instagram-ui-glyph/48/Sed-01-512.png?sz=120"
                    alt="head">
                <form method = "post" action = "server.php" class="form-signin">
                    <input type="text" name = "email"class="form-control" placeholder="Email" required autofocus>
                    <input type="password" name = "password" class="form-control" placeholder="Password" required>
                    <select name = "type" class = "form-control" required>
                        <option class = "form-control">Select Type</option>
                        <option value = "0">User</option>
                        <option value = "1">Employee</option>
                        <option value = "2">Admin</option>
                    </select>
                    <button type="submit" name = "login_btn" class="btn btn-lg btn-primary btn-block" >
                        Sign in
                    </button>
                    <a href="register.php" class="text-center new-account">Create an account </a>
                     </div>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>