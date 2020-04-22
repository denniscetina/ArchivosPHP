<?php
include 'conectar.php';
$user= $_GET['user'];

$consulta="SELECT `lessons`.`id_teacher`, `teacher`.`user`, `lessons`.`id_fellow`, `fellow`.`user`, `users`.`name`
FROM `lessons` 
	LEFT JOIN `teacher` ON `lessons`.`id_teacher` = `teacher`.`id_` 
	LEFT JOIN `fellow` ON `lessons`.`id_fellow` = `fellow`.`id_` 
	LEFT JOIN `users` ON `fellow`.`user` = `users`.`id_` where `teacher`.`user`='$user' group by `fellow`.`user`";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>