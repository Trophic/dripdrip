<html>
<head>
	<meta charset="utf-8"/> <!-- utf-8 is a standard character encoding -->
	<meta name="robots" content="noindex"/> <!-- blocks search indexing https://support.google.com/webmasters/answer/93710?hl=en -->
	<title>Title: Login</title> <!-- the title of our site -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/> <!-- gives our site a non static view https://www.w3schools.com/css/css_rwd_viewport.asp -->
	<link href="./assets/css/master.css" rel="stylesheet" type="text/css"> <!-- links html to our master.css stylesheet -->
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <!-- intializes bootstrap framework -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> <!-- intializes angularjs -->
</head>
<body ng-app="postLogin" ng-controller="PostController as postCtrl" >
  <div class="ui-frame" id="login-panel">
		<div class="ui-paper" id="login">
    <h1>Login & Play</h1>
			<form name="login" action="" method="POST"> <!-- Login form -->
				<div class="field"> <!-- Username -->
					<p class="small-p field-title"> Username </p> <!-- Usernames from table users -->
					<input type="text" name="user" ng-focus="RemoveErrorMessage()" required autofocus ng-model="postCtrl.inputData.username"/> <!-- input box that takes text and names it 'user' -->
				</div>
				<div class="field"> <!-- Password -->
					<p class="small-p field-title"> Password </p>
					<input type="password" name="pass" ng-focus="RemoveErrorMessage()" required ng-model="postCtrl.inputData.password"/> <!-- input box that takes text and names it 'pass' -->
        </div>
				<!-- Validation goes here -->
        <input class="button-primary" type="submit" value="Login" name="submit"> <!-- submitt button -->
			</form>
	<?php //followed this tutorial http://www.c-sharpcorner.com/article/create-a-login-form-validation-using-php-and-wamp-xampp/
	if(isset($_POST["submit"])){ //Submit inputs from html form
		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
			$user=$_POST['user']; //set $user to the value entered into the username input at line 19
			$pass=$_POST['pass']; //set $pass to the value entered into the password input at line 23

			$con=mysql_connect('localhost','root','root') or die(mysql_error()); //login to local mysql server using the php function mysql_connect('Server','Username','Password')
			mysql_select_db('DATABASE') or die("cannot select DB"); //display error message if server canoot connect to database 'science_island'
			//SQL Query
			$query=mysql_query("SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");
			$numrows=mysql_num_rows($query);
			if($numrows!=0)
				{
			while($row=mysql_fetch_assoc($query))
					{
			$dbusername=$row['username'];
			$dbpassword=$row['password'];
					}
					if($user == $dbusername && $pass == $dbpassword)
					{
			session_start();
			$_SESSION['sess_user']=$user;
			// Redirect browser
			header("Location: main.php");
					}
				} else {
			echo "Invalid username or password!";
				}
			} else {
						echo "All fields are required!";
				}
			}
	?> <!-- end of PHP -->
        <p class="help-text">Don’t have an account? <a href="signup.php" class="bold">Sign up</a></p> <!-- link to signup form -->
				<p class="help-text">Forgot your password? <a href="recover.php" class="bold">Click here</a></p> <!-- link to password recovery form -->
		</div>
    <button class="secondary rollOver pressedDown" type="button" name="login" id="login-play-button" ng-click="BypassLogin()"><h3>Play without logging in</h3></button> <!-- Parents can play without logging in -->
	</div>
  <script src="app.js"></script>
</body>
</html>
