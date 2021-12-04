<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'testDB';
	$tableName = 'MyGuests';

	$dbName = $_POST['dbName'];
	$tableName = $_POST['tableName'];
	
	// Create Connection
	$conn = new mysqli($servername,$username,$password, $dbName);

	// Check Connection
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	}

	// Create Table in database
	// Table Name can not have ä,ö,ü!!!!!
	// Otherwise table is not created
	$sql = "CREATE TABLE $tableName (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
		
	if ($conn->query($sql) === TRUE) {
	  echo "Table $tableName created successfully";
	} else {
	  echo "Error creating table: " . $conn->error;
	}
	
	
	$conn->close();
	
?>