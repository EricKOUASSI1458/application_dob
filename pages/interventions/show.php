<?php
	$app = App::getInstance();

	$intervention = $app->getTable('intervention')->find($_GET['id']);
    $tableClient = $app->getTable('Client');

	if($intervention === false){
		$app->notFound();
	}

	$app->titre_page = $intervention->dte_int ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur intervention</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <strong>Date intervention : </strong>
                <?= $intervention->dte_int  ?>
            </div>
            <div class="col-md-4">
                <strong>Prestataire : </strong>
                <?= $intervention->_prestataire_name  ?>
            </div>
            <div class="col-md-4">
                <strong>Client : </strong>
                <?= $tableClient->find($intervention->_contrat_client_id)->name ?>
            </div>
        </div>

        <div class="col-md-12">
            <h3><strong>Rapport </strong></h3>
            <blockquote><?= $intervention->rapport_int  ?></blockquote>
        </div>
    </div>
<!-- ***************** -->




    
    <h1 class="text-center" style="color: #f16b0c;">Info sur Contrat</h1>
    





    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Date debut</strong></div>
            <div class="col-md-3">
                <?= $intervention->_contrat_date_deb  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Date fin</strong></div>
            <div class="col-md-3">
                <?= $intervention->_contrat_date_fin  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Date signature</strong></div>
            <div class="col-md-3">
                <?= $intervention->_contrat_date_sign  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Montant</strong></div>
            <div class="col-md-3">
                <?= $intervention->_contrat_montant  ?>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Type de intervention</strong></div>
            <div class="col-md-3">
                <?= $intervention->_contrat_type_cont  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Nombre d'intervention</strong></div>
            <div class="col-md-3">
                XXX
            </div>
        </div>
    </div>
</div>
