<?php


$Email=$_POST['email'];
$pw=$_POST['password'];

//connect to db
$sname= "localhost";

$uname= "root";

$password = "";

$db_name = "reg";

//check connection
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}
    //check admin password
    if($Email=='admin' and $pw=='1234'){
        header("Location: admindash.html");
        exit();
        
    }
    else{


             header("Location: adminlogin.html");
                    exit();
        
   }
    

    
?>