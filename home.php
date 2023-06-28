<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {
 ?>
<!DOCTYPE html>
<html>
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
    <section class="header">
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
    <div class="text-box">
        <h1>HLLO Recycling</h1>
        <p>This is an introduction to our recycling centre and some information about us.<br>Click the button below to send a request.</p>
        <a href="request.html" class="hero-btn">Request Now</a>
    </div>

    </section>
        
<!---------- Places ----------->
        
<section class="place">
    <h1>Importance of the 3Rs</h1>
    <p>RECYCLE, REDUCE, REUSE</p>
    
    <div class="row">
        <div class="place-col">
            <h3>Recycle</h3>
            <p>Recycle the waste effectively to save our environment from being polluted.</p>
        </div>
        <div class="place-col">
            <h3>Reduce</h3>
            <p>Reduce using unnecessary things to prevent extra waste from being disposed of.</p>
        </div>
        <div class="place-col">
            <h3>Reuse</h3>
            <p>Reuse the waste to reduce the amount of waste.</p>
        </div>
    </div>
</section>    
        
<!---------- ThreeRs ----------->    
    <section class="threeRs">
        <h1>The 3Rs</h1>
        <p>Which consists of recycling, reducing and reusing.</p>
            
        <div class="row">
            <div class="threeRs-col">
                <img src="recycling_img/recycle_3r_recycle.jpg">
                    <div class="layer">
                        <h3>Recycle to save our environment from being destroyed.</h3>
                    </div>
            </div>
            <div class="threeRs-col">
                <img src="recycling_img/recycle_3r_reduce.png">
                    <div class="layer">
                        <h3>Reduce to save extra waste from being disposed of.</h3>
                    </div>
            </div>
            <div class="threeRs-col">
                <img src="recycling_img/recycle_3r_reuse.png">
                    <div class="layer">
                        <h3>Reuse to prevent waste.</h3>
                    </div>
            </div>
        </div>
    </section>
        
<!---------- Benefits ----------->
        
<section class="benefits">
    <h1>The Benefits of 3Rs<h1>
    <p>These are the three main benefits of the 3Rs.</p>
    
    <div class="row">
        <div class="benefits-col">
        <img src="recycling_img/ecosystem.jpg">
        <h3>Saving our environment</h3>
        <p>Recycling, reducing, and reusing waste decreases pollution in our environment.</p>
    </div>
    <div class="benefits-col">
        <img src="recycling_img/saves_energy.jpg">
        <h3>Saves space and energy</h3>
        <p>Recycling, reducing, and reusing will reduce waste, thus conserving our natural resources, energy, and space.</p>
    </div>
    <div class="benefits-col">
        <img src="recycling_img/co2.jpg">
        <h3>Reduce global warming</h3>
        <p>Recycling, reducing, and reusing will lessen pollution, thus reducing global warming.</p>
    </div>
</section>
    
<!---------- Environmentalist -----------> 
    
<section class="environmentalist">
    <h1>Environmentalists</h1>
    <p>What they had to say about our website.</p>
    
    <div class="row">
        <div class="environmentalist-col">
            <img src="recycling_img/randomwhiteguy.jpg">
            <div>
                <p>This site is an excellent introduction to the 3 R's and is simple enough for everyone to understand their importance. I fully support this site and its messages.</p>
                <h3>James "Plant Master" Harold</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
        </div>
        <div class="environmentalist-col">
            <img src="recycling_img/randomblackguy.jpg">
            <div>
                <p>I like this website; everything in it is accurate and easy to understand, and I support what this website is trying to do: spread a great message to the public and raise awareness of the 3 R's.</p>
                <h3>Mark Jorden</h3>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
        </div>
    </div>

</section>
    
<!---------- Call To Request ----------->
    
<section class="ctr">
    <h1>Feel free to send<br>Any request you have for us.</h1>
    <a href="request.html" class="hero-btn">REQUEST</a>
  
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

<!---------- JavaScript for Toggle Menu ----------->
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

<!---------- JavaScript for Toggle Menu ----------->
<script>
        
        var navLinks + document.getElementById("navLinks");
        
        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }
      
</script>
    
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>