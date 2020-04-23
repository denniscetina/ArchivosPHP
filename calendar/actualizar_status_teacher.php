<?php
//NO TOCAR ES IMPORTANTE
//Esta consulta es para el teacher
$DBhost = "ps-prod-mysql.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$id_teacher=$_REQUEST["id_teacher"]; 
$id_fellow=$_REQUEST["id_fellow"]; 
$status=$_REQUEST["status"]; 
//$status=settype($status,"integer");

 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="UPDATE `lessons` SET `status`='".$status."' WHERE `id_teacher`= '".$id_teacher."' AND id_fellow='".$id_fellow."' "; //se ejecuta el update y devolvemos un 1
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
