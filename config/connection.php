<?php
//config
$server = "localhost";
$user = "root";
$password = "";
$dbname = "football";

//establishing connection to mysql server
$connection= mysqli_connect($server, $user, $password, $dbname);
$get_players= "SELECT player_id, name, photo, position_name, rating FROM players";
$get_nationalities= "SELECT country_name, flag_image FROM NATIONALITIES";
$get_contries="SELECT nationality_id ,country_name FROM NATIONALITIES";
$get_clubs = "SELECT club_id, club_name FROM CLUBS";
$add_club="INSERT INTO CLUBS (club_name, club_logo) 
VALUES (? , ?)";
$add_mationality="INSERT INTO NATIONALITIES (country_name, flag_image)
VALUES ( ? , ? )";
$add_club= "INSERT INTO CLUBS (club_name, club_logo) VALUES ( ? , ? )";
$add_player= "INSERT INTO PLAYERS (name, photo, club_id, nationality_id, position_name, rating, is_deleted)
VALUES ( ? ,  ? )";
$add_gk_statistique= "INSERT INTO GOALKEEPERS VALUES ( ?, ? , ? , ? , ? , ? )";
$add_outfield_statistique= "INSERT INTO OUTFIELD_PLAYERS VALUES( ? , ? , ? , ? , ? , ? )";
$get_players= "SELECT player_id, name, photo, position_name, rating FROM players";
//check connection
if ($connection){
    echo "connected successfully";
}

?>


