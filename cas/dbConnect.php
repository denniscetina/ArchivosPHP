<?php 
define('HOST','ps-mysqldb.cqarvpef8c0c.us-east-1.rds.amazonaws.com');
 define('USER','discereUsr');
 define('PASS','!!Discere123');
 define('DB','discere_db-dev');

 
 $con = mysqli_connect(HOST,USER,PASS,DB) 
 or die('unable to connect to db');
 ?>