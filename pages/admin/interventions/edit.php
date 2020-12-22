<?php
$contratTable = App::getInstance()->getTable('Intervention');
if(!empty($_POST)){
	$result = $contratTable->update($_GET['id'], [
		'dte_int' => $_POST['dte_int'],
		'rapport_int' => $_POST['rapport_int'],
		'prestataire_id' => $_POST['prestataire_id'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=intervention_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrat = $contratTable->find($_GET['id']);
$prestataire = App::getInstance()->getTable('Prestataire')->extract('id','name');
$form = new \Core\HTML\BootstrapForm($contrat);

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Mise à jour intervention</h2>
	<form method="post">
		<?= $form->input('dte_int', 'Date', ['type' =>'date']);?>
		<?= $form->input('rapport_int', 'Rapport', ['type' =>'textarea']);?>
		<?= $form->select('prestataire_id', 'Prestataire', $prestataire);?>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=intervention_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


