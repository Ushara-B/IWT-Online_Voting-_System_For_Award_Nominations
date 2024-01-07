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

    $query = "SELECT * FROM `admin_log` WHERE admin_email = '$Email' AND admin_password = '$Password'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) === 1) {
        // Login successful
        echo "Login successful!";
        header('location: admindash.html');
    
        $_SESSION['admin_email'] = $Email;
      
       
    } else {
        // Login failed
        echo "Invalid email or password.";
       
    }
}
?>