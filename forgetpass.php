<?php



@include 'config.php';

session_start();

//password reset

if(isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $upn = mysqli_real_escape_string($connection, $_POST['phoneno']);
   $newPass = ($_POST['new_password']);
   $confirmNewPass = ($_POST['confirm_new_password']);

   $select = "SELECT * FROM reg_user WHERE user_email = '$email' AND user_pn = '$upn'";
   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0) {
      if ($newPass === $confirmNewPass) {
        $update = "UPDATE reg_user SET user_password = '$newPass' WHERE user_email = '$email' AND user_pn = '$upn'";

         mysqli_query($connection, $update);
         $_SESSION['reset_success'] = true;
         header('location: log_in.html');
         exit();
      } else {
         $error = 'Passwords do not match!';
      }
   } else {
      $error = 'Invalid email or phone number!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forgot Password Reset Form</title>
   <link href="img/logo2.png" rel="icon">

  
   <link rel="stylesheet" href="css/forgetpass.css">
   <script src="js/script.js"></script>

</head>
<body>

<!--navigation botton-->          
<div class="navigation">
            <ul class="navbar-links">
                <li><a href="index.html"><b>Home</b></a></li>
                
        </div>
   <div class="noname">


<!--password reset-->

<div class="form-container">

   <form action="" method="post">
      <h3>Password Reset</h3>
      <?php
      if(isset($error)){
         echo '<span class="error-msg">'.$error.'</span>';
      };
      ?>
      <?php
      if(isset($_SESSION['reset_success']) && $_SESSION['reset_success'] === true){
         echo '<span class="success-msg">Password reset successfully! Please log in with your new password.</span>';
         unset($_SESSION['reset_success']);
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="text" name="phoneno" required placeholder="Enter your Phone Number">
      <input type="password" name="new_password" required placeholder="Enter your new password">
      <input type="password" name="confirm_new_password" required placeholder="Confirm your new password">
      <input type="submit" name="submit" value="Reset Password" class="form-btn"  onclick="Submitregister();">
   </form>

   <script>
            function Submitregister()
            {
                alert("Password Reset Successful");
            }
        </script>

</div>
    </div>

    <!--footer-->

<footer class="footer-distributed">   
<div class="footer-left">
    <h3>BALLOTBOX2023</h3>

    <p class="footer-links">
        <a href="index.html">Home</a>
        |
        <a href="about.html">About</a>
        |
        <a href="about.html">Contact</a>
        |
        <a href="about.html">Blog</a>
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

        <p>Follow us</p>
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
