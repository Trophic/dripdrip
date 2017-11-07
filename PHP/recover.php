<html>
<head>
	<meta charset="utf-8"/> <!-- utf-8 is a standard character encoding -->
	<meta name="robots" content="noindex"/> <!-- blocks search indexing https://support.google.com/webmasters/answer/93710?hl=en -->
	<title>Title: Password recovery</title> <!-- the title of the page -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/> <!-- gives our site a non static view https://www.w3schools.com/css/css_rwd_viewport.asp -->
	<link href="./assets/css/master.css" rel="stylesheet" type="text/css"> <!-- links html to our master.css stylesheet -->
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> <!-- intializes bootstrap framework -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> <!-- intializes angularjs -->
</head>
<body ng-app="postLogin" ng-controller="PostController as postCtrl" >
  <div class="ui-frame" id="login-panel">
		<div class="ui-paper" id="login">
    <h1>Password reset</h1>
			<form name="reset" action="" method="POST"> <!-- Reset form -->
				<div class="field"> <!-- Email -->
					<p class="small-p field-title"> Email: </p> <!-- Email from table users -->
					<input type="text" name="email" ng-focus="RemoveErrorMessage()" required autofocus ng-model="postCtrl.inputData.username"/> <!-- input box that takes text and names it 'email' -->
				</div>
				<!-- Validation goes here -->
        <input class="button-primary" type="submit" value="reset" name="submit"> <!-- submit button -->
			</form>
	<?php //followed this tutorial http://www.c-sharpcorner.com/article/create-a-login-form-validation-using-php-and-wamp-xampp/
	if(isset($_POST["submit"])){ //Submit inputs from html form
		if (!empty($_POST['email'])){
			$email=$_POST['email']; //set $user to the value entered into the username input at line 19

			$con=mysql_connect('localhost','root','root') or die(mysql_error()); //login to local mysql server using the php function mysql_connect('Server','Username','Password')
			mysql_select_db('DATABASE') or die("cannot select DB"); //display error message if server canoot connect to database 'science_island'
			//SQL Query
			$query=mysql_query("SELECT * FROM users WHERE email='$email'");
			$numrows=mysql_num_rows($query);
			if($numrows!=0)
				{
			while($row=mysql_fetch_assoc($query))
					{
			$dbemail=$row['email'];
			$password="randompassword";
					}
					if($email == $dbemail)
					{
			$to      = $email; // ttps://stackoverflow.com/questions/5335273/how-to-send-an-email-using-php
			$subject = 'Your Science Island password';
			$message = "Whoops, you seem to have forgotten your password! \n Here it is: $password \n Science Island Team";
			$headers = 'From: team@scienceisland.com' . "\r\n" .
			    'Reply-To: team@scienceisland.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers); //php mail structure http://php.net/manual/en/function.mail.php
			echo "<p>" . $to . "</p>","<p>" . $subject . "</p>","<p>" . $message . "</p>","<p>" . $headers . "</p>"; //test
			echo 'Success! You will recieve an email shortly!'; //confirmation message
					}
				} else {
			echo 'That e-mail address does not exist.'; //failure message
				}
			} else {
			echo 'Enter your account email'; // if empty
		}
	}
	?> <!-- end of PHP -->
        <p class="help-text">Don’t have an account? <a href="signup.php" class="bold">Sign up</a></p> <!-- link to signup form -->
		</div>
    <button class="secondary rollOver pressedDown" type="button" name="login" id="login-play-button" ng-click="BypassLogin()"><h3>Play without logging in<p></button> <!-- Parents can play without logging in -->
	</div>
  <script src="app.js"></script>
</body>
</html>
