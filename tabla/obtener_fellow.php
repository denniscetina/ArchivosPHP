<?php
include 'conectar.php';
$user = $_GET['user'];

$consulta="SELECT * FROM `fellow` WHERE `user`= '$user' ";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>