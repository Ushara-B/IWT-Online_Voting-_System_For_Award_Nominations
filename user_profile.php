<?php

include "config.php";

session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    // Query to retrieve the data columns
    $sql = "SELECT user_fname, user_name, user_gender, user_pn, user_img FROM reg_user WHERE user_email = '$user_email'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);

        $user_name = $row['user_name'];
        $user_fname = $row['user_fname'];
        $user_img = $row['user_img'];
        $user_gender = $row['user_gender'];
        $user_pn = $row['user_pn'];
    }

   
} else {
    echo "<script> alert('User email not found.')</script>";
    // Redirect the user to the login page or handle the error accordingly
    exit();
}

if (isset($_POST["deletebtn"])){
    $user_email = $_POST['user_email'];

    $deleteSql = "DELETE FROM reg_user WHERE user_name='$user_email'";
    $result = mysqli_query($connection, $sql);

    if ($connection->query($deleteSql) === TRUE) {
        echo "<script> alert('Your profile has been deleted successfully!')</script>";
    } else {
        echo "<script> alert('Error deleting User profile:')</script>" . $connection->error;
    }
}

?>

<html>

<head>
    <title>BallotBox23</title>

    <!--CSS-->
    <link rel="stylesheet" href="css/user_profile.css">

    <!--JS-->

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
            <li><a href="winner.html">Winner</a></li>
            <li><a href="nominee.php">Nominee</a></li>
            <li><a href="category.php">Category</a></li>
        </ul>
    </div>

    <!--Noname-->
    <div class="noname">
        <div class="user-profile">
            <!-- <div class="winner-category"> -->
            <div class="card">
                <h2>Personal Information</h2>
                <table class="personal">
                    <tr>
                        <td colspan="2" class="first-row">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user_img); ?>">
                            <input type="file" id="file" accept="image/jpg">
                            <label for="file">Change</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="first-row">
                            <span>Username</span>
                            <input type="text" id="file" accept="image/jpg">
                            <label>Change</label>
                        </td>
                    </tr>

                    <tr>
                        <td class="t">E-mail</td>
                        <td class="n"><?php echo $user_email ?></td>
                    </tr>
                    <tr>
                        <td class="t">Name</td>
                        <td class="n"><?php echo $user_fname ?></td>
                    </tr>
                    <tr>
                        <td class="t">Mobile number</td>
                        <td class="n"><?php echo $user_pn ?></td>
                    </tr>
                    <tr>
                        <td class="t">Gender</td>
                        <td class="n"><?php echo $user_gender ?></td>
                    </tr>
                    <tr>
                        <td>                   
                             <form method="POST" action="logout.php">
                 <input type="hidden" name="user_email" value="<?php echo $user_email; ?>">
                    <button type="submit" name="deletebtn" class="btnD">Delete your profile</button>
                            </form>
                           
                        </td>
                    </tr>

  

                </table>

            </div>
            <div class="card">
                <h2>Voted Nominee</h2>
                <table class="vote">
                    <tr>
                        <th>No</th>
                        <th>Nomine Name</th>
                        <th>Voted Date</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Empty</td>
                        <td>Empty</td>
                    </tr>
                </table>

            </div>
            <!-- </div> -->
        </div>
    </div>

    <footer class="footer-distributed">

        <div class="footer-left">
            <h3>BALLOTBOX2023</h3>

            <p class="footer-links">
                <a href="home.php">Home</a>
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
                <img src="E:\Ballotbox23\img\facebook.svg" width="10%" height="10%"><i class="fa-brands fa-facebook"></i></a>
                <img src="E:\Ballotbox23\img\instagram.svg" width="10%" height="10%"><i class="fa-brands fa-square-instagram"></i></a>
                <img src="E:\Ballotbox23\img\youtube.svg" width="10%" height="10%"><i class="fa-brands fa-youtube"></i></a>
                <img src="E:\Ballotbox23\img\twitter.svg" width="10%" height="10%"><i class="fa-brands fa-twitter"></i></a>
                <img src="E:\Ballotbox23\img\linkedin.svg" width="10%" height="10%"><i class="fa-brands fa-linkedin"></i></a>

            </div>
        </div>
    </footer>


    <div class="copyright">
        <div class="row">
            <div class="text-center mb-3 mb-md-0">
                <B> &copy; All Right Reserved.
                    Designed By <a class="border-bottom" href="index.html">BALLOTBOX 2023</B></a>
            </div>
        </div>
    </div>



</body>

</html>