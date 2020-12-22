<?php 
namespace App\Table;
use Core\Table\Table;

class ClientTable extends Table{

	protected $table = 'clients';
	
	/**
		* Récupère les derniers livres
		* @return array
	*/
	public function last(){ 
		return $this->query("
			SELECT clients.id, clients.name, clients.place, clients.systeme, clients.email, clients.tel, clients.fax, clients.commercial_id, clients.created_at, clients.updated_at, clients.created_by, clients.updated_by, clients.statut, commercials.name as commercial, commercials.email as _commercial_email, commercials.tel as _commercial_tel, commercials.created_at as _commercial_created_at, commercials.updated_at as _commercial_updated_at, commercials.created_by as _commercial_created_by, commercials.updated_by as _commercial_updated_by, commercials.statut as _commercial_statut   
			FROM clients
			LEFT JOIN commercials ON clients.commercial_id = commercials.id
			ORDER BY clients.created_at DESC"
		);
	}

	/**
		* Récupère les derniers livres de l'auteur demandé
		*@ param $user_id int
		* @return array
	*/
	public function lastByCommercial($commercial_id){ 
		return $this->query("
			SELECT clients.id, clients.name, clients.place, clients.systeme, clients.email, clients.tel, clients.fax, clients.commercial_id, clients.created_at, clients.updated_at, clients.created_by, clients.updated_by, clients.statut, commercials.name as commercial, commercials.email as _commercial_email, commercials.tel as _commercial_tel, commercials.created_at as _commercial_created_at, commercials.updated_at as _commercial_updated_at, commercials.created_by as _commercial_created_by, commercials.updated_by as _commercial_updated_by, commercials.statut as _commercial_statut   
			FROM clients
			LEFT JOIN commercials ON clients.commercial_id = commercials.id
			WHERE clients.commercial_id = ?
			ORDER BY clients.created_at DESC", [$commercial_id] );
	}


	/**
		* Récupère un livre en liant à son auteur
		*@ param $id int
		* @return \App\Entity\BookEntity
	*/
	public function find($id){
		return $this->query("
			SELECT clients.id, clients.name, clients.place, clients.systeme, clients.email, clients.tel, clients.fax, clients.commercial_id, clients.created_at, clients.updated_at, clients.created_by, clients.updated_by, clients.statut, commercials.name as commercial, commercials.email as _commercial_email, commercials.tel as _commercial_tel, commercials.created_at as _commercial_created_at, commercials.updated_at as _commercial_updated_at, commercials.created_by as _commercial_created_by, commercials.updated_by as _commercial_updated_by, commercials.statut as _commercial_statut   
			FROM clients
			LEFT JOIN commercials ON clients.commercial_id = commercials.id
			WHERE clients.id = ?", [$id], true );
	}


	public function total_actif(){ 
		return $this->query("
			SELECT COUNT(id) as total_client
			FROM {$this->table}
			WHERE statut=1", "", true
		);
	}
}

?>