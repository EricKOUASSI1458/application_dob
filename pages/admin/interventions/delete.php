<?php
$clientTable = App::getInstance()->getTable('Intervention');
if(!empty($_POST)){
    $result = $clientTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: admin.php?p=intervention_admin');
}
?>