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
				header("Location: attendance.php");
			}
			
		elseif (isset($_POST['submit'])) {
			
			$check = $pdo->prepare('SELECT * FROM students WHERE username = :username AND password = :password');
			
				$criteria = [
				 'username' => $_POST['username'],
				 'password' => $_POST['password']
				];
				
			$check->execute($criteria);
			
			if ($check->rowCount() > 0) {
				$user = $check->fetch();
				$_SESSION['Sloggedin'] = true;
				$_SESSION['s_id'] = $user['student_id'];
				header("Location: index.php");
			}
			else {
				echo 'Sorry, your username or password was incorrect';
			}	
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