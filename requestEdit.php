<?php
include "db_conn.php";

$user_id = $_GET["id"] ?? '';

$sql = "SELECT *
FROM request
WHERE id = '$user_id'";

$run = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($run);

if (isset($_POST['submit'])) {
    $user_id = $_POST["id"] ?? '';
    $username = $_POST["username"] ?? '';
    $email = $_POST["email"] ?? '';
    $number = $_POST["number"] ?? '';
    $address = $_POST["address"] ?? '';
    $object = $_POST["object"] ?? '';

    $sql = "UPDATE request SET
    username = '$username',
    email = '$email',
    number = '$number',
    address = '$address',
    object = '$object'
    WHERE id = '$user_id';";
    
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
    <title>Edit Request</title>
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
                    <li><a href="requestList.php">REQUEST LIST</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav> 

    <!-- edit request -->
    <section class="blog-content">
				<div class="comment-box">
                    <form action="requestEdit.php" method="post" id="address">
                        <h1>Edit Request</h1>
                        <input type="hidden" name="id" value="<?= $user_id ?>">
                        <p>User Name</p>
                        <input type="text" id="username" name="username" value="<?=$rows['username']?>">
                        <p>Email</p>
                        <input type="text" id="email" name="email" value="<?=$rows['email']?>">
                        <p>Contact</p>
                        <input type="text" id="number" name="number" value="<?=$rows['number']?>">
                        <p>Address</p>
                        <textarea rows="4" cols="50" form="address" method="post" id="address" name="address"><?=$rows['address']?></textarea>
                        <p>Recycle Object</p>
                        <input type="text" id="object" name="object" value="<?=$rows['object']?>">
                        <br><br>
                        <button type="submit" name="submit">Submit</button>
                        <button type="button" onclick="window.history.go(-1)">Back</button>
                    </form>
</div>
<section>
</body>
</html>