<?php

class historico{

	private $pdo;
	public function __construct(){

		$this->pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");	
	}


	public function registrar($acao){

		$ip = $_SERVER['REMOTE_ADDR'];

		$sql = "INSERT INTO historico SET ip = :ip, data = NOW(), acao = :acao";
		$sql = $this->pdo->prepare($sql);	
		$sql->bindvalue(":ip", $ip);
		$sql->bindvalue(":acao", $acao);
		$sql->execute();
	}

}