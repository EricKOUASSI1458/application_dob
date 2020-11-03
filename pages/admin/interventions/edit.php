<?php
$contratTable = App::getInstance()->getTable('Intervention');
if(!empty($_POST)){
	$result = $contratTable->update($_GET['id'], [
		'dte_int' => $_POST['dte_int'],
		'rapport_int' => $_POST['rapport_int'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: index.php?p=intervention.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrat = $contratTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($contrat);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('dte_int', 'Date', ['type' =>'date']);?>
		<?= $form->input('rapport_int', 'Rapport', ['type' =>'textarea']);?>

		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


