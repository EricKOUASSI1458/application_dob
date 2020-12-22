<?php 
namespace App\Table;
use Core\Table\Table;

class InterventionTable extends Table{

	protected $table = 'interventions';
	
	/**
		* Récupère les derniers livres
		* @return array
	*/
	public function last(){ 
		return $this->query("
			SELECT interventions.id, interventions.dte_int, interventions.rapport_int, interventions.fiche_int, interventions.prestataire_id, interventions.contrat_id, interventions.created_at, interventions.updated_at, interventions.created_by, interventions.updated_by, interventions.statut,         contrats.montant as _contrat_montant, contrats.date_deb as _contrat_date_deb, contrats.date_fin as _contrat_date_fin, contrats.date_sign as _contrat_date_sign, contrats.type_cont as _contrat_type_cont, contrats.created_at as _contrat_created_at, contrats.updated_at as _contrat_updated_at,  contrats.created_by as _contrat_created_by,  contrats.updated_by as _contrat_updated_by,  contrats.statut as _contrat_statut, contrats.client_id as _contrat_client_id,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM interventions
			LEFT JOIN contrats ON interventions.contrat_id = contrats.id
			LEFT JOIN prestataires ON interventions.prestataire_id = prestataires.id
			ORDER BY interventions.created_at DESC"
		);
	}


	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function interventionByContrat($contrat_id){ 
		return $this->query("
			SELECT interventions.id, interventions.dte_int, interventions.rapport_int, interventions.fiche_int, interventions.prestataire_id, interventions.contrat_id, interventions.created_at, interventions.updated_at, interventions.created_by, interventions.updated_by, interventions.statut,         contrats.montant as _contrat_montant, contrats.date_deb as _contrat_date_deb, contrats.date_fin as _contrat_date_fin, contrats.date_sign as _contrat_date_sign, contrats.type_cont as _contrat_type_cont, contrats.created_at as _contrat_created_at, contrats.updated_at as _contrat_updated_at,  contrats.created_by as _contrat_created_by,  contrats.updated_by as _contrat_updated_by,  contrats.statut as _contrat_statut,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM interventions
			LEFT JOIN contrats ON interventions.contrat_id = contrats.id
			LEFT JOIN prestataires ON interventions.prestataire_id = prestataires.id
			WHERE interventions.contrat_id = ?
			ORDER BY interventions.created_at DESC", [$contrat_id] );
	}



	/**
		* Récupère un livre en liant à son auteur
		*@ param $id int
		* @return \App\Entity\BookEntity
	*/
	public function find($id){
		return $this->query("
			SELECT interventions.id, interventions.dte_int, interventions.rapport_int, interventions.fiche_int, interventions.prestataire_id, interventions.contrat_id, interventions.created_at, interventions.updated_at, interventions.created_by, interventions.updated_by, interventions.statut,         contrats.montant as _contrat_montant, contrats.date_deb as _contrat_date_deb, contrats.date_fin as _contrat_date_fin, contrats.date_sign as _contrat_date_sign, contrats.type_cont as _contrat_type_cont, contrats.created_at as _contrat_created_at, contrats.updated_at as _contrat_updated_at,  contrats.created_by as _contrat_created_by,  contrats.updated_by as _contrat_updated_by,  contrats.statut as _contrat_statut, contrats.client_id as _contrat_client_id,                                  prestataires.name as _prestataire_name, prestataires.place as _prestataire_place, prestataires.email as _prestataire_email, prestataires.tel as _prestataire_tel, prestataires.fax as _prestataire_fax, prestataires.created_at as _prestataire_created_at, prestataires.updated_at as _prestataire_updated_at, prestataires.created_by as _prestataire_created_by, prestataires.updated_by as _prestataire_updated_by, prestataires.statut as _prestataire_statut

			FROM interventions
			LEFT JOIN contrats ON interventions.contrat_id = contrats.id
			LEFT JOIN prestataires ON interventions.prestataire_id = prestataires.id
			WHERE interventions.id = ?", [$id], true );
	}


	public function total_actif(){ 
		return $this->query("
			SELECT COUNT(id) as total_intervention
			FROM  {$this->table}
			WHERE statut=1", "", true
		);
	}


	public function total_realise(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_realise
			FROM {$this->table} WHERE dte_int<= NOW() AND statut=1", "", true
		);
	}

	public function total_a_venir(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_a_venir
			FROM {$this->table} WHERE dte_int> NOW() AND statut=1", "", true
		);
	}

	public function total_mois_courant(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_mois_courant  FROM interventions
			WHERE MONTH( dte_int ) = MONTH(NOW()) AND YEAR( dte_int )=YEAR(NOW()) AND  statut=1", "", true
		);
	}

	public function nb_intervention_by_contrat($contrat_id){ 
		return $this->query("SELECT COUNT(id) AS nb_intervention_by_contrat
			FROM interventions WHERE contrat_id = ?", [$contrat_id], true
		);
	}


	
}

?>