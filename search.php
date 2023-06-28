<!DOCTYPE html>
<html>
<style>
    .search-form{
        margin-top: 15px;
        float: right;
        margin-right: 100px;
    }

    input[type=text]{
        padding: 7px;
        border: none;
        font-size: 16px;
        font-family: sans-serif;
    }

    button{
        float: right;
        background: #387C44;
        color: white;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
        position: relative;
        padding: 7px;
        font-family: sans-serif;
        border: black;
        font-size: 16px;
    }
    
</style>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Recycling</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
</head>
<body>
    <section class="sub-header">
        <nav>
            <a href="home.html"><img src="recycling_img/recycle_logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="review.html">REVIEWS</a></li>
                    <li><a href="request.html">REQUEST</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav> 
    <h1>About Us</h1>      
    </section>

    <form class="search-form" action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search.." required>
        <button type="submit" name="submit-search">Search</button>
    </form>
        
<!---------- About Us Content ----------->
        
<section class="about-us">
        
    <div class="row">
        <div class="about-col">

             <?php
             include 'dbh.php';
             if(isset($_POST['submit-search'])){
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM article WHERE a_title LIKE '%$search%' OR a_text LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);


                if($queryResult > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div><h3>".$row['a_title']."</h3>
                    <p>".$row['a_text']."</p>
                    </div><br><br><br>";
                    }

                }else{
                    echo "There are no results that match your search. Please try again.";
                }
             }
             echo "<p>There are $queryResult results that match your search.</p>";

?>
</div>
        <div class="about-col"><img src="recycling_img/lovedonesrecycle.jpg">
        </div>
    </div>                
        
</section>
        

<!---------- About Us Footer ----------->
    
<section class="auf">
    <h4>About Us</h4>
    <p>We created this website to spread the message of protecting our environment.<br>
    We are raising public awareness of the importance of the 3 R's.<br>
    They may join and help us protect our environment together.</p>
    <div class="icons">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-linkedin"></i>
    </div>
    <p>Founded by Gaylord Lucas</p>
</section>

<!----------- JavaScript for Toggle Menu ----------->
        
<script>
        
        var navLinks = document.getElementById("navLinks");
        
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }
      
</script>
    
</body>
</html>