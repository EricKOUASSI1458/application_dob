<?php 
	namespace App\Table;
	use Core\Table\Table;

	class UserTable extends Table{
		protected $table = "users";

		public function total_actif(){ 
			return $this->query("
				SELECT COUNT(id) as total_commercial
				FROM {$this->table}
				WHERE statut=1", "", true
			);
		}
	}
?>