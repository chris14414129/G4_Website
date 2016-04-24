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
			 
			 foreach ($this->rows as $row) 
			 {
				$result = $result . '<tr>';
				$result = $result . '<td>' . $row['time'] . '</td>';
				$result = $result . '<td>' . $row['ses_code'] . '</td>'; //Assigns each value from the database as a table data
				$result = $result . '<td>' . $row['ses_name'] . '</td>';
				$switch = $row['on_time'];
				switch ($switch) {
					case '1':
					$switch = '✓';
				}
				$result = $result . '<td>' . $switch . '</td>';
				$switch1 = $row['late'];
				switch ($switch1) {
					case '1':
					$switch1 = '✓';
				}
				$result = $result . '<td>' . $switch1 . '</td>';
				$switch2 = $row['absent'];
				switch ($switch2) {
					case '1':
					$switch2 = '✓';
				}
				$result = $result . '<td>' . $switch2 . '</td>';
				$switch3 = $row['wrong_ses'];
				switch ($switch3) {
					case '1':
					$switch3 = '✓';
				}
				$result = $result . '<td>' . $switch3 . '</td>';
				$result = $result . '</tr>';
			 }
			 
			 $result = $result . '</tbody>';
			 $result = $result . '</table>';
			 return $result;

	 }
	}
?>