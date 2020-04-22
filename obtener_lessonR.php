<?php
include 'conectar.php';
$id_lesson = $_GET['id_lesson'];

$consulta="SELECT * FROM `lesson_result` WHERE `id_lesson`= '$id_lesson' ";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>