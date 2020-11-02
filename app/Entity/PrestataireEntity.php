<?php
namespace App\Entity;
use Core\Entity\Entity;

class PrestataireEntity extends Entity{

	public function editUrl(){
		return 'index.php?p=prestataire.edit&id=' . $this->id;
	}

	public function showUrl(){
		return 'index.php?p=prestataire.show&id=' . $this->id;
	}

	public function deleteUrl(){
		return 'index.php?p=prestataire.delete&id=' . $this->id;
	}
}
?>