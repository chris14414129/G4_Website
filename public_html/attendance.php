<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'atten_table.php';
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<html>
	<head>
		<title>Attendance</title>
	</head>
	<body>
		<div class="wrapper">

			<div class="content">
				
					<header>
						<h1>Attendance</h1>
					</header>
					
					<form method="POST">
						<label>Student ID: </label>
						<input type="text" name="id"/>
						<input type="submit" name="submit">
					</form>
					
					<?php 
						if(isset($_POST['submit'])) {
							
							$id = $_POST['id'];
							
							echo 'Student ' . $id . ' Attendance';
							
							$results = $pdo->query('SELECT * FROM attendances 
													INNER JOIN timetables 
													ON  timetables.timetable_id = attendances.timetable_id
													INNER JOIN sessions 
													ON sessions.session_id = timetables.session_id
													INNER JOIN modules 
													ON modules.module_id = sessions.mod_id
													WHERE student_id =  "' . $_POST['id'] . '"');
						}
						else {
							$results = $pdo->query('SELECT * FROM attendances 
													INNER JOIN timetables 
													ON  timetables.timetable_id = attendances.timetable_id
													INNER JOIN sessions 
													ON sessions.session_id = timetables.session_id
													INNER JOIN modules 
													ON modules.module_id = sessions.mod_id');
						}
					
						//Generates a table
						$timeTableGenerator = new TableGenerator();
						//Sets the headings of the Table
						$timeTableGenerator->setHeadings(['Date Attended', 'Code', 'Name', 'On-Time', 'Late', 'Absent', 'Wrong Session']);
										
										//Loops through each row of data
										foreach ($results as $row)
										{
											//Each row of data is added to a row of the table generated
											$timeTableGenerator->addRow($row);
										}
										
										//This generates the table
										echo $timeTableGenerator->getHTML();
					?>
			</div>
			<?php require 'footer.php';?>
		</div>
	</body>
<html>
<?php 
	}
	else {
		echo 'You must be logged in to view this page';
	}
?>