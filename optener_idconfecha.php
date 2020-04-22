<?php
include 'conectar.php';
$start= $_GET['start'];

$consulta="SELECT `fellow`.`id_`, `fellow`.`start`FROM `fellow` WHERE `fellow`.`start`='$start'";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>