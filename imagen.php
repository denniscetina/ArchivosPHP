<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 
    $imagen= $_POST['photo'];
    $nombre = $_POST['name'];
    // RUTA DONDE SE GUARDARAN LAS IMAGENES
    $path = "imagenes/$nombre.jpg";
    $actualpath = "http://34.226.77.86/discere/$path";
    file_put_contents($path, base64_decode($imagen));
    echo "SE SUBIO EXITOSAMENTE";
}
 
?>