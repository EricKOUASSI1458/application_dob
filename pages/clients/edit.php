<?php
$clientTable = App::getInstance()->getTable('Client');
if(!empty($_POST)){
	$result = $clientTable->update($_GET['id'], [
		'name' => $_POST['name'],
		'place' => $_POST['place'],
		'systeme' => $_POST['systeme'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'fax' => $_POST['fax'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);

	if($result){
		
		header('Location: index.php?p=client.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrat = $clientTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($contrat);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('place', 'Siège');?>
		<?= $form->input('systeme', 'Produit');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<?= $form->input('fax', 'Fax');?>
		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


