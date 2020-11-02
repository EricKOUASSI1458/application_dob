<?php
$commercialTable = App::getInstance()->getTable('Commercial');
if(!empty($_POST)){
	$result = $commercialTable->update($_GET['id'], [
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: index.php?p=commercial.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$commercial = $commercialTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($commercial);

?>

<div class="well well-lg">
	<form method="post">
		<?= $form->input('name', 'Nom');?>
		<?= $form->input('email', 'Email');?>
		<?= $form->input('tel', 'Tel');?>
		<button class="btn btn-primary">Sauvegarder</button>
	</form>
</div>


