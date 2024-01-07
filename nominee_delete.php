<?php
    include('config.php');

    // Retrieve categories from the database
    
    $sql = "SELECT * FROM nominee";
    $result = $connection->query($sql);

     // handle delete 
     if (isset($_POST["deletebtn"])){
        $nomineeId=$_POST['nomineeId'];

        $deleteSql="DELETE FROM nominee WHERE nom_id='$nomineeId'";

        if ($connection->query($deleteSql) === TRUE) {
            echo "<script> alert('Nominee deleted successfully!')</script>";
        } else {
            echo "<script> alert('Error deleting Nominee:')</script>" . $connection->error;
        }
    }
    
    $connection->close();
?>



<!Doctype HTML>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="css/nominee_delete.css">
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
            <a href="category_admin.php"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Categories</a>
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
        <h3>Edit Nominee</h3>
        <div class="cate">
            <table>
                <tr>
                    <th>Nominee ID</th>
                    <th>Nominee Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $nomineeId = $row["nom_id"];
                        $nomineeName = $row["nom_fname"];
                   
                    echo "<tr>";
                    echo "<td>".$nomineeId."</td>";
                    echo "<td>".$nomineeName."</td>";
                    echo"
                    <td>
                        <form action='nominee_update.php' method='GET'>
                            <input type='hidden' name='id' value='$nomineeId'>
                            <input type='hidden' name='name' value='$nomineeName'>
                            <input type='submit' name='editbtn' value='Update' class='btnU'>
                        </form>
                    </td>";
                    echo"
                    <td>
                        <form action='' method='POST'>
                            <input type='hidden' name='nomineeId' value='$nomineeId'>
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
