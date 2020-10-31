<?php 
namespace App\Table;
use Core\Table\Table;

class ProduitTable extends Table{

	protected $table = 'produits';
	
	/**
		* Récupère les derniers livres
		* @return array
	*/
	public function last(){ 
		return $this->query("
			SELECT produits.id, produits.name, produits.prix, produits.detail, produits.fournisseur_id, produits.categorie_id,  fournisseurs.name as fournisseur,  categories.name as categorie   
			FROM produits
			LEFT JOIN fournisseurs ON produits.fournisseur_id = fournisseurs.id
			LEFT JOIN categories ON produits.categorie_id = categories.id
			");
	}


	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function lastByFournisseur($fournisseur_id){ 
		return $this->query("
			SELECT produits.id, produits.name, produits.prix, produits.detail, produits.fournisseur_id, produits.categorie_id,  fournisseurs.name as fournisseur,  categories.name as categorie   
			FROM produits
			LEFT JOIN fournisseurs ON produits.fournisseur_id = fournisseurs.id
			LEFT JOIN categories ON produits.categorie_id = categories.id
			WHERE produits.fournisseur_id = ?", [$fournisseur_id] );
	}


	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function lastByFCategorie($categorie_id){ 
		return $this->query("
			SELECT produits.id, produits.name, produits.prix, produits.detail, produits.fournisseur_id, produits.categorie_id,  fournisseurs.name as fournisseur,  categories.name as categorie   
			FROM produits
			LEFT JOIN fournisseurs ON produits.fournisseur_id = fournisseurs.id
			LEFT JOIN categories ON produits.categorie_id = categories.id
			WHERE produits.categorie_id = ?", [$categorie_id] );
	}


	/**
		* Récupère un livre en liant à son auteur
		*@ param $id int
		* @return \App\Entity\BookEntity
	*/
	public function find($id){
		return $this->query("
			SELECT produits.id, produits.name, produits.prix, produits.detail, produits.fournisseur_id, produits.categorie_id,  fournisseurs.name as fournisseur,  categories.name as categorie   
			FROM produits
			LEFT JOIN fournisseurs ON produits.fournisseur_id = fournisseurs.id
			LEFT JOIN categories ON produits.categorie_id = categories.id
			WHERE produits.id = ?", [$id], true );
	}
}

?>