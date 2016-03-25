<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Area</title>
	</head>
	<body>
		<div class="wrapper">
			
			<div class="content">
			
				<?php require 'vNav.php'; ?>

					<div class="alterStud">
					
						<h4>Add a new Student or Update an existing Student via their Student ID</h4>
					
							<form method="POST">
							
								<label>Student ID</label>
								<input type="text" name="id" required>
								
								<label>First Name</label>
								<input type="text" name="fname" required>

								<label>Surname</label>
								<input type="text" name="sname" required>
								
								<label>Course</label>
								<input type="text" name="course" required>
								
								<label>Type</label>
								<input type="text" name="type" required>
								
								<label>Username</label>
								<input type="text" name="uname" required>
								
								<label>Password</label>
								<input type="password" name="pw" required>
								
								<input type="submit" name ="add" value="Add Student">
								<input type="submit" name ="edit" value="Update Student">
							
							</form>
							
						<h4>Erase a Student via their Student ID</h4>
						
							<form method="POST">
							
								<label>Student ID</label>
								<input type="text" name="delID">
						
								<input type="submit" id="del" name="del" value="Delete Student">
								
							</form>
					</div>

			</div>
			
			<?php require 'footer.php';?>
		</div>
	</body>
</html>
<?php 
	if (isset($_POST['add'])) {
		
		//$password = $_POST['pw'];
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		
		// Prepared statement for adding a Student
		$addStud = $pdo->prepare('INSERT INTO students (student_id, stud_fname, stud_sname, course, type, username, password)
									  VALUES (:student_id, :stud_fname, :stud_sname, :course, :type, :username, :password)');
									  
		//Passes the Input values into the specified fields
		 $criteria = [
					'student_id' => $_POST['id'],
					'stud_fname' => $_POST['fname'],
					'stud_sname' => $_POST['sname'],
					'course' => $_POST['course'],
					'type' => $_POST['type'],
					'username' => $_POST['uname'],
					'password' => $_POST['pw']
			];
		
		//Executes the Statement
		$addStud->execute($criteria);
	}
	
	if (isset($_POST['edit'])) {
	
			//Specifies what information to Update and executes it
			$id = $_POST['id'];
			$newfName = $_POST['fname'];
			$newsName = $_POST['sname'];
			$newcourse = $_POST['course'];
			$newtype = $_POST['type'];
			$newuName = $_POST['uname'];
			$newpw = $_POST['pw'];
			
			//Specifies where to Insert information
			$editStud = $pdo->query('UPDATE students SET stud_fname = "' . $newfName . '",
														stud_sname = "' . $newsName . '",
														course = "' . $newcourse . '",
														type = "' . $newtype . '",
														username = "' . $newuName . '",
														password = "' . $newpw . '"
														WHERE student_id = "' . $id . '"');
		}
		
	if (isset($_POST['del'])) {
		
			//Stores the User Input value
			$id = $_POST['delID'];
			
			//Specifies what information to Update and executes it
			$deleteJob = $pdo->query('DELETE FROM students WHERE student_id = "' . $id . '"');
		}

	}
	else {
		echo 'You must be logged in to view this page';
	}

?>