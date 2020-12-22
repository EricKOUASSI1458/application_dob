<?php
$prestataireTable = App::getInstance()->getTable('User');
if(!empty($_POST)){
    $result = $prestataireTable->update($_POST['id'], [
		'statut' => 0,
		'updated_by' => 1
	]);
	header('Location: admin.php?p=user_admin');
}
?>