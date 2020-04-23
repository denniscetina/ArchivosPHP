<?php
$hostname="ps-prod-mysql.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$database="discere_db-dev";
$username="discereUsr";
$password="!!Discere123";

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion  ->connect_errno){
    echo "Lo sentimos,el sitio web esta experimentando probelmas";
}
?>
