<?php
$clientTable = App::getInstance()->getTable('Client');
if(!empty($_POST)){
	$result = $clientTable->create([
		'name' => $_POST['name'],
		'place' => $_POST['place'],
		'systeme' => $_POST['systeme'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'fax' => $_POST['fax'],
		'commercial_id' => $_POST['commercial_id'],
		'created_at' => date('Y-m-d'),
		'created_by' => 1,
		'statut' => 1
	]);

	if($result){
		
		header('Location: admin.php?p=client_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$form = new \Core\HTML\BootstrapForm();

$commercial = App::getInstance()->getTable('Commercial')->extract('id','name');

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Ajouter un client</h2>
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('place', 'Siège');?>
		<?= $form->input('systeme', 'Produit');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<?= $form->input('fax', 'Fax');?>
		<?= $form->select('commercial_id', 'Commercial', $commercial);?>
		<div style="margin-top: 15px;"></div>
		
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=client_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


