<?php
include 'conectar.php';
$id_fellow= $_GET['id_fellow'];

$consulta="SELECT `lessons`.`id_fellow`, `lessons`.`id_teacher`, `users`.`name`, `fellow`.`id_` 
FROM `users` LEFT JOIN `fellow` ON `users`.`id_` = `fellow`.`user` LEFT JOIN `lessons` ON `fellow`.`id_` = `lessons`.`id_fellow` WHERE lessons.id_fellow IN ('".$id_fellow."')" ;

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>