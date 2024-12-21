<?php
//config
$server = "localhost";
$user = "root";
$password = "";
$dbname = "football";

//establishing connection to mysql server
$connection= mysqli_connect($server, $user, $password, $dbname);
$get_players= "SELECT player_id, name, photo, position_name, rating FROM players WHERE is_deleted = 0";
$soft_delete_players = "UPDATE PLAYERS SET is_deleted = 1 where player_id = ?";
$get_nationalities= "SELECT country_name, flag_image FROM NATIONALITIES";
$get_gk_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'GK'
and is_deleted = 0
";

$get_rw_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'RW'
and is_deleted = 0
";
$get_lw_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'LW'
and is_deleted = 0
";
$get_st_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'ST'
and is_deleted = 0
";
$get_rb_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'RB'
and is_deleted = 0
";
$get_lb_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'LB'
and is_deleted = 0
";
$get_3cm_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'CM'
and is_deleted = 0
limit 3
";

$get_cmchangemet_players="SELECT
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'CM'
and is_deleted = 0
limit 10 offset 3"; 

$get_2cb_players= "SELECT 
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'CB'
and is_deleted = 0
limit 2
";

$get_cbchangemet_players="SELECT
name,
photo,
club_logo,
flag_image,
position_name,
rating,
    pace,
    shooting,
    passing,
    driblling,
    defending,
    physical,
   diving,
   handling,
   kicking,
   refelexes,
   speed,
    positioning 
from players
LEFT JOIN OUTFIELD_PLAYERS
    ON players.player_id = OUTFIELD_PLAYERS.player_id
LEFT JOIN GOALKEEPERS
    ON players.player_id = GOALKEEPERS.player_id
join clubs 
     on clubs.club_id= players.club_id
join nationalities 
     on nationalities.nationality_id= players.nationality_id
where position_name= 'CB'
and is_deleted = 0
limit 10 offset 2"; 

$get_deleted_players= "SELECT * FROM players where is_deleted=1";

$get_contries="SELECT nationality_id ,country_name FROM NATIONALITIES";

$get_clubs = "SELECT club_id, club_name,club_logo FROM CLUBS";


$add_club="INSERT INTO CLUBS (club_name, club_logo) 
VALUES (? , ?)";
$add_mationality="INSERT INTO NATIONALITIES (country_name, flag_image)
VALUES ( ? , ? )";
$add_club= "INSERT INTO CLUBS (club_name, club_logo) VALUES ( ? , ? )";
$add_player= "INSERT INTO PLAYERS (name, photo, club_id, nationality_id, position_name, rating, is_deleted)
VALUES ( ? ,  ? )";
$add_gk_statistique= "INSERT INTO GOALKEEPERS VALUES ( ?, ? , ? , ? , ? , ? )";
$add_outfield_statistique= "INSERT INTO OUTFIELD_PLAYERS VALUES( ? , ? , ? , ? , ? , ? )";

?>


