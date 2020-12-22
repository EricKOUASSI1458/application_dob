<?php
$commercialTable = App::getInstance()->getTable('Commercial');
if(!empty($_POST)){
	$result = $commercialTable->create([
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'created_at' => date('Y-m-d'),
		'created_by' => 1,
		'statut' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=commercial_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}


$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<div style="margin-top: 15px;"></div>
		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


