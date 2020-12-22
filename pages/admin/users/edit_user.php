<?php
$opt = [0 => 'user', 1 =>'Admin'];
$prestataireTable = App::getInstance()->getTable('User');
if(!empty($_POST)){
	$result = $prestataireTable->update($_GET['id'], [
		'type_user' => $_POST['type_user'],
		'login' => $_POST['login'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => $_SESSION['auth']
	]);
	if($result){
		
		header('Location: admin.php?p=user_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$prestataire = $prestataireTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($prestataire);

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Mise à jour utilisateur</h2>
	<form method="post">
		<?= $form->input('login', 'Login');?>
		<?= $form->select('type_user', 'Fonction', $opt);?>

		<div style="margin-top: 15px;"></div>
		
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=user_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


