<?php 
namespace App\Table;
use Core\Table\Table;

class Intervention_sans_contratTable extends Table{

	protected $table = 'intervention_sans_contrats';
	
	/**
		* Récupère les derniers livres
		* @return array
	*/
	public function last(){ 
		return $this->query("
			SELECT intervention_sans_contrats.id, intervention_sans_contrats.dte_int, intervention_sans_contrats.rapport_int, intervention_sans_contrats.fiche_int, intervention_sans_contrats.prestataire_id, intervention_sans_contrats.client_id, intervention_sans_contrats.created_at, intervention_sans_contrats.updated_at, intervention_sans_contrats.created_by, intervention_sans_contrats.updated_by, intervention_sans_contrats.statut, intervention_sans_contrats.montant,         clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM {$this->table}
			LEFT JOIN clients ON intervention_sans_contrats.client_id = clients.id
			LEFT JOIN prestataires ON intervention_sans_contrats.prestataire_id = prestataires.id
			ORDER BY intervention_sans_contrats.created_at DESC"
		);
	}


	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function interventionByClient($client_id){ 
		return $this->query("
			SELECT intervention_sans_contrats.id, intervention_sans_contrats.dte_int, intervention_sans_contrats.rapport_int, intervention_sans_contrats.fiche_int, intervention_sans_contrats.prestataire_id, intervention_sans_contrats.client_id, intervention_sans_contrats.created_at, intervention_sans_contrats.updated_at, intervention_sans_contrats.created_by, intervention_sans_contrats.updated_by, intervention_sans_contrats.statut, intervention_sans_contrats.montant,         clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM {$this->table}
			LEFT JOIN clients ON intervention_sans_contrats.client_id = clients.id
			LEFT JOIN prestataires ON intervention_sans_contrats.prestataire_id = prestataires.id
			WHERE intervention_sans_contrats.client_id = ?
			ORDER BY intervention_sans_contrats.created_at DESC", [$client_id] );
	}



	/**
		* Récupère un livre en liant à son auteur
		*@ param $id int
		* @return \App\Entity\BookEntity
	*/
	public function find($id){
		return $this->query("
			SELECT intervention_sans_contrats.id, intervention_sans_contrats.dte_int, intervention_sans_contrats.rapport_int, intervention_sans_contrats.fiche_int, intervention_sans_contrats.prestataire_id, intervention_sans_contrats.client_id, intervention_sans_contrats.created_at, intervention_sans_contrats.updated_at, intervention_sans_contrats.created_by, intervention_sans_contrats.updated_by, intervention_sans_contrats.statut, intervention_sans_contrats.montant,         clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM {$this->table}
			LEFT JOIN clients ON intervention_sans_contrats.client_id = clients.id
			LEFT JOIN prestataires ON intervention_sans_contrats.prestataire_id = prestataires.id
			WHERE intervention_sans_contrats.id = ?", [$id], true );
	}


	public function total_actif(){ 
		return $this->query("
			SELECT COUNT(id) as total_intervention_sans_contrat
			FROM  {$this->table}
			WHERE statut=1", "", true
		);
	}


	public function total_realise(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_realise
			FROM {$this->table} WHERE dte_int<= NOW()", "", true
		);
	}

	public function total_a_venir(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_a_venir
			FROM {$this->table} WHERE dte_int> NOW()", "", true
		);
	}
}

?>