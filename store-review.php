<?php
// Retrieve the review data from the form
$name = $_POST["name"];
$email = $_POST["email"];
$review = $_POST["review"];

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Insert the review data into the database
$sql = "INSERT INTO reviews (name, email, review) VALUES ('$name', '$email', '$review')";

if ($conn->query($sql) === TRUE) {
	echo "Thank you. Your reviews have been submitted successfully. The information you've sent will be shown below:<br><br>";
	echo "Name: $name <br>";
	echo "Email: $email <br>";
	echo "Review: $review <br>";
	
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
