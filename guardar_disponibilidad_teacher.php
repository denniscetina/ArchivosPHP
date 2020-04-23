<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.
$user= $_REQUEST["user"]; 
$title= $_REQUEST["title"]; 
$start= $_REQUEST["start"]; 
$end= $_REQUEST["end"]; 







 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO `teacher`(`user`,`type` ,`title`, `start`, `end`) VALUES ('".$user."','".$title."','".$title."', '".$start."', '".$end."') ";  //Modificar mas adelante
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
