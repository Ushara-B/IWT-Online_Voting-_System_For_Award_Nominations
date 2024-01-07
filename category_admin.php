<?php
    include('config.php');

    // Retrieve categories from the database
    
    $sql = "SELECT * FROM category";
    $result = $connection->query($sql);

     // handle delete 
     if (isset($_POST["deletebtn"])){
        $categoryId=$_POST['categoryId'];

        $deleteSql="DELETE FROM category WHERE category_id='$categoryId'";

        if ($connection->query($deleteSql) === TRUE) {
            echo "<script> alert('Category deleted successfully!')</script>";
        } else {
            echo "<script> alert('Error deleting category:')</script>" . $connection->error;
        }
    }
    
    $connection->close();
?>



<!Doctype HTML>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/category_admin.css">
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
        
        <div class="editbtn">
            <a href="category_create.php">
                <label>Add Category</label>   
            </a>
        </div>
        
        <div class="cate">
            <table>
                <tr>
                    <th>category ID</th>
                    <th>category Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $categoryId = $row["category_id"];
                        $categoryName = $row["category_name"];
                   
                    echo "<tr>";
                    echo "<td>".$categoryId."</td>";
                    echo "<td>".$categoryName."</td>";
                    echo"
                    <td>
                        <form action='category_update.php' method='GET'>
                            <input type='hidden' name='id' value='$categoryId'>
                            <input type='hidden' name='name' value='$categoryName'>
                            <input type='submit' name='editbtn' value='Update' class='btnU'>
                        </form>
                    </td>";
                    echo"
                    <td>
                        <form action='' method='POST'>
                            <input type='hidden' name='categoryId' value='$categoryId'>
                            <input type='submit' name='deletebtn' value='Delete' class='btnD'>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
            </table>
            </div>
             


              
        </div>
    </div>
</body>
</html>
