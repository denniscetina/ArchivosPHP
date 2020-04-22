<?php

  $host_name = 'ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com';
  $database = 'discere_db-dev';
  $user_name = 'discereUsr';
  $password = '!!Discere123';

$json=array();

if(isset($_GET["nombre"]) && isset($_GET["edad"])){
$nombre=$_GET['nombre'];
$edad=$_GET['edad'];

$conexcion=mysqli_connect($host_name, $user_name, $password, $database);

$insert="INSERT INTO pruebas(nombre,edad) VALUES ('{$nombre}','{$edad}')";
$resultado_insert=mysqli_query($conexcion,$insert);

if($resultado_insert){
$consulta="SELECT * FROM pruebas WHERE nombre = '{$nombre}'";
$resultado=mysqli_query($conexcion,$consulta);

if($registro=mysqli_fetch_array($resultado)){
$json['usuario'][]=$registro;
}
mysqli_close($conexcion);
echo json_encode($json);

}
else{
	$resulta["nombre"]='no registra';
	$resulta["edad"]='no registra';
	
	$json['usuario'][]=$resulta;
	echo json_encode($json);
 }
}
else{
        $resulta["nombre"]='no retorna';
	$resulta["edad"]='no retorna';
	
	$json['usuario'][]=$resulta;
	echo json_encode($json);
}

?>