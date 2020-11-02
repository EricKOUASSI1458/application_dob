<?php
$prestataireTable = App::getInstance()->getTable('Prestataire');
if(!empty($_POST)){
	$result = $prestataireTable->update($_GET['id'], [
		'name' => $_POST['name'],
		'place' => $_POST['place'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'fax' => $_POST['fax'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: index.php?p=prestataire.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$prestataire = $prestataireTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($prestataire);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('place', 'Siège');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<?= $form->input('fax', 'Fax');?>
		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


