<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	//$password = $_POST['password'];
	//$number = $_POST['number'];

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbName = 'testDB';
	

	// Create Connection
	$conn = new mysqli($servername,$username,$password,$dbName);
	// Check Connection
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	}

	// Put Data into Database
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('$firstName', '$lastName', '$email')";
	
	if($conn->query($sql) === TRUE)
	{
		$last_id = $conn->insert_id;
		echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
	}else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>