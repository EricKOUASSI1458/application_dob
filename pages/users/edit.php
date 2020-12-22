<?php
$userTable = App::getInstance()->getTable('user');
if(!empty($_POST)){
	$result = $userTable->update($_SESSION['auth'], [
		'login' => $_POST['login'],
		'password' => sha1($_POST['password']),
		'updated_at' => date('Y-m-d'),
		'updated_by' => $_SESSION['auth']
	]);
	if($result){
		
		header('Location: index.php?p=info_user');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}

$user = $userTable->find($_SESSION['auth']);
$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Mise à jour infos compte</h2>
	<form method="post">
		<?= $form->input('login', 'Login');?>
		<?= $form->input('password', 'Mot de passe', ['type' =>'password']);?>
		<?= $form->input('password1', 'Confirmer mot de passe', ['type' =>'password']);?>
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=info_user" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


