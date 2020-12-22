<?php
namespace App\Entity;
use Core\Entity\Entity;

class UserEntity extends Entity{


	public function editUrl(){
		return 'index.php?p=client.edit&id=' . $this->id;
	}

	public function showUrl(){
		return 'index.php?p=client.show&id=' . $this->id;
	}

	public function deleteUrl(){
		return 'index.php?p=client.delete&id=' . $this->id;
	}

	
}
?>