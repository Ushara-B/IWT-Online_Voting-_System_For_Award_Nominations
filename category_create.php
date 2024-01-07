<?php

    include('config.php');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $categoryName=$_POST['name'];
        $categoryId=$_POST['id'];

    
    // handle Category Create
    $sql = "INSERT INTO category (category_id,category_name) VALUES ('$categoryId', '$categoryName')";

    if ($connection->query($sql) === TRUE) {
        echo "<script> alert('Category inserted successfully!')</script>";
    } else {
        echo "<script> alert('Error inserting category:')</script>" . $conn->error;
    }
    }

    // Close the database connection
    $connection->close();

?>



<!Doctype HTML>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/category_update.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	
    <!-- Side Navigation -->
	<div id="mySidenav" class="sidenav">
        <div class="logo">
                    <img src="img/logo2.png" class="img-logo">
        </div>
	<p class="logo"><span>BALLOTBOX</span>2023</p>
            <a href="admindash.html" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
            <a href="nominee_delete.php "class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Nominees</a>
            <a href="#"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;voters</a>
            <a href="category_admin.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Categories</a>
            <a href="user_admin.php"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;User</a>

    </div>

    <div id="main">
	    <div class="head">
		<div class="col-div-6">
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Categories </span>
        </div>
	
	    <div class="col-div-6">
            <div class="profile">
                <img src="img/profile.jpg" class="pro-img" />
                <p>Admin username<span>Administration</span></p>
            </div>
        </div>
	    <div class="clearfix"></div>
        </div>
    </div>

    <!--Noname-->
    <div class="noname">
        <h3>Add New Category</h3>
        <div class="card">
            <div class="row">
                <form action="" method="POST">
                    Enter category id 
                    <input type="text" name="id">
                    <br><br>
                    Enter Category name
                    <input type="text" name="name">
                    <br><br>
                    <input type="submit" name="submitbtn" class="btn">
                </form>
            </div>

        </div>          
    </div>

</body>
</html>
