<?php
$opt = ['Maintenance' => 'Maintenance', 'Deployement'=>'Deployement'];
$contratTable = App::getInstance()->getTable('Contrat');
if(!empty($_POST)){
	$result = $contratTable->create([
		'montant' => $_POST['montant'],
		'date_deb' => $_POST['date_deb'],
		'date_fin' => $_POST['date_fin'],
		'date_sign' => $_POST['date_sign'],
		'type_cont' => $_POST['type_cont'],
		'client_id' => $_POST['client_id'],
		'created_at' => date('Y-m-d'),
		'created_by' => 1,
		'statut' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=contrat_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$client = App::getInstance()->getTable('Client')->extract('id','name');

$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('montant', 'Montant', ['type' =>'number']);?>
		<?= $form->input('date_deb', 'Date debut', ['type' =>'date']);?>
		<?= $form->input('date_fin', 'Date fin', ['type' =>'date']);?>
		<?= $form->input('date_sign', 'Date signature', ['type' =>'date']);?>
		<?= $form->select('type_cont', 'Type contrat', $opt);?>
		<?= $form->select('client_id', 'Client', $client);?>

		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


