<?php 
namespace App\Table;
use Core\Table\Table;

class ContratTable extends Table{

	protected $table = 'contrats';
	
	/**
		* Récupère les derniers livres
		* @return array
	*/
	public function last(){ 
		return $this->query("
			SELECT contrats.id, contrats.montant, contrats.date_deb, contrats.date_fin, contrats.date_sign, contrats.type_cont, contrats.client_id, contrats.created_at, contrats.updated_at, contrats.created_by, contrats.updated_by, contrats.statut,        clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut

			FROM contrats
			LEFT JOIN clients ON contrats.client_id = clients.id
			ORDER BY contrats.created_at DESC"
		);
	}


	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function contratByClient($client_id){ 
		return $this->query("
			SELECT contrats.id, contrats.montant, contrats.date_deb, contrats.date_fin, contrats.date_sign, contrats.type_cont, contrats.client_id, contrats.created_at, contrats.updated_at, contrats.created_by, contrats.updated_by, contrats.statut,        clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut

			FROM contrats
			LEFT JOIN clients ON contrats.client_id = clients.id
			WHERE contrats.client_id = ?
			ORDER BY clients.created_at DESC", [$client_id] );
	}



	/**
		* Récupère un livre en liant à son auteur
		*@ param $id int
		* @return \App\Entity\BookEntity
	*/
	public function find($id){
		return $this->query("
			SELECT contrats.id, contrats.montant, contrats.date_deb, contrats.date_fin, contrats.date_sign, contrats.type_cont, contrats.client_id, contrats.created_at, contrats.updated_at, contrats.created_by, contrats.updated_by, contrats.statut,        clients.name as _client_name, clients.place as _client_place, clients.systeme as _client_systeme, clients.email as _client_email, clients.tel as _client_tel, clients.fax as _client_fax, clients.created_at as _client_created_at, clients.updated_at as _client_updated_at, clients.created_by as _client_created_by, clients.updated_by as _client_updated_by, clients.statut as _client_statut

			FROM contrats
			LEFT JOIN clients ON contrats.client_id = clients.id
			WHERE contrats.id = ?", [$id], true );
	}


	public function total_actif(){ 
		return $this->query("
			SELECT COUNT(id) as total_contrat
			FROM {$this->table}
			WHERE statut=1", "", true
		);
	}

	public function total_contrat_en_cours(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_contrat_en_cours
			FROM contrats WHERE date_fin>= NOW()", "", true
		);
	}


	public function total_contrat_echeant_dans_trois_mois(){ 
		return $this->query("SELECT COUNT(id) AS total_contrat_echeant_dans_trois_mois
			FROM contrats
			WHERE date_fin <= DATE_ADD(NOW(), INTERVAL 3 MONTH) AND 
			date_fin>=NOW()", "", true
		);
	}


	public function total_contrat_echu(){ 
		return $this->query("SELECT COUNT(id) AS 
			total_contrat_echu
			FROM contrats WHERE date_fin<= NOW()", "", true
		);
	}

	

}

?>