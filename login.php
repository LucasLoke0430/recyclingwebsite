<?php 
$email = empty($_POST["mail"]) ? "" : $_POST["mail"];
$password = empty($_POST["pass"]) ? "" : $_POST["pass"];

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "auth_db";

// Create connection
$conn = mysqli_connect($sName,$uName,$pass,$db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fetch = $result->fetch_assoc();
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            echo "<script>alert('Welcome to HLLO Recycling!');window.location='home.html'</script>";
        } else {
            echo "<script>alert('Incorrect password, please try again.');window.location='login.php'</script>";
        }
    } else {
        echo "<script>alert('Incorrect email address, please try again.');window.location='login.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" action="login.php" method="post">

    		<h4 class="display-4  fs-1">HLLO Recycling User Login</h4><br>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" class="form-control"name="mail" required>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" name="pass" required>
		  </div>
		  
		  <button type="submit" name="submit" value="submit" style="background-color:#387C44" class="btn btn-primary">Login</button>

		  <a href="signup.php" class="link-secondary">Register</a>

		</form>
		<br><br><a href="adminlogin.php"><button style="background-color:#387C44">Admin Login</button></a>
    </div>
	
</body>
</html>