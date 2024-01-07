<?php

      // database connecction details
      $servername="localhost";
      $username="root";
      $password="";
      $dbname="ballotbox23_data";
  
      // create a connection
      $conn=new mysqli($servername,$username,$password,$dbname);
      
      // check for connection errors
      if($conn->connect_error){
          die("Connection Failed".$conn->coonect_error); 
      }


    // Check if the URL parameters are set
    if (isset($_GET['id']) && isset($_GET['name'])) {
        $categoryId = $_GET['id'];
        $categoryName = $_GET['name'];
    } 

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
        <h3>Update Category Details</h3>
        <div class="card">
            <div class="row">
            <form action="" method="POST">
        Category ID<input type="text" name="id" value="<?php echo $categoryId; ?>"><br>
        Category Name <input type="text" name="name" value="<?php echo $categoryName; ?>"><br>
        <input type="submit" name="update" value="Update" class="btn">
    </form>

    <?php
                  
        // Handle update
        if (isset($_POST['update'])) {
            // Retrieve the updated values
            $updatedId = $_POST['id'];
            $updatedName = $_POST['name'];

            // Perform the update query
            // Update the table with the new values
            echo "$updatedId"."$updatedName";
            // Redirect back to the previous page after updating
            // header("Location: #");
            // exit();
            $updateSql = "UPDATE category SET category_name = '$updatedName' WHERE category_id = '$updatedId'";

            if ($conn->query($updateSql) === TRUE) {
                echo "<script> alert('Record updated successfully!')</script>";
                // header("Location: #"); // Redirect back to the previous page after updating
                // exit();
            } else {
                echo "<script> alert('Error updating record:')</script>" . $conn->error;
            }
            
         }
    ?>
                
            </div>

        </div>
       
             


              
    </div>



	


    

   



</body>
</html>
