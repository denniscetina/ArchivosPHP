<?php
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-prod-mysql.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$id_teacher=$_REQUEST["id_teacher"]; 
$status=$_REQUEST["status"]; 
//$status=settype($status,"integer");

 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="UPDATE `teacher` SET `status`='".$status."' WHERE `id_`= '".$id_teacher."'"; //se ejecuta el update y devolvemos un 1
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
