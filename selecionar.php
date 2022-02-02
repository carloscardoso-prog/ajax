<?php 
	header('Content-Type: application/json');

	$host= 'seuHost';
	$porta= 'suaPorta';
	$banco= 'seuBanco';
	$dsn = "mysql:host={$host};port={$porta};dbname={$banco}";

	$usuario   = 'seuUser';
	$senha     = 'suaSenha';

	$opcoes = array(
	    PDO::ATTR_PERSISTENT => false,
	    PDO::ATTR_CASE => PDO::CASE_LOWER,
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	);

	$pdo = new PDO($dsn, $usuario, $senha, $opcoes);

	$stmt = $pdo->prepare('SELECT * FROM comments;');
 	$stmt->execute();

 	if($stmt->rowCount() >= 1){
 		echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
 	}else{
 		echo json_encode('Falha ao SELECIONAR comentários');
 	}
 ?>