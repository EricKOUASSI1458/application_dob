<?php
$bookTable = App::getInstance()->getTable('Produit');
if(!empty($_POST)){
	$result = $bookTable->update($_GET['id'], [
		'name' => $_POST['name'],
		'detail' => $_POST['detail'],
		'fournisseur_id' => $_POST['fournisseur_id']
	]);
	if($result){
		?>
		<div class="alert alert-success">Bien modifié</div>
		<?php
	}
}

$book = $bookTable->find($_GET['id']);
$users = App::getInstance()->getTable('Fournisseur')->extract('id', 'name');
$form = new \Core\HTML\BootstrapForm($book);

?>

<form method="post">
	<?= $form->input('name', 'Titre du livre');?>
	<?= $form->input('detail', 'Descrition', ['type' => 'textarea'] );?>
	<?= $form->select('fournisseur_id', 'User', $users );?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>