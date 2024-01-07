<?php


   
$Fname = $_POST['fullName'];
$Uname = $_POST['userName'];
$Email = $_POST['email'];
$PNo = $_POST['phone'];
$Password = $_POST['password'];
$Cpassword = $_POST['confirmPassword'];
$Gender = $_POST['gdot'];


  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database ="Ballotbox23";
  
  $con = mysqli_connect($servername,$username,$password,$database);

  if (!$con)
  {
      die("error:".mysqli_connect_error());
  }
  if($Password == $Cpassword) {
    $sql = "INSERT INTO `reg_user`(`user_fname`, `user_name`, `user_gender`, `user_email`, `user_password`, `user_pn`) VALUES ('$Fname','$Uname','$Gender','$Email','$Password','$PNo')";
    
    if(mysqli_query($con,$sql))
    {     
    echo "registration successfully";
    }
else
{
    echo"Somthing went wrong";
}
}

else{
echo "Password not matched";
}

?>