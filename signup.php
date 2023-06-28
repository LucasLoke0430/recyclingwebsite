<?php 
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

if (isset($_POST['submit'])) {

    $uname = $_POST["uname"] ?? "";
    $email = $_POST["mail"] ?? "";
    $password = $_POST["pass"] ?? "";
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(uname, email, password) 
    VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $hashpass);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script>alert('Your account has been registered successfully. Please proceed to log in.'); window.location='login.php'</script>";
    } else {
        echo "<script>alert('Oops! Something went wrong. Please try again.'); window.location='signup.php'</script>";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" action="signup.php" method="post">

    		<h4 class="display-4  fs-1">HLLO Recycling Account Registration</h4><br>
    		
		  <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" class="form-control" name="uname" required>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="email" class="form-control" name="mail" required>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" name="pass" required>
		  </div>
		  
		  <button type="submit" name="submit" value="submit" style="background-color:#387C44" class="btn btn-primary">Register</button>

		  <a href="login.php" class="link-secondary">Login</a>
		</form>
    </div>
</body>
</html>