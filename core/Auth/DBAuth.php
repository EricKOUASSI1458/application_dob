<?php
namespace Core\Auth;
use Core\Database\Database;

class DBAuth{

	private $db;

	public function __construct(Database $db){
		$this->db = $db;
	}

	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}
		return false;
	}

	public function getTypeUser(){
		if($this->logged()){
			return $_SESSION['type_user'];
		}
	}

	

	/*
	*@param $login
	*@param $password
	*@return boolean
	*/
	public function login($login, $password){
		$user = $this->db->prepare('
			SELECT * FROM users WHERE login = ?',
			[$login],
			null,
			true
		);
		if($user){
			if($user->password === sha1($password)){
				$_SESSION['auth'] = $user->id;
				$_SESSION['type_user'] = $user->type_user;
				$_SESSION['pseudo'] = $user->login;
				return true;
			}
		}
		return false;
	}

	public function logged(){
		return isset($_SESSION['auth']);
	}

	public function get_pseudo(){
		return $_SESSION['pseudo'];
	}


	public function delogged(){
		unset($_SESSION["auth"]);
		unset($_SESSION["type_user"]);
		unset($_SESSION["pseudo"]);
	}
}
?>