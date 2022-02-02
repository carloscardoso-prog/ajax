<?php 
	header('Content-Type: application/json');

	$texto = $_POST['texto'];
	$texto1 = $_POST['texto1'];

	$host= 'seuHost';
	$porta= 'suaPorta';
	$banco= 'seuBanco';
	$dsn = "mysql:host={$host};port={$porta};dbname={$banco}";

	$usuario   = 'seuLogin';
	$senha     = 'suaSenha';

	$opcoes = array(
	    PDO::ATTR_PERSISTENT => false,
	    PDO::ATTR_CASE => PDO::CASE_LOWER,
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);

	$pdo = new PDO($dsn, $usuario, $senha, $opcoes);

	$stmt = $pdo->prepare('INSERT INTO comments (comentarista, comentario) VALUES (?,?)');
	$stmt->bindValue(1, $texto);
 	$stmt->bindValue(2, $texto1);
 	$stmt->execute();

 	if($stmt->rowCount() >= 1){
 		echo json_encode('teste');
 	}else{
 		echo json_encode('testeeeeeee');
 	}
 ?>