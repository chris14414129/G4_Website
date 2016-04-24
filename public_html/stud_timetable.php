<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'session_table.php';
	
	if (isset($_SESSION['Sloggedin']) && $_SESSION['Sloggedin'] == true) {
?>
<html>
	<head>
		<title>Sessions</title>
	</head>
	<body>
		<div class="wrapper">

			<div class="content">
				
					<header>
						<h1>Sessions</h1>
					</header>
 
					<?php
						$results = $pdo->query('SELECT * FROM timetables
												INNER JOIN students
												ON timetables.student_id=students.student_id
												INNER JOIN sessions
												ON timetables.session_id=sessions.session_id
												INNER JOIN rooms
												ON sessions.room_id=rooms.room_id
												WHERE timetables.student_id=' . $_SESSION['s_id'] . '');
					
					//Generates a table
					$timeTableGenerator = new TableGenerator();
					//Sets the headings of the Table
					$timeTableGenerator->setHeadings(['Day', 'Start Time', 'Code', 'Name', 'Duration', 'Room']);
									
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