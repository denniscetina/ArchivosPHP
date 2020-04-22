<?php
include 'conectar.php';
$id_audio_analyst = $_GET['id_'];

$consulta="SELECT * FROM `audio_defect` WHERE audio_defect.id_audio_analyst= '$id_audio_analyst' ";

$resultado=$conexion->query($consulta);

while($fila=$resultado-> fetch_array()){
    $mensaje[]=array_map('utf8_encode',$fila);
}
echo json_encode($mensaje);
$resultado->close();
    

?>