<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    $audio = $_POST['photo'];
    $nombre = $_POST['name'];
    // RUTA DONDE SE GUARDARAN LOS AUDIOS
    $path = "audios/$nombre.mp3";
    $actualpath = "http://puntosingular.mx/cas/$path";
    file_put_contents($path, basename($audio));
    echo "SE SUBIO EXITOSAMENTE";
}
 
?>
