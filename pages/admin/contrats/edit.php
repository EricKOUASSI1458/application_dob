<?php
$opt = ['Maintenance' => 'Maintenance', 'Deployement'=>'Deployement'];
$contratTable = App::getInstance()->getTable('Contrat');
if(!empty($_POST)){
	/*script to determiner l'année prochaine*/
	$date = $_POST['date_deb'];
	$date = date("Y-m-d", strtotime($date ."+1 year"));
	/*script to determiner l'année prochaine*/

	$result = $contratTable->update($_GET['id'], [
		/*'montant' => $_POST['montant'],*/
		'date_deb' => $_POST['date_deb'],

		'date_fin'  => $date,

		'type_cont' => $_POST['type_cont'],
		'updated_at' => date('Y-m-d'),
		'updated_by' => 1
	]);
	if($result){
		
		header('Location: admin.php?p=contrat_admin');
		/*?><div class="alert alert-success">Bien modifié</div> <?php*/
		
	}

}

$contrat = $contratTable->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($contrat);

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Mise à jour contrat</h2>
	<form method="post">
		<!-- <?= $form->input('montant', 'Montant', ['type' =>'number']);?> -->
		<?= $form->input('date_deb', 'Date debut', ['type' =>'date']);?>
		<?= $form->select('type_cont', 'Type contrat', $opt);?>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=contrat_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


