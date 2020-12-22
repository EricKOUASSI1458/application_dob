<?php
$clientTable = App::getInstance()->getTable('Intervention_sans_contrat');
if(!empty($_POST)){
    $result = $clientTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: admin.php?p=intervention.sans.contrat_admin');
}
