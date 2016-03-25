<?php
function courses($pdo){
			
			$results = $pdo->query('SELECT * FROM courses');
			
			foreach($results as $row){

				echo '<option>' .  $row['course_name'] . ' </option>';
				
			}
		}
?>