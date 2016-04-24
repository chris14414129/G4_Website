<!--Fuctions created to manipulate data in MySQL-->
<?php
	require 'connect.php';

	class DatabaseTable {
		
		// Declaring variables for the __construct
		private $table;
		private $pdo;
		private $primaryKey;
		
		// Creating the __construct
		public function __construct($pdo, $table, $primaryKey){
			
			$this->pdo = $pdo;
			$this->table = $table;
			$this->primaryKey = $primaryKey;
			
		}
		
		// Save function which Inserts or Updates data base on supplied values
		public function save($record) {

			$success = $this->insert($record);
			
				if(!$success){
					$this->update($record);
				}
		}
		
		// Insert function
		public function insert($record) {
			
			$keys = array_keys($record);
			$values = implode(', ', $keys);
			$valuesWithColon = implode(', :', $keys);
			
			$query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
			
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
			
		}
		
		// Update function
		public function update($record){
			
			$query = 'UPDATE ' . $this->table . ' SET ';
			$parameters = [];
			foreach ($record as $key => $value) {
				$parameters[] = $key . ' = :' .$key;
			}
			$query .= implode(', ', $parameters);
			$query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';
			$record['primaryKey'] = $record[$this->primaryKey];
			$stmt = $this->pdo->prepare($query);
			$stmt->execute($record);
			
		}
		
		// Find function
		public function find($field, $value) {
			
			$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
			
			$criteria = [
				'value' => $value
			];
			
			$stmt->execute($criteria);
			
			return $stmt->fetchAll();
		}
		
		// Delete function
		public function delete($field, $value) {
			
			$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
			
			$criteria = [
				'value' => $value
			];
			
			$stmt->execute($criteria);
			
			return $stmt->fetch();
		}
		
		// Find All function which returns everything in a table
		public function findAll() {
			
			$stmt = $this->pdo->prepare('SELECT * FROM' . $this->table);
			$stmt->execute();
			
			return $stmt->fetchAll();
			
		}
	}
?>