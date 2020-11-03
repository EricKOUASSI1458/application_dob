<?php
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if(!empty($_POST)){
	
	if($auth->login($_POST['username'], $_POST['password'])){
		if($_SESSION['type_user']){
			header('Location: admin.php');
		}else{
			header('Location: index.php?p=commercial.all');
		}
		
	}else{
		?>
		<div class="alert alert-danger">
			Identifiant incorrect
		</div>
		<?php
	}
}
$form = new \Core\HTML\BootstrapForm($_POST);

?>
<div style="margin-top: 200px;"></div>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 well well-lg">
		<form method="post">
			<?= $form->input('username', 'Pseudo');?>
			<?= $form->input('password', 'Mot de passe', ['type' => 'password'] );?>
			<button class="btn btn-primary" style="margin-top: 20px;">Envoyer</button>
		</form>
	</div>
	<div class="col-md-3"></div>
</div>