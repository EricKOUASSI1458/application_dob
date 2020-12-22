<?php
$contratTable = App::getInstance()->getTable('Intervention_sans_contrat');
if(!empty($_POST) && !empty($_GET['id']) ){
	$result = $contratTable->create([
		'dte_int' => $_POST['dte_int'],
		'rapport_int' => $_POST['rapport_int'],
		'client_id' => $_GET['id'],
		'prestataire_id' => $_POST['prestataire_id'],
		'created_at' => date('Y-m-d'),
		'montant' => $_POST['montant'],
		'created_by' => 1,
		'statut' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=client_admin_show&id='.$_GET['id']);
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrats = App::getInstance()->getTable('Contrat')->last();
$prestataire = App::getInstance()->getTable('Prestataire')->extract('id','name');
$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('dte_int', 'Date', ['type' =>'date']);?>
		<?= $form->input('rapport_int', 'Rapport', ['type' =>'textarea']);?>
		<?= $form->select('prestataire_id', 'Prestataire', $prestataire);?>
		<?= $form->input('montant', 'Montant', ['type' =>'number']);?>
		<div style="margin-top: 15px;"></div>
		
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=client_admin_show&id=<?= $_GET['id']?>" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


