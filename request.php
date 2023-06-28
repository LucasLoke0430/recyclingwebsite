<?php
    $name = $_POST['username'];
    $email = $_POST['email'];
    $object = $_POST['object'];
	$address = $_POST['address'];

    if(is_numeric($_POST['number'])){
        $phone = $_POST['number'];
    }else{
        $alert = "<script>alert('The phone number inserted must be in numeric form.');window.location.href='request.html'</script>";
        echo $alert;
        }

//connection
    $conn = mysqli_connect("localhost","root","","auth_db");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into request(username, email, number, address, object)
        value(?,?,?,?,?)" );
        $stmt -> bind_param("ssiss", $name, $email, $phone, $address, $object);
        $stmt -> execute();
        echo "Thank you. You have sent a request successfully. Please refer to the information you have sent below:<br><br>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Phone: $phone <br>";
        echo "Recyclable Objects: $address <br>";
        echo "Address: $object<br>";
		
        $stmt->close();
        $conn->close();
    }
?>