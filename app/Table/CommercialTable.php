<?php 
	namespace App\Table;
	use Core\Table\Table;

	class CommercialTable extends Table{
		protected $table = "commercials";

		public function total_actif(){ 
			return $this->query("
				SELECT COUNT(id) as total_commercial
				FROM {$this->table}
				WHERE statut=1", "", true
			);
		}
	}
?>