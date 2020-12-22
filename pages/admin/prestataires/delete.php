<?php
$prestataireTable = App::getInstance()->getTable('prestataire');
if(!empty($_POST)){
    $result = $prestataireTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: admin.php?p=prestataire_admin');
}
?>