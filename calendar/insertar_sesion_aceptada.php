<?php
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-mysqldb.cobhumpfxcij.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$id_fellow=$_REQUEST["id_fellow"]; 
$id_teacher=$_REQUEST["id_teacher"]; 
$type=$_REQUEST["type"]; 
$day=$_REQUEST["day"]; 
$status=$_REQUEST["status"]; 
$create_date=$_REQUEST["create_date"]; 
$start_date=$_REQUEST["start_date"]; 
$end_date=$_REQUEST["end_date"]; 
$start_time=$_REQUEST["start_time"]; 
$end_time=$_REQUEST["end_time"]; 



 try{  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO lessons (`id_fellow`, `id_teacher`, `type`, `day`, `status`, `create_date`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES ('".$id_fellow."','".$id_teacher."','".$type."','".$day."','".$status."','".$create_date."', '".$start_date."', '".$end_date."','".$start_time."','".$end_time."')";  //se ejecuta el update
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
