<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'atten_table.php';
	
	if (isset($_SESSION['Sloggedin']) && $_SESSION['Sloggedin'] == true) {
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
					
					<?php 
							$results = $pdo->query('SELECT * FROM attendances 
													INNER JOIN timetables 
													ON  timetables.timetable_id = attendances.timetable_id
													INNER JOIN sessions 
													ON sessions.session_id = timetables.session_id
													INNER JOIN students
													ON timetables.student_id=students.student_id
													INNER JOIN modules 
													ON modules.module_id = sessions.mod_id
													WHERE timetables.student_id=' . $_SESSION['s_id'] . '');
													
							if ($results->rowCount() > 0) {
									
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
							}
							else {
								echo 'You have not attended any Sessions!';
							}
						
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