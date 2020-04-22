<?php
include 'conectar.php';
$id_fellow = $_GET['id_fellow'];

$consulta="SELECT * FROM `lessons` WHERE `id_fellow`= '$id_fellow' ";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>