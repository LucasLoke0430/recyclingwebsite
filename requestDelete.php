<?php
include "db_conn.php";

$user_id=$_GET["id"]??"";

$sql="DELETE FROM request WHERE id = '$user_id';";
$result=mysqli_query($conn,$sql);

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Your request has been deleted successfully.'); window.location='requestList.php'</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  // Close connection
  mysqli_close($conn);
?>