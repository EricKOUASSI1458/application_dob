<?php
	$app = App::getInstance();

	$intervention_sans_contrat = $app->getTable('Intervention_sans_contrat')->find($_GET['id']);

	if($intervention_sans_contrat === false){
		$app->notFound();
	}

	$app->titre_page = $intervention_sans_contrat->dte_int ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur intervention</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <strong>Date intervention : </strong>
                <?= $intervention_sans_contrat->dte_int  ?>
            </div>
            <div class="col-md-4">
                <strong>Prestataire : </strong>
                <?= $intervention_sans_contrat->_prestataire_name  ?>
            </div>
            <div class="col-md-4">
                <strong>Client : </strong>
                <?= $intervention_sans_contrat->_client_name  ?>
            </div>
        </div>

        <div class="col-md-12">
            <h3><strong>Rapport </strong></h3>
            <blockquote><?= $intervention_sans_contrat->rapport_int  ?></blockquote>
        </div>
    </div>
<!-- ***************** -->




    
    

    <div>
        <h2 align="right">
            <a href="?p=intervention_sans_contrat.all" type="button" class="btn btn-xs btn-orange-ci">Retour</a>
        </h2>
    </div>
</div>
