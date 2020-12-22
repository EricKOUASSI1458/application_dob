<?php
namespace App\Entity;
use Core\Entity\Entity;

class Intervention_sans_contratEntity extends Entity{

	public function editUrl(){
		return 'index.php?p=intervention.edit&id=' . $this->id;
	}

	public function showUrl(){
		return 'index.php?p=intervention.show&id=' . $this->id;
	}

	public function deleteUrl(){
		return 'index.php?p=intervention.delete&id=' . $this->id;
	}
}
?>