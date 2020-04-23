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
$name_teacher=$_REQUEST["name_teacher"]; 
$lastN_teacher=$_REQUEST["last_name_teacher"]; 
$name_fellow=$_REQUEST["name_fellow"]; 
$lastN_fellow=$_REQUEST["last_name_fellow"]; 
$start_date=$_REQUEST["start_date"]; 
$status=$_REQUEST["status"];
$email=$_REQUEST["email"]; 
$email_fellow=$_REQUEST["email_fellow"]; 
$end_date=$_REQUEST["end_date"]; 



 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="INSERT INTO wait(`id_fellow`, `id_teacher`, `type`, `name_teacher`, `name_fellow`, `lastN_teacher`, `lastN_fellow`, `start_date`, `status`, `email`, `email_fellow`, `end_date`) VALUES ('".$id_fellow."','".$id_teacher."','".$type."','".$name_teacher."','".$name_fellow."','".$lastN_teacher."', '".$lastN_fellow."', '".$start_date."','".$status."','".$email."','".$email_fellow."','".$end_date."')";  //se ejecuta el update
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
