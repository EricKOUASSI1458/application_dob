<?php
namespace App\Entity;
use Core\Entity\Entity;

class ContratEntity extends Entity{
	public function editUrl(){
		return 'index.php?p=contrat.edit&id=' . $this->id;
	}

	public function showUrl(){
		return 'index.php?p=contrat.show&id=' . $this->id;
	}

	public function deleteUrl(){
		return 'index.php?p=contrat.delete&id=' . $this->id;
	}
}
?>