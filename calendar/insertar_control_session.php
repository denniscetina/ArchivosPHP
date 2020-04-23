<?php
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro. week_number	count_coach	count_speaker	date	hour	user
//Esto es para el fellow

$week_number= $_REQUEST["week_number"]; 
$count_coach= $_REQUEST["count_coach"]; 
$count_speaker= $_REQUEST["count_speaker"]; 
$date= $_REQUEST["date"]; 
$hour= $_REQUEST["hour"]; 
$user= $_REQUEST["user"]; 




 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO `control_session`(`week_number`, `count_coach`, `count_speaker`, `date`, `hour`, `user`) VALUES 
('".$week_number."','".$count_coach."','".$count_speaker."','".$date."','".$hour."','".$user."')"; //se ejecuta el update y devolvemos un 1
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
