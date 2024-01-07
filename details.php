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
        <link rel="stylesheet" href="css/nominee.css">

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
                <li><a href="winner.php">Winner</a></li>
                <li><a href="nominee.php" class="active">Nominee</a></li>
                <li><a href="category.php">Category</a></li>
            </ul>
        </div>


        <?php


// Retrieve the query parameter
$nomineeId = $_GET['id'];

// Query the database to fetch the nominee details along with the related category
$sql = "SELECT n.nom_id, n.nom_fname, n.nom_lname, n.nom_img,n.category_id, c.category_name
        FROM nominee n
        INNER JOIN category c ON n.category_id = c.category_id
        WHERE n.nom_id = $nomineeId";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row from the result set
    $row = $result->fetch_assoc();

    // Access the column values from the $row variable
    $nom_id = $row['nom_id'];
    $nom_fname = $row['nom_fname'];
    $nom_lname = $row['nom_lname'];
    $nom_description = $row['nom_description'];
    $nom_img = $row['nom_img'];
    $category_name = $row['category_name'];
    $category_id = $row ['category_id'];
} else {

    // Handle the case where no rows are returned

    echo "No nominee found";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voting Page</title>
    <link rel="stylesheet" href="css/votenominee.css">
</head>
<body>

<br><br>
    <h2>Voting Page</h2>

    <div class="votenominee">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($nom_img); ?>" width="300" height="300" alt="Nominee Image">
        <p>Nominee ID :   <?php echo $nom_id; ?></p>
        <p>Nominee Name :   <?php echo $nom_fname . ' ' . $nom_lname; ?></p>
        <p>Category :    <?php echo $category_name; ?></p>
        <p><?php echo $nom_description; ?></p>

    <form method="POST" action="">
       <button type="submit">Submit Vote for <?php echo $nom_fname . ' ' . $nom_lname; ?>

       </button>
    </form>
    </div>


    <?php
    



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the user_id from the session
   
    $user_email = $_SESSION['user_email'];


    // Get the nom_id and category_id from above code
    $nom_id = $row['nom_id'];
    $category_id = $row['category_id'];

    // Prepare the SQL query to insert the vote into the database
    $insertQuery = "INSERT INTO vote (nom_id, category_id, user_email) VALUES ('$nom_id', '$category_id', '$user_email')";

    // Execute the query
    if ($connection->query($insertQuery) === TRUE) {
            echo "<script> alert('you submit vote successfuly!')</script>";
        } else {
            echo "<script> alert('Error submit vote')</script>" . $connection->error;
        }
  
}




?>


  
</body>
</html>