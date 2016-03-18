<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	
		if (isset($_POST['submit'])) {

			//Check they entered the correct username/password
			$stmt = $pdo->prepare('SELECT * FROM admins WHERE ad_username = :username AND ad_pw = :password');
			
				$criteria = [
				 'username' => $_POST['username'],
				 'password' => $_POST['password']
				];
			
			$stmt->execute($criteria);

		if ($stmt->rowCount() > 0) {
			$_SESSION['loggedin'] = true;
			echo 'You are now logged in';
		}
		else {
			echo 'Sorry, your username and password could not be found';
		}
	}
?>
<html>
	<body>
		<div class="wrapper">

			<div class="content">

				<form method="POST">
					<label>Username:</label>
					<input type="text" name="username"/>
					<label>Password:</label>
					<input type="password" name="password"/>
					<input type="submit" name="submit" value="Log In"/>
				</form>

			</div>
			<?php require 'footer.php';?>
		</div>
	</body>
<html>