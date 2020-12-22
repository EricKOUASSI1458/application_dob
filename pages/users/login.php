<?php
$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
if(!empty($_POST)){
	
	if($auth->login($_POST['username'], $_POST['password'])){
		if($_SESSION['type_user']){
			header('Location: admin.php');
		}else{
			header('Location: index.php?p=accueil');
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
<div style="margin-top: 120px;"></div>
<div class="row">

	<div class="col-sm-12">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<p style="height: 100px;">
				<img src="../public/image/welcome.png" alt="logo oci">
			</p>
		</div>
		<div class="col-sm-3"></div>
		<!--  -->
	</div>

	<div class="col-sm-3">
			<img src="../public/image/logo.png" alt="logo oci">
	</div>
	<div class="col-sm-6 well well-lg">
		<form method="post">
			<?= $form->input('username', 'Pseudo');?>
			<?= $form->input('password', 'Mot de passe', ['type' => 'password'] );?>
			<button class="btn btn-primary col-sm-4" style="margin-top: 20px;">Valider</button>
			<div class="col-sm-4"></div>
			<a href="#" class="btn col-sm-4 orange_inverse" style="margin-top: 20px;">Mot de passe oublié</a>
		</form>
	</div>
	<div class="col-sm-3"></div>
</div>