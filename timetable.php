<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'connect.php';
	require 'session_table.php';
?>
<html>
	<body>
		<div class="wrapper">

			<div class="content">
				
					<header>
						<h1>Year 2 General Computing</h1>
					</header>

					<?php
					$results = $pdo->query('SELECT * FROM sessions');
					
					//Generates a table
					$timeTableGenerator = new TableGenerator();
					//Sets the headings of the Table
					$timeTableGenerator->setHeadings(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
									
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