<ul>
  <li><a href="index.php">Home</a></li>
    <?php 	if (isset($_SESSION['loggedin'])) {
				echo '<li><a href="timetable.php">Sessions</a></li>';
				echo '<li><a href="students.php">Students</a></li>';
				echo '<li><a href="attendance.php">Attendance</a></li>';
				echo '<li><a href="admin.php">Admin</a></li>';
				echo '<li style="float:right"><a class="active" href="logout.php">Log Out</a></li>';
			}
			elseif (isset($_SESSION['Sloggedin'])) {
				echo '<li><a href="stud_timetable.php">Timetable</a></li>';
				echo '<li><a href="stud_attendance.php">Attendance</a></li>';
				echo '<li style="float:right"><a class="active" href="logout.php">Log Out</a></li>';
			} 
			else {
				echo '<li style="float:right"><a class="active" href="login.php">Log-In</a></li>';
			}
	?> 

</ul>

	<?php 
	
	require 'connect.php';
	
		//Checks that a Session has been started and that a User is logged in
		if (isset($_SESSION['loggedin']) == true) {
			
			//Checks the Username input to the Username stored
			$stmt = $pdo->prepare('SELECT ad_username FROM admins WHERE admin_id = :id');
				$criteria = [
				 'id' => $_SESSION['loggedin']
				];
				$stmt->execute($criteria);
		
					$user = $stmt->fetch();

				//Displays the Username of the User currently logged in
				foreach ($user as $value){
					echo '<div class="signedIn"><li>Logged In As: ' . $value . '</li></div>';
					break;
				}
		}
		
		if (isset($_SESSION['Sloggedin']) == true){
				
				//Checks the Username input to the Username stored
				$check = $pdo->prepare('SELECT stud_fname FROM students WHERE student_id = :id');
					$criteria = [
					 'id' => $_SESSION['s_id']
					];
					$check->execute($criteria);
			
						$user = $check->fetch();

					//Displays the Username of the User currently logged in
					foreach ($user as $value){
						echo '<div class="signedIn"><li>Logged In As: ' . $value . '</li></div>';
						break;
					}
			}
	?>