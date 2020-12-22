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
		
		header('Location: admin.php?p=prestataire_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$prestataire = $prestataireTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($prestataire);

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Mise à jour prestataire</h2>
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('place', 'Siège');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<?= $form->input('fax', 'Fax');?>
		<div style="margin-top: 15px;"></div>
		
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=prestataire_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


