<?php
$bookTable = App::getInstance()->getTable('Produit');
if(!empty($_POST)){
	$result = $bookTable->create([
		'name' => $_POST['name'],
		'prix' => $_POST['prix'],
		'detail' => $_POST['detail'],
		'categorie_id' => $_POST['categorie_id'],
		'fournisseur_id' => $_POST['fournisseur_id']
	]);
	if($result){
		header('Location: admin.php');
		/*header('Location: admin.php?p=books.edit&id=' . App::getInstance()->getDb()->lastInsertId());*/
	}
}

$categories = App::getInstance()->getTable('Categorie')->extract('id', 'name');
$fournisseurs = App::getInstance()->getTable('Fournisseur')->extract('id', 'name');
$form = new \Core\HTML\BootstrapForm($_POST);

?>

<form method="post">
	<?= $form->input('name', 'Nom du produit');?>
	<?= $form->input('prix', 'Prix du produit');?>
	<?= $form->input('detail', 'Detail', ['type' => 'textarea'] );?>
	<?= $form->select('categorie_id', 'Categorie', $categories );?>
	<?= $form->select('fournisseur_id', 'Fournisseur', $fournisseurs );?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>