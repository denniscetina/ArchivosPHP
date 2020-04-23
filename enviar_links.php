<?php
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$link= $_REQUEST["link"];





 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO audio (link) VALUES ('$link')";  //se ejecuta el update y devolvemos un 1
$resultado = mysqli_query($BDcon, $query);      
?>
