<?php
$db = new mysqli('localhost', 'root','','skills');
$acentos = $db->query ("SET NAMES 'utf8'");
if($db->connect_error > 0){
    die('No hay conexion DB[' .$db->connect_error .']');
}
?>