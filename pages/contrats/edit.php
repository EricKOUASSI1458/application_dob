<?php
$opt = ['Maintenance' => 'Maintenance', 'Deployement'=>'Deployement'];
$contratTable = App::getInstance()->getTable('Contrat');
if(!empty($_POST)){
	$result = $contratTable->update($_GET['id'], [
		'montant' => $_POST['montant'],
		'date_deb' => $_POST['date_deb'],
		'date_fin' => $_POST['date_fin'],
		'date_sign' => $_POST['date_sign'],
		'type_cont' => $_POST['type_cont'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: index.php?p=contrat.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrat = $contratTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($contrat);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('montant', 'Montant', ['type' =>'number']);?>
		<?= $form->input('date_deb', 'Date debut', ['type' =>'date']);?>
		<?= $form->input('date_fin', 'Date fin', ['type' =>'date']);?>
		<?= $form->input('date_sign', 'Date signature', ['type' =>'date']);?>
		<?= $form->select('type_cont', 'Type contrat', $opt);?>

		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


