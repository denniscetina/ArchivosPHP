<?php
include 'conectar.php';
$id_ = $_GET['id_'];

$consulta="SELECT * FROM `users` WHERE id_= '$id_' ";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();


?>