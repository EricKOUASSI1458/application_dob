<?php
$userTable = App::getInstance()->getTable('Fournisseur');
if(!empty($_POST)){
	$result = $userTable->update($_GET['id'], [
		'name' => $_POST['name'],
		'sit_geo' => $_POST['sit_geo'],
		'contact' => $_POST['contact']
	]);
	if($result){
		
		header('Location: admin.php?p=fournisseurs.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$user = $userTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($user);

?>

<form method="post">
	<?= $form->input('name', 'Nom');?>
	<?= $form->input('sit_geo', 'Siège');?>
	<?= $form->input('contact', 'Contact');?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>