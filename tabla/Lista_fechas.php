<?php
include 'conectar.php';
$id_fellow= $_GET["id_fellow"];

$consulta="SELECT `users`.`id_`, `users`.`name`, `lessons`.`id_`, `lessons`.`id_teacher`, `lessons`.`id_fellow`, `lessons`.`create_date`
FROM `users`
LEFT JOIN `fellow` ON `users`.`id_` = `fellow`.`user` 
LEFT JOIN `lessons` ON `fellow`.`id_` = `lessons`.`id_fellow`WHERE lessons.id_fellow ='$id_fellow'";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>