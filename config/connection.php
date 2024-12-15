<?php
//config
$server = "localhost";
$user = "root";
$password = "";
$dbname = "football";

//establishing connection to mysql server
$connection= mysqli_connect($server, $user, $password, $dbname);

//check connection
if (!$connection){
    // die("<h1></h1>" . mysqli_connect_error());
}else{
    echo "connected successfully";
}
?>