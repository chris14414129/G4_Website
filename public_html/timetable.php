<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'session_table.php';
	require 'list-courses.php';
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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
						<?php require 'filterCourses.php'; ?>
					</header>
 
					<?php
					
					 if (isset($_POST["filter"]))
					 {
						 $results = $pdo->query('SELECT * FROM course_sessions
												INNER JOIN courses
												ON courses.course_id=course_sessions.course_id
												INNER JOIN sessions
												ON sessions.session_id=course_sessions.session_id
												INNER JOIN rooms
												ON sessions.room_id = rooms.room_id
												WHERE courses.course_name="' . $_POST['courses'] . '"
												ORDER BY FIELD(day, "Mon", "Tue", "Wed", "Thu", "Fri"),
												FIELD(time, "09:00:00", "10:00:00", "11:00:00", "12:00:00", "13:00:00", "14:00:00", "15:00:00", "16:00:00", "17:00:00", "18:00:00")');
							
								if ($results->rowCount() > 0) {
										
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
								
								}
								else {
									echo 'No Sessions exist for this Course';
								}
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