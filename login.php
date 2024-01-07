<?php

session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database ="ballotbox23_data";
    
    $connection = mysqli_connect($servername,$username,$password,$database);

    $query = "SELECT * FROM reg_user WHERE user_email = '$Email' AND user_password = '$Password'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) === 1) {
        // Login successful
        echo "Login successful!";
        header('location: home.php');
    
        $_SESSION['user_email'] = $Email;
      
       
    } else {
        // Login failed
        echo "Invalid email or password.";
       
    }
}
?>