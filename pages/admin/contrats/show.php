<?php
	$app = App::getInstance();

	$contrat = $app->getTable('Contrat')->find($_GET['id']);
    $interventions = $app->getTable('Intervention')->interventionByContrat($_GET['id']);
	if($contrat === false){
		$app->notFound();
	}

	$app->titre_page = $contrat->montant ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur contrat</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-4 text-right">
                <h2>Client : </h2>
            </div>
            <div class="col-md-4"><h2><?= $contrat->_client_name  ?></h2></div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Date debut</strong></div>
            <div class="col-md-3">
                <?= $contrat->date_deb  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Date fin</strong></div>
            <div class="col-md-3">
                <?= $contrat->date_fin  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Date signature</strong></div>
            <div class="col-md-3">
                <?= $contrat->date_sign  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Montant</strong></div>
            <div class="col-md-3">
                <?= $contrat->montant  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Type de contrat</strong></div>
            <div class="col-md-3">
                <?= $contrat->type_cont  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Nombre d'intervention</strong></div>
            <div class="col-md-3">
                XXX
            </div>
        </div>
    </div>

    


    <!-- ***************** -->

    <h3 class="text-center" style="color: #f16b0c;">Liste des interventions pour ce contrat </h3>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Date intervention</th>
                <th>Prestataire</th>
            </tr>
        </thead>
        <?php foreach($interventions as $intervention): ?>
        <tr>
        	<td><?= $intervention->id ?></td>
        	<td><?= $intervention->dte_int ?></td>
        	<td><?= $intervention->_prestataire_name ?></td>
        </tr>
		<?php endforeach;?>
    </table>
</div>
