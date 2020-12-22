<?php
$intervention_sans_contratTable = App::getInstance()->getTable('Intervention_sans_contrat');
if(!empty($_POST)){
	$result = $intervention_sans_contratTable->update($_GET['id'], [
		'dte_int' => $_POST['dte_int'],
		'rapport_int' => $_POST['rapport_int'],
		'updated_at' => date('Y-m-d'),
		'prestataire_id' => $_POST['prestataire_id'],
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=intervention.sans.contrat_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$intervention = $intervention_sans_contratTable->find($_GET['id']);
$prestataire = App::getInstance()->getTable('Prestataire')->extract('id','name');
$form = new \Core\HTML\BootstrapForm($intervention);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('dte_int', 'Date', ['type' =>'date']);?>
		<?= $form->input('rapport_int', 'Rapport', ['type' =>'textarea']);?>
		<?= $form->select('prestataire_id', 'Prestataire', $prestataire);?>
		<div style="margin-top: 15px;"></div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=intervention.sans.contrat_admin" type="button" class="btn btn-orange-ci col-md-2">Retour</a>
			</div>
		</div>
		

	</form>
</div>


