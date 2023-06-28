<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
    $user_id = $_POST["user_id"] ?? '';
    $username = $_POST["username"] ?? '';
    $email = $_POST["email"] ?? '';
    $number = $_POST["number"] ?? '';
    $address = $_POST["address"] ?? '';
    $object = $_POST["object"] ?? '';

    $sql = "INSERT into request (username, email, number, address, object) VALUES ('$username','$email','$number','$address','$object');";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Successful Updated!'); window.location='requestList.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Add Request</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
<section class="header">
        <nav>
            <a href="staffHome.html"><img src="recycling_img/recycle_logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="staffHome.php">HOME</a></li>
                    <li><a href="requestList.php">REQUEST LIST</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav> 

    <!---------- Recycling Request Page ----------->

<section class="blog-content">
				<div class="comment-box">
					<h3>Request Form</h3>
					<form action="requestAdd.php" method="post" id="request" name="request" class="comment-form">
						<input type="text" name="username" placeholder="Please enter your name." required>
						<input type="email" name="email" placeholder="Please enter your email address." required>
						<input type="text" name="number" placeholder="Please enter your phone number." required>
						<input type="text" name="object" id="object" placeholder="Recyclable Objects (Exp: can, tin, paper, etc.)" required>
						<textarea name="address" id="address" form="request" placeholder="Please enter your address." required></textarea>
						<input type="submit" name="submit" value="Send Request" class="hero-btn red-btn">
					</form>
				</div>
</section>
</body>
</html>