<?php

//Datos de la bd
  $host_name = 'ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com';
  $database = 'discere_db-dev';
  $user_name = 'discereUsr';
  $password = '!!Discere123';
  //Datos de la bd


$json=array();

//Pido valores
if(isset($_GET["id_"]) ){
$id_=$_GET['id_'];
//Pido valores

//ingreso a la bd
$conexcion=mysqli_connect($host_name, $user_name, $password, $database);
//ingreso a la bd

//consulta 
$consulta="SELECT * FROM users WHERE id_ = '{$id_}'";
$resultado=mysqli_query($conexcion,$consulta);
//consulta 

if($registro=mysqli_fetch_array($resultado)){

	$result["id_"]=$registro['id_'];
	$result["name"]=$registro['name'];
	$result["email"]=$registro['email'];
	$result["avatar"]=base64_encode($registro['avatar']);
	$json['usuario'][]=$result;

 }else {
 	$resulta["id_"]=0;
	$resulta["name"]='No registra';
	$resulta["email"]='No registra';
	$resulta["avatar"]='No registra';
	$json['usuario'][]=$resulta;
 }
 mysqli_close($conexcion);
 echo json_encode($json);
 
}
else{
	$resulta["succes"]=0;
	$resulta["message"]='ws no retorna';
	$json['usuario'][]=$resulta;
	echo json_encode($json);
}

?>
