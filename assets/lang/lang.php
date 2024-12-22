<?php
$lan= 'fr';
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$language= parse_ini_file("../../assets/lang/$lang.ini");
?>