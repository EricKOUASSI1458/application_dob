<?php
$opt = [0 => 'user', 1 =>'Admin'];
$prestataireTable = App::getInstance()->getTable('User');
if(!empty($_POST)){
	$result = $prestataireTable->create([
		'login' => $_POST['login'],
		'password' => sha1($_POST['password']),
		'type_user' => $_POST['type_user'],
		'created_at' => date('Y-m-d'),
		'created_by' => $_SESSION['auth'],
		'statut' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=user_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}
}


$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Ajouter un utilisateur</h2>
	<form method="post">
		<?= $form->input('login', 'Login');?>
		<?= $form->input('password', 'Password', ['type' =>'password']);?>
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


