<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Connect to database
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "auth_db";

$conn = mysqli_connect($sName, $uName, $pass, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert data into database
$sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

$run = mysqli_query($conn, $sql);
if($run == TRUE){
	echo"<script>alert('Thank you for sending us a message. We will look into it shortly and reply to your message as soon as possible. Stay close and always check your emails.');window.location='contact.html'</script>";
}else{
  echo "Error: ";
mysqli_close($conn);
}
?>
