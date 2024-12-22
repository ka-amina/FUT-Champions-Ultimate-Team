<?php
if (isset($_GET['id']) ) {
    $id = $_GET['id'];
        $soft_delete_players = "UPDATE PLAYERS SET is_deleted = 0 where player_id = $id";
        mysqli_query($connection, $soft_delete_players);
    header('Location: DeletedPlayers.php');
}
$lan= 'fr';
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$language= parse_ini_file("../../assets/lang/$lang.ini");
?>