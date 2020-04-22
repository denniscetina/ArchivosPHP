<?php

require('composer/vendor/autoload.php'); 

use Aws\S3\S3Client; 
use Aws\Exception\AwsException; 

$S3Options = 
[
	'version' => 'latest',
	'region'  => 'us-east-1',
	'credentials' => 
	[
		'key' => 'AKIA5LGXOJOBQXLD24XH',
		'secret' => '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'
	]
]; 


$s3 = new S3Client($S3Options); 


// listar archivos

$archivos = $s3->listObjects(
[
	'Bucket' => 's3-us-east-1-prod-discere',
	'Prefix' => "TEST/"
]); 

$archivos = $archivos->toArray();



$fila = ""; 

foreach ($archivos['Contents'] as $archivo) 
{
	$fila .= "<tr><td>{$archivo['Key']}</td>";
	$fila .= "<td>s3-us-east-1-prod-discere</td>";
	$fila .= "<td>{$archivo['Size']}</td>";
	$fila .= "<td>{$archivo['LastModified']}</td>";
	$fila .= "<td><button onclick='getFile(&#34;{$archivo['Key']}&#34;)'>Descarga</button></td></tr>"; 
}

echo $fila; 


// carga del archivo

	$uploadObject = $s3->putObject(
		[
			'Bucket' => 's3-us-east-1-prod-discere',
			'Key' => 'TEST/'.$_FILES['file']['name'],
			'SourceFile' => $_FILES['file']['tmp_name']
		]); 

	print_r($uploadObject); 



// descarga de archivo

if($_POST['key'])
{
	$getFile = $s3->getObject([

		'Key' => $_POST['key'],
		'Bucket' => 's3-us-east-1-prod-discere'
	]);

	$getFile = $getFile->toArray();

	file_put_contents($_POST['key'], $getFile['Body']); 
}





?>