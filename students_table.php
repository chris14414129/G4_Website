<?php	
		class TableGenerator {
		 public function setHeadings($headings) {
			 $this->headings = $headings;
		 }
		 public function addRow($row) {
			 $this->rows[] = $row;
		 }
		 public function getHTML() {
				$result = '<table>';
				 $result = $result . '<thead>';
				 $result = $result . '<tr>';
				 
				 
				 foreach ($this->headings as $heading) {
				 $result = $result . '<th>' . $heading . '</th>';
				 }
		
				 $result = $result . '</tr>';
				 $result = $result . '</thead>';
				 $result = $result . '<tbody>';
				 
				 
				 //
				 foreach ($this->rows as $row) 
				 {
					$result = $result . '<tr>';					
					$result = $result . '<td>' . $row['student_id'] . '</td>'; //Assigns each value from the database as a table data
					$result = $result . '<td>' . $row['stud_fname'] . '</td>';
					$result = $result . '<td>' . $row['stud_sname'] . '</td>';
					$result = $result . '<td>' . $row['course'] . '</td>';
					$result = $result . '<td>' . $row['type'] . '</td>';
					$result = $result . '</tr>';
				 }
				 
				 $result = $result . '</tbody>';
				 $result = $result . '</table>';
				 return $result;

		 }
		}
?>