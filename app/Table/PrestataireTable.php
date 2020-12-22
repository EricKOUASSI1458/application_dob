<?php 
	namespace App\Table;
	use Core\Table\Table;

	class PrestataireTable extends Table{
		protected $table = "prestataires";

		public function total_actif(){ 
			return $this->query("
				SELECT COUNT(id) as total_prestataire
				FROM {$this->table}
				WHERE statut=1", "", true
			);
		}



	}

?>