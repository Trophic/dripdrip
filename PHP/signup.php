<html>
<head>
	<meta charset="utf-8"/> <!-- utf-8 is a standard character encoding -->
	<meta name="robots" content="noindex"/> <!-- blocks search indexing https://support.google.com/webmasters/answer/93710?hl=en -->
	<title>Title: Sign Up</title> <!-- the title of our site -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/> <!-- gives our site a non static view https://www.w3schools.com/css/css_rwd_viewport.asp -->
	<link href="style.css" rel="stylesheet" type="text/css"> <!-- links html to our master.css stylesheet -->
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <!-- intializes bootstrap framework -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> <!-- intializes angularjs -->
</head>
<body ng-app="postLogin" ng-controller="PostController as postCtrl" >
  <div class="content-box" id="login-panel">
   		<img src="assets/images/bitmap@3x.png" alt="Science Island" id="science-island-logo"/>
		<div class="page" id="login"> <!-- followed this tutorial http://www.c-sharpcorner.com/article/create-a-login-form-validation-using-php-and-wamp-xampp/ -->
			<form action="" method="POST"id="createAccount"> <!-- registration form -->
					<legend><h1>Sign up</h1>
				<fieldset>
					<p class="body-copy-small">Username:</p> <input type="text" name="user"><br /> <!-- Username creation -->
					<p class="body-copy-small">Email:</p><input type="email" name="email"><br /> <!-- Email creation -->
					<p class="body-copy-small">Password:</p> <input type="password" name="pass"><br /> <!-- Password creation -->
					<!-- Validation goes here -->
					<input class="button-primary" type="submit" value="Register" name="submit" /> <!-- submit button -->
				</fieldset>
				</legend>
				<a class="body-copy-small" href="index.php">Return to login</a> <!-- Takes user back to login page -->
			</form>
			<p class="body-copy-small"><?php //PHP begins here
		if(isset($_POST["submit"])){
		if(!empty($_POST['user'])&& !empty($_POST['email'])&& !empty($_POST['pass'])) {
			$user=$_POST['user']; //set $user to the value entered into the username input at line 19
			$email=$_POST['email']; //set $email to the value entered into the email input at line 20
			$pass=$_POST['pass']; //set $pass to the value entered into the password input at line 21

			$con=mysql_connect('localhost','root','root') or die(mysql_error());  //login to local mysql server using the php function mysql_connect('Server','Username','Password')
			mysql_select_db('DATABASE') or die("cannot select DB"); //display error message if server cannot connect to database 'science_island'
			//SQL Query
			$query=mysql_query("SELECT * FROM users WHERE username='".$user."'");
			$numrows=mysql_num_rows($query);
			if($numrows==0)
			{
			$sql="INSERT INTO users(username,email,password) VALUES('$user','$email','$pass')";
			$result=mysql_query($sql);
			if($result){
			echo "Account Successfully Created, Redirecting....";
			// if account creation is succesful redirect browser to main.php in 5 seconds https://stackoverflow.com/questions/6119451/page-redirect-after-certain-time-php
			header("refresh:5;url=main.php");
			} else {
			echo "Failure!";
			}
			} else {
			echo "That username already exists! Please try again with another.";
			}
		} else {
			echo "All fields are required!";
		}
		}
		?></p> <!-- end of PHP -->
		</div>
	</div>
</body>
</html>
