<?php

use Core\Config;
use Core\DataBase\MysqlDataBase;
	
	/*create 14/10/2020*/
	class App{
		/*cette classe est créee pour facilité la mconnexion à la base de donnée et resoudre le pb de portée de variable*/

		
		public $titre_page = 'Biblio';
		private $db_instance;
		
		private static $_instance;

		/*mise en évidence des singletons */
		public static function getInstance(){
			if(is_null(self::$_instance)){
				self::$_instance  = new App();
			}
			return self::$_instance;
		}

		public static function load(){
			session_start();
			require ROOT . '/app/Autoloader.php';
			App\Autoloader::register();
			require ROOT . '/core/Autoloader.php';
			Core\Autoloader::register();
		}


		/*mise en évidence des factory*/
		public function getTable($name){
			$class_name = '\\App\\Table\\'.ucfirst($name) . 'Table';
			return new $class_name($this->getDb()); 
		}

		/*mise en évidence des factory*/
		public function getDb(){
			$config = Config::getInstance(ROOT . '/config/config.php');
			if(is_null($this->db_instance)){
				$this->db_instance = new MysqlDataBase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
			}
			return $this->db_instance; 
		}

		public function forbidden(){
			header('HTTP/1.0 403 FORBIDDEN');
			die('Acces interdit');
		}

		public function notFound(){
			header('HTTP/1.0 404 not found');
			die('page introuvable');
		}


	}
?>