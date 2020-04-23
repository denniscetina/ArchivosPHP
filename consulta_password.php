<?php

//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.
$id_=$_REQUEST["id_"]; 
$password=$_REQUEST["password"]; 

 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
  echo "Conexion fallida";
 }
$query="UPDATE users set password='$password' where id_='$id_'";  //se ejecuta el update y devolvemos un 1
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
