<?php
include 'conectar.php';
$user = $_GET['user'];

$consulta="SELECT `fellow`.`user`, `lesson_result`.`id_`, `lessons`.`id_fellow`, `lesson_result`.`id_lesson` FROM `fellow` LEFT JOIN `lessons` ON `fellow`.`id_` = `lessons`.`id_fellow` LEFT JOIN `lesson_result` ON `lessons`.`id_` = `lesson_result`.`id_lesson` WHERE user='$user' GROUP BY fellow.user";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>