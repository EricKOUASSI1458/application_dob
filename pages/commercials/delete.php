<?php
$commercialTable = App::getInstance()->getTable('Commercial');
if(!empty($_POST)){
    $result = $commercialTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: index.php?p=commercial.all');
}
?>