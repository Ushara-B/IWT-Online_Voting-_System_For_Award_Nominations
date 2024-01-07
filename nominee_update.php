<?php

    include('config.php');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $nomineeName=$_POST['name'];
        $nomineeId=$_POST['id'];

    
    // handle Category Create
    $sql = "UPDATE nominee SET nom_fname = '$nomineeName' WHERE nom_id = '$nomineeId'";


    if ($connection->query($sql) === TRUE) {
        echo "<script> alert('nominee inserted successfully!')</script>";
    } else {
        echo "<script> alert('Error inserting nominee:')</script>" . $conn->error;
    }
    }

    // Close the database connection
    $connection->close();

?>



<!Doctype HTML>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/nominee_update.css">
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
            <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Nominees</a>
            <a href="#"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;voters</a>
            <a href="nominee_admin.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Nominees</a>
            <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Other</a>

    </div>

    <div id="main">
	    <div class="head">
		<div class="col-div-6">
            <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Nominees </span>
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
        <h3>Update Nominee</h3>
        <div class="card">
            <div class="row">
                <form action="" method="POST">
                    Enter Nominee's id 
                    <input type="text" name="id">
                    <br><br>
                    Enter Nominee's name
                    <input type="text" name="name">
                    <br><br>
                    <input type="submit" name="submitbtn" class="btn">
                </form>
            </div>

        </div>          
    </div>

</body>
</html>
