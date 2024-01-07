<?php

include "config.php";

session_start();
$user_email = $_SESSION['user_email'];  // Get the user_id from the session

// Query to retrieve the data columns
$sql = "SELECT user_name, user_img FROM reg_user WHERE user_email = '$user_email'";

// Execute the query
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
}

$user_name = $row['user_name'];
$user_img = $row['user_img'];

?>
<html>
    <head>
        <title>BallotBox23</title>

        <!--CSS-->
        <link rel="stylesheet" href="css/winner.css">

        <!--JS-->
        <script>
            // Calculate countdown time
            function countdown() {
                var now = new Date();
                var endTime = new Date("2023-06-30"); // Set the end date and time of the voting period
                var remainingTime = endTime - now;
    
                // Calculate days, hours, minutes, and seconds
                var days = Math.floor(remainingTime / (1000 * 60 * 60 * 24));
                var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
    
                // Display the countdown on the page
                document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
    
                // Update the countdown every second
                setTimeout(countdown, 1000);
            }
    
            window.addEventListener('load', countdown);
        </script>

        <!--Boxicons CSS-->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
         <!--Top Navigation bar -->
        <div class="topnav">
            <div class="topnav-bar">
                <div class="logo">
                    <img src="img/logo2.png" class="img-logo">
                </div>
                        
                <span class="name">BALLOTBOX 2023</span>
                    
                <div class="username-search">
                    <div class="username">
                        <ul class="username-links">
                            <li><a href="user_profile.php"><?php echo $user_name; ?></a></li>
                            <li>
                                <a href="user_profile.php">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user_img); ?>" class="profile-img">
                                </a>
                            </li>
                        </ul>
                    </div>
            
                    <div class="searchbox">
                        <div class="search-field">
                            <input type="search" placeholder="Search...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Navigation-->
        <div class="navigation">
            <ul class="navbar-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="winner.php" class="active">Winner</a></li>
                <li><a href="nominee.php">Nominee</a></li>
                <li><a href="category.php">Category</a></li>
            </ul>
        </div>

        
        
         <!--Noname-->
         <div class="noname">
            <div class="winner-list">
                <div class="winner-category">
                    <div class="winner">                     
                    <!-- Countdown -->
                        <div class="countdown">
                            <span id="countdown"></span> until winners are announced
                        </div>
                    </div>
                </div>
                <!--
                    <div class="winner">
                        <h2>Category Name Winner</h2>
                        <div class="display-winner">
                            <img src="img/profile.jpg" class="nominee-image">
                            <p><a href="#">Nominee Name</a></p>
                        </div>
                    </div>
                    <div class="winner">
                        <h2>Category Name Winner</h2>
                        <div class="display-winner">
                            <img src="img/profile.jpg" class="nominee-image">
                            <p><a href="#">Nominee Name</a></p>
                        </div>
                    </div>
                    <div class="winner">
                        <h2>Category Name Winner</h2>
                        <div class="display-winner">
                            <img src="img/profile.jpg" class="nominee-image">
                            <p><a href="#">Nominee Name</a></p>
                        </div>
                    </div>
                    <div class="winner">
                        <h2>Category Name Winner</h2>
                        <div class="display-winner">
                            <img src="img/profile.jpg" class="nominee-image">
                            <p><a href="#">Nominee Name</a></p>
                        </div>
                    </div>
                    <div class="winner">
                        <h2>Category Name Winner</h2>
                        <div class="display-winner">
                            <img src="img/profile.jpg" class="nominee-image">
                            <p><a href="#">Nominee Name</a></p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!--Footer-->
        <footer class="footer-distributed">

            <div class="footer-left">
                <h3>BALLOTBOX2023</h3>
            
                <p class="footer-links">
                    <a href="Home.php">Home</a>
                    |
                    <a href="about.html">About</a>
                    |
                    <a href="about.html">Contact</a>
                    |
                    <a href="#">Blog</a>
                </p>
            
            
            </div>
            
            <div class="footer-center">
                <div>
                    <i class="fa fa-address"></i>
                    <p>Ballotbox2023,Colombo 07,Sri Lanka</p>
                </div>
            
                <div>
                    <i class="fa fa-phone"></i>
                    <p>+91 2*9 6**7</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a>ballotbox2023@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                        <h4 class="text-light mb-4">Informations</h4>
                        <a class="btn btn-link" href="Terms and Conditions.html">Terms and Conditions</a><br>
                        <a class="btn btn-link" href="FAQ.html">FAQ</a><br>
                        <a class="btn btn-link" href="Privacy.html">Privacy</a>
                    
                </p>
                <div class="footer-icons">
                    <img src="img\facebook.svg"  width="10%" height="10%"><i class="fa-brands fa-facebook"></i></a>
                    <img src="img\instagram.svg" width="10%" height="10%"><i class="fa-brands fa-square-instagram"></i></a>
                    <img src="img\youtube.svg" width="10%" height="10%"><i class="fa-brands fa-youtube"></i></a>
                    <img src="img\twitter.svg" width="10%" height="10%"><i class="fa-brands fa-twitter"></i></a>
                    <img src="img\linkedin.svg" width="10%" height="10%"><i class="fa-brands fa-linkedin"></i></a>
                   
                </div>
            </div>
            </footer>
            
            <div class="copyright">
            <div class="row">
                <div class="text-center mb-3 mb-md-0">
                    <B>  &copy; All Right Reserved.
                    Designed By <a class="border-bottom" href="index.html">BALLOTBOX 2023</B></a>
                </div>
            </div>
            </div>    
        

    </body>
</html>