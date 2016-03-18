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
					//$result = $result . '<th>' . $headings . '</th>';
					//$result = $result . '<td>' . $row['ses_code'] . '<br>' . $row['ses_name'] . '</td>'; //Assigns each value from the database as a table data
					 $result = $result . '<td>' . $row['ses_code'] . '</td>';
					// $result = $result . '<td>' . $row['ses_code'] . '</td>';
					// $result = $result . '<td>' . $row['ses_code'] . '</td>';
					// $result = $result . '<td>' . $row['ses_code'] . '</td>';
					$result = $result . '</tr>';
				 }
				 $result = $result . '<td>' . $row['ses_code'] . '<br>' . $row['ses_name'] . '</td>';
				 
				 $result = $result . '</tbody>';
				 $result = $result . '</table>';
				 return $result;

		 }
		}
?>