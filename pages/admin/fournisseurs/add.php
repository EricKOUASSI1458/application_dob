<?php
$userTable = App::getInstance()->getTable('Fournisseur');
if(!empty($_POST)){
	$result = $userTable->create([
		'name' => $_POST['name'],
		'sit_geo' => $_POST['sit_geo'],
		'contact' => $_POST['contact']
	]);
	if($result){
		header('Location: admin.php?p=fournisseurs.all');
		/*header('Location: admin.php?p=fournisseur.edit&id=' . App::getInstance()->getDb()->lastInsertId());*/
	}
}

$form = new \Core\HTML\BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('name', 'Nom');?>
	<?= $form->input('sit_geo', 'Siège');?>
	<?= $form->input('contact', 'Contact');?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>