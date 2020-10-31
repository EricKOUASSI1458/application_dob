<?php
$categorieTable = App::getInstance()->getTable('Categorie');
if(!empty($_POST)){
	$result = $categorieTable->create([
		'name' => $_POST['name']
	]);
	if($result){
		header('Location: admin.php?p=categories.all');
		/*header('Location: admin.php?p=fournisseur.edit&id=' . App::getInstance()->getDb()->lastInsertId());*/
	}
}

$form = new \Core\HTML\BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('name', 'Nom');?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>