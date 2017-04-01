<?php

/**
* Classe para chamar o banco de dados
* @author: Gabriel Vieira
* @type: DB
*/

namespace melhoridade\app\Dados;
use \PDO;

	class Banco
	{
		private $driver;
		private $host;
		private $dbname;
		private $user;
		private $pass;
		private $pdo;

		public function __construct()
		{			
			$this->setDriver('mysql');
			$this->setHost('localhost');
			$this->setDbName('melhoridade');
			$this->setUser('root');
			$this->setPass('123456');

			//$this->conecta();
		}

			//	===== SET =====
		public function setDriver($driver)
		{
			$this->driver = $driver;
		}

		public function setHost($host)
		{
			$this->host = $host;
		}

		public function setDbName($dbname)
		{
			$this->dbname = $dbname;
		}

		public function setUser($user)
		{
			$this->user = $user;
		}

		public function setPass($pass)
		{
			$this->pass = $pass;
		}

			//	===== GET =====
		public function getDriver()
		{
			return $this->driver;
		}

		public function getHost()
		{
			return $this->host;
		}

		public function getDbName()
		{
			return $this->dbname;
		}

		public function getUser()
		{
			return $this->user;
		}

		public function getPass()
		{
			return $this->pass;
		}

		public function conecta()
		{
			try{
				$pdo = new PDO(
					$this->getDriver() . ':host='.
					$this->getHost() . ';dbname='.
					$this->getDbName(),
					$this->getUser(),
					$this->getPass())
				;
			}
			catch(PDOException $e)
			{
				die('Erro ao conectar com o banco de dados: ' . $e->getMessage());
			}
			return $pdo;
		}

	}

	