<?php
//NO TOCAR ES IMPORTANTE
$DBhost = "ps-prod-mysql.cqarvpef8c0c.us-east-1.rds.amazonaws.com";
$DBuser = "discereUsr";
$DBpass = "!!Discere123";
$DBname = "discere_db-dev";
 //Obtengo el parametro.

$id_= $_REQUEST["id_"]; 
$email= $_REQUEST["correo"]; 
$name= $_REQUEST["nombre"];
$last_name= $_REQUEST["apellido"];
$gender=$_REQUEST["genero"];
$telephone_number=$_REQUEST["nTelefono"];





 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   echo "Conexion exitosa";
  
 
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
$query="UPDATE users set name='$name' ,last_name='$last_name',gender='$gender',telephone_number='$telephone_number', email='$email' where id_='$id_'";  //se ejecuta el update y devolvemos un 1
$stmt = $DBcon->prepare($query);
$stmt->execute();
      
?>
