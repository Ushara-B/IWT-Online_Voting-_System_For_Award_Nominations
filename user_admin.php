<?php
    include('config.php');

    // Retrieve categories from the database
    
    $sql = "SELECT * FROM reg_user";
    $result = $connection->query($sql);

    // handle delete 
    if (isset($_POST["deletebtn"])){
        $username = $_POST['user_name'];

        $deleteSql = "DELETE FROM reg_user WHERE user_name='$username'";

        if ($connection->query($deleteSql) === TRUE) {
            echo "<script> alert('User profile deleted successfully!')</script>";
        } else {
            echo "<script> alert('Error deleting User profile:')</script>" . $connection->error;
        }
    }
    
    $connection->close();
?>


<!Doctype HTML>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/user_admin.css">
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
        <a href="#" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Nominees</a>
        <a href="#" class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;voters</a>
        <a href="category_admin.php" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Categories</a>
        <a href="#" class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;User</a>
    </div>

    <div id="main">
        <div class="head">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: white;" class="nav">&#9776; Users</span>
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
        
        <h3>User Profile Details</h3>
        
        <div class="cate">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Delete</th>
                </tr>
                <?php
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $username = $row["user_name"];
                    $email = $row["user_email"];
                    $fullname = $row["user_fname"];
                    $gender = $row["user_gender"];
                   
                    echo "<tr>";
                    echo "<td>".$username."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td>".$fullname."</td>";
                    echo "<td>".$gender."</td>";

                    echo "
                    <td>
                        <form action='' method='POST'>
                            <input type='hidden' name='user_name' value='$username'>
                            <input type='submit' name='deletebtn' value='Delete' class='btnD'>
                        </form>
                    </td>";

                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
