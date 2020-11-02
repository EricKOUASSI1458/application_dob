<?php
$clientTable = App::getInstance()->getTable('Client');
if(!empty($_POST)){
    $result = $clientTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: index.php?p=client.all');
}
?>