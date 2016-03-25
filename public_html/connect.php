<?php
//used for connecting to the SQL server and setting up a variable for use in functions
$server = '194.81.104.22';
$username = 'group4_1516';
$password = 'group4';
//The name of the schema we created earlier in MySQL workbench
$schema = 'db_group4_1516';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
?>