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
							
								<label>Session ID</label>
								<input type="text" name="id" required>
								
								<label>Code</label>
								<input type="text" name="code" required>

								<label>Name</label>
								<input type="text" name="name" required>
								
								<label>Module ID</label>
								<input type="text" name="mID" required>
								
								<label>Tutor ID</label>
								<input type="text" name="tID" required>
								
								<label>Time</label>
								<input type="text" name="time" required>
								
								<label>Day</label>
								<input type="text" name="day" required>
								
								<label>Duration</label>
								<input type="text" name="dur" required>
								
								<label>Room ID</label>
								<input type="text" name="rID" required>
								
								<input type="submit" name ="add" value="Add Session">
								<input type="submit" name ="edit" value="Update Session">
							
							</form>
							
						<h4>Erase a Session via the Session ID</h4>
						
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
			
		// Prepared statement for adding a Student
		$addSess = $pdo->prepare('INSERT INTO sessions (session_id, ses_code, ses_name, mod_id, tutor_id, time, day, duration, room_id)
								  VALUES (:session_id, :ses_code, :ses_name, :mod_id, :tutor_id, :time, :day, :duration, :room_id)');
								  
		//Passes the Input values into the specified fields
		 $criteria = [
					'session_id' => $_POST['id'],
					'ses_code' => $_POST['code'],
					'ses_name' => $_POST['name'],
					'mod_id' => $_POST['mID'],
					'tutor_id' => $_POST['tID'],
					'time' => $_POST['time'],
					'day' => $_POST['day'],
					'duration' => $_POST['dur'],
					'room_id' => $_POST['rID']
			];
			
		//Executes the Statement
		$addSess->execute($criteria);
	}
	
	if (isset($_POST['edit'])) {

		//Specifies what information to Update and executes it
		$id = $_POST['id'];
		$newCode = $_POST['code'];
		$newName = $_POST['name'];
		$newMID = $_POST['mID'];
		$newTID = $_POST['tID'];
		$newTime = $_POST['time'];
		$newDay = $_POST['day'];
		$newDur = $_POST['dur'];
		$newRoom = $_POST['rID'];
		
		//Specifies where to Insert information
		$editSess = $pdo->query('UPDATE sessions SET ses_code = "' . $newCode . '",
													ses_name = "' . $newName . '",
													mod_id = "' . $newMID . '",
													tutor_id = "' . $newTID . '",
													time = "' . $newTime . '",
													day = "' . $newDay . '",
													duration = "' . $newDur . '",
													room_id = "' . $newRoom . '"
													WHERE session_id = "' . $id . '"');
	}
	
	if (isset($_POST['del'])) {
		
			//Stores the User Input value
			$id = $_POST['delID'];
			
			//Specifies what information to Update and executes it
			$deleteSess = $pdo->query('DELETE FROM sessions WHERE session_id = "' . $id . '"');
		}
	}
	else {
		echo 'You must be logged in to view this page';
	}