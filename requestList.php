<?php
include "db_conn.php";

$sql = "SELECT * FROM request;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
  text-align: center;
  color: white;
}
</style>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Request List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
<body>
<section class="header">
        <nav>
            <a href="requestList.php"><img src="recycling_img/recycle_logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="requestList.php">REQUEST LIST</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav> 
        <div class="main-content">
        <header>

            <form action="requestList.php" method="GET">
            <div class="search-wrapped">
                 <span class="las la-search"></span>
                     <input type="search" name="search" placeholder="Search" required
                     value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>">
                     <button type="submit" class="btn-L">Search</button>
            </div>
            </form>
        </header>

        <main>

            <div class="table">
                <div class="table-header">


                    <div class="btn-add">
                        <button class="add_new" name="addnew" onclick="document.location='requestAdd.php'">+ Add New</button>
                    </div><br>
                </div>

                <div>
                <div>
                    <table width=100%>
                        <thead><h2><font color="#FFFFFF">Request List</h2>
                            <tr>
                                <th>NO.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Recycle Object</th>
                                <th>Action</th>
                            </tr>
                        </thead>
						<?php
                        $count = 0;
							while($rows=$result->fetch_assoc()){
                                $count++;
						?>
                        <tbody>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $rows['username'];?></td>
                                <td><?php echo $rows['email'];?></td>
                                <td><?php echo $rows['number'];?></td>
                                <td><?php echo $rows['address'];?></td>
                                <td><?php echo $rows['object'];?></td>
                                <td>
                                    <a href="requestEdit.php?id=<?=$rows['id']?>">Edit</a>
                                    <a href="requestDelete.php?id=<?=$rows['id']?>">Delete</a>
                                </td>
                            </tr>
						<?php
							}
						?>

                        <div class="table">
                            <div class="searchres">
                                <table width=100%>
                                    <thead>
                                        <br><h2><font color="#FFFFFF">Search Result</h2>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Recycle Object</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
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

                                        if(isset($_GET['search'])){
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM request WHERE CONCAT(id,username,email,number,address,object) LIKE '%$filtervalues%' ";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0){
                                                foreach($query_run as $items){
                                    ?>
                                            <tr>
                                                <td><?php echo $items['username'];?></td>
                                                <td><?php echo $items['email'];?></td>
                                                <td><?php echo $items['number'];?></td>
                                                <td><?php echo $items['address'];?></td>
                                                <td><?php echo $items['object'];?></td>
                                                <td>
                                                    <a href="requestEdit.php?id=<?=$items['id']?>">Edit</a>
                                                    <a href="requestDelete.php?id=<?=$items['id']?>">Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                            <tr>
                                                <td colspan="4">No record was found.</td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                                mysqli_close($conn);
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </main>
            </div>
    </section>

    
</body>
</html>