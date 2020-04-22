<?php
$hostname="db793449398.hosting-data.io";
$database="db793449398";
$username="dbo793449398";
$password="Cbtis_72";

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion  ->connect_errno){
    echo "Lo sentimos,el sitio web esta experimentando probelmas";
}
?>