<?php
$categorieTable = App::getInstance()->getTable('Categorie');
if(!empty($_POST)){
	$result = $categorieTable->update($_GET['id'], [
		'name' => $_POST['name']
	]);
	if($result){
		
		header('Location: admin.php?p=categories.all');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$user = $categorieTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($user);

?>

<form method="post">
	<?= $form->input('name', 'Nom');?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>