<?php
$contratTable = App::getInstance()->getTable('Intervention');


if(!empty($_POST)){
	
	var_dump($_FILES['fiche_int']['name']);
	var_dump(basename($_FILES['fiche_int']['name']));
	$uploaddir = '/laragon/www/application_dob/uploads/';
	$uploadfile = $uploaddir . '_'. date('Y-m-d') .'_'. basename($_FILES['fiche_int']['name']);
	$file_fiche = move_uploaded_file($_FILES['fiche_int']['tmp_name'] , $uploadfile);	
	
	$result = $contratTable->create([
		'dte_int' => $_POST['dte_int'],
		'rapport_int' => $_POST['rapport_int'],
		'contrat_id' => $_POST['contrat_id'],
		'prestataire_id' => $_POST['prestataire_id'],
		'fiche_int' => $uploadfile,
		'created_at' => date('Y-m-d'),
		'created_by' => 1,
		'statut' => 1
	]);
	if($result){
		header('Location: admin.php?p=intervention_admin');
	}

}

$contrats = App::getInstance()->getTable('Contrat')->last();
$prestataire = App::getInstance()->getTable('Prestataire')->extract('id','name');
$form = new \Core\HTML\BootstrapForm();

?>

<div class="well well-lg">
	<h2 align="center" class="font-color-orange">Ajouter une intervention</h2>
	<form enctype="multipart/form-data" method="post">
		<?= $form->input('dte_int', 'Date', ['type' =>'date']);?>
		<?= $form->input('rapport_int', 'Rapport', ['type' =>'textarea']);?>
		<?= $form->input('fiche_int', 'Fiche intervention', ['type' =>'file']);?>
		<?= $form->select('prestataire_id', 'Prestataire', $prestataire);?>

		<div class="form-group">
		<label>Contrat</label>
			<select class="form-control" name="contrat_id">
				<option value=""></option>
				<?php foreach($contrats as $contrat): ?>
				 	<option value="<?=$contrat->id?>">
				 		<strong>
				 			<?=$contrat->_client_name?>
				 		</strong> ===> CONTRAT DU <?=$contrat->date_deb?>
				 	</option>
            
            	<?php endforeach; ?>
            </select>
		</div>

		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary col-md-2">Enregistrer</button>

				<div class="col-md-8"></div>

				<a href="?p=intervention_admin" type="button" class="btn orange_inverse col-md-2">Retour</a>
			</div>
		</div>
	</form>
</div>


