<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'students_table.php';
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<html>
	<head>
		<title>Students</title>
	</head>
	<body>
		<div class="wrapper">

			<div class="content">
				
					<header>
						<h1>Students</h1>
					</header>
					
					<form method="POST">
						<label>Student ID: </label>
						<input type="text" name="id"/>
						<input type="submit" name="submit">
					</form>
					
					<?php
					$results = $pdo->query('SELECT * FROM students');
					
					if (isset($_POST['submit'])) {
		
						$id = $_POST['id'];
		
						$results = $pdo->query('SELECT * FROM students WHERE student_id LIKE "' . $_POST['id'] . '"');
					}
					//Generates a table
					$jobGenerator = new TableGenerator();
					//Sets the headings of the Table
					$jobGenerator->setHeadings(['Student ID', 'Firstname', 'Surname', 'Course', 'Type']);
									
									//Loops through each row of data
									foreach ($results as $row)
									{
										//Each row of data is added to a row of the table generated
										$jobGenerator->addRow($row);
									}
									
									//This generates the table
									echo $jobGenerator->getHTML();
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