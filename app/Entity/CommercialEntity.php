<?php
namespace App\Entity;
use Core\Entity\Entity;

class CommercialEntity extends Entity{


	public function getUrl(){
		return 'index.php?p=produits.fournisseur&id=' . $this->id;
	}

	public function getAllFour(){
		var_dump('index.php?p=home') ;
	}
}
?>