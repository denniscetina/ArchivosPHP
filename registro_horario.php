<?php

  $host_name = 'ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com';
  $database = 'discere_db-dev';
  $user_name = 'discereUsr';
  $password = '!!Discere123';

$json=array();

if(isset($_GET["user"]) && isset($_GET["type"]) && isset($_GET["title"]) && isset($_GET["start"]) && isset($_GET["end"]) && isset($_GET["day"]) &&  isset($_GET["status"]) && isset($_GET["start_date"]) && isset($_GET["end_date"]) ){
$user=$_GET['user'];
$type=$_GET['type'];
$title=$_GET['title'];
$start=$_GET['start'];
$end=$_GET['end'];
$day=$_GET['day'];
$status=$_GET['status'];
$start_date=$_GET['start_date'];
$end_date=$_GET['end_date'];

$conexcion=mysqli_connect($host_name, $user_name, $password, $database);

$insert="INSERT INTO teacher(user,type,title,start,end,day,status,start_date,end_date) VALUES ('{$user}','{$type}','{$title}','{$start}','{$end}','{$day}','{$status}','{$start_date}','{$end_date}')";
$resultado_insert=mysqli_query($conexcion,$insert);

if($resultado_insert){
$consulta="SELECT * FROM teacher WHERE user = '{$user}'";
$resultado=mysqli_query($conexcion,$consulta);

if($registro=mysqli_fetch_array($resultado)){
$json['usuario'][]=$registro;
}
mysqli_close($conexcion);
echo json_encode($json);

}
else{
	$resulta["user"]='no registra';
	$resulta["type"]='no registra';
	$resulta["title"]='no registra';
	$resulta["start"]='no registra';
	$resulta["end"]='no registra';
	$resulta["day"]='no registra';
	$resulta["status"]='no registra';
	$resulta["start_date"]='no registra';
	$resulta["end_date"]='no registra';
	
	$json['usuario'][]=$resulta;
	echo json_encode($json);
 }
}
else{
	$resulta["user"]='no retorna';
	$resulta["type"]='no retorna';
	$resulta["title"]='no retorna';
	$resulta["start"]='no retorna';
	$resulta["end"]='no retorna';
	$resulta["day"]='no retorna';
	$resulta["status"]='no retorna';
	$resulta["start_date"]='no retorna';
	$resulta["end_date"]='no retorna';
	
	$json['usuario'][]=$resulta;
	echo json_encode($json);
}

?>