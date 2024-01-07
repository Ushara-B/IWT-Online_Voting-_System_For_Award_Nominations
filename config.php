<?php 

 $server_name = "localhost";
 $user_name = "root";
 $password = "";
 $database = "ballotbox23_data";

 $connection = new mysqli($server_name, $user_name, $password, $database);

 if ( $connection -> connect_error ){
    die ("connection error");
 }

 /*else{
    echo 'successfuly connected';}*/



?>