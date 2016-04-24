<?php
function courses($pdo){
			
			$results = $pdo->query('SELECT course_name FROM courses');
			
			foreach($results as $row){

				echo '<option>' .  $row['course_name'] . ' </option>';
				
			}
		}
		
function studID($pdo){
			
			$results = $pdo->query('SELECT student_id FROM students');
			
			foreach($results as $row){

				echo '<option>' .  $row['student_id'] . ' </option>';
				
			}
		}

function sesID($pdo){
			
			$results = $pdo->query('SELECT session_id FROM sessions');
			
			foreach($results as $row){

				echo '<option>' .  $row['session_id'] . ' </option>';
				
			}
		}
		
function sesCode($pdo){
			
			$results = $pdo->query('SELECT ses_code FROM sessions');
			
			foreach($results as $row){

				echo '<option>' .  $row['ses_code'] . ' </option>';
				
			}
		}
		
function modID($pdo){
			
			$results = $pdo->query('SELECT module_id FROM modules');
			
			foreach($results as $row){

				echo '<option>' .  $row['module_id'] . ' </option>';
				
			}
		}
		
function roomID($pdo){
			
			$results = $pdo->query('SELECT room_id FROM rooms');
			
			foreach($results as $row){

				echo '<option>' .  $row['room_id'] . ' </option>';
				
			}
		}
		
function tutID($pdo){
			
			$results = $pdo->query('SELECT tutor_id FROM tutors');
			
			foreach($results as $row){

				echo '<option>' .  $row['tutor_id'] . ' </option>';
				
			}
		}
?>