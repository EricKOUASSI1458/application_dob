<?php
	$app = App::getInstance();

	$client = $app->getTable('Client')->find($_GET['id']);
    $contrats = $app->getTable('Contrat')->contratByClient($_GET['id']);
    $interventions = $app->getTable('Intervention');
	if($client === false){
		$app->notFound();
	}

	$app->titre_page = $client->name ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur client</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-4 text-right">
                <h2>Nom</h2>
            </div>
            <div class="col-md-4"><h2><?= $client->name  ?></h2></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Siège</strong></div>
            <div class="col-md-3">
                <?= $client->place  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Email</strong></div>
            <div class="col-md-3">
                <?= $client->email  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Tel</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $client->tel  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Fax</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $client->fax  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Produit</strong></div>
            <div class="col-md-3">
                <?= $client->systeme  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Commercial</strong></div>
            <div class="col-md-3">
                <?= $client->commercial  ?>
            </div>
        </div>
    </div>

    









    <!-- ***************** -->

    <h3 class="text-center" style="color: #f16b0c;">Contrats de <?= $client->name  ?></h3>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <!-- <th>Montant</th> -->
                <th>Type contrat</th>
                <th>Nombre intervention</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach($contrats as $contrat): ?>
        <tr>
        	<td><?= $contrat->id ?></td>
        	<td><?= $contrat->date_deb ?></td>
        	<td><?= $contrat->date_fin ?></td>
        	<!-- <td><?= $contrat->montant ?> FCFA</td> -->
        	<td><?= $contrat->type_cont ?></td>
        	<td align="center"><?= $interventions->nb_intervention_by_contrat($contrat->id)->nb_intervention_by_contrat ?>   
            </td>
            <td align="center">
                <a title="Plus d'info"  data-toggle="collapse" data-target="#<?= $contrat->id ?>">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
            </td>
        </tr>

        <!-- recap intervention  -->
        <tr id="<?= $contrat->id ?>" class="collapse" style="background-color: rgb(255, 165, 121);">
            <td colspan="6">
                <?php
                if ($interventions->nb_intervention_by_contrat($contrat->id)->nb_intervention_by_contrat) {
                    ?>
                    <h6 align="center">Recap sur les interventions du contrat</h6>
                    <div class="col-md-12">
                        <strong class="col-md-3 ">Date</strong>
                        <strong class="col-md-4 ">Rapport</strong>
                        <strong class="col-md-3 ">Prestataire</strong>
                        <strong class="col-md-2 ">Statut</strong>
                    </div>

                    <!-- iteration intervention -->
                    <?php foreach($interventions->interventionByContrat($contrat->id) as $intervention): ?>
                    <div class="col-md-12">
                        <div class="col-md-3" style="font-style: italic;"><?= $intervention->dte_int?>
                        </div>
                        <div class="col-md-4" style="font-style: italic;">
                            <?=    substr($intervention->rapport_int,0,30) ?> ...
                        </div>
                        <div class="col-md-3" style="font-style: italic;">
                            <?= $intervention->_prestataire_name ?>
                        </div>
                        <div class="col-md-2" style="font-style: italic;">
                            <?php
                                if($intervention->dte_int <= date('Y-m-d') ){
                                    echo "Réalisé";
                                }else{
                                    echo "A réaliser";
                                }
                            ?>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <!-- iteration intervention -->


                    <?php
                }else{
                    ?>
                    <h6 align="center">Pas d'intervention pour ce contrat</h6>
                    <?php
                }
                ?>

            </td>
        </tr>
        <!-- recap intervention  -->

        
		<?php endforeach;?>
    </table>




<!-- block interventions sans contrat -->
    <h3 class="text-center" style="color: #f16b0c;">Interventions sans contrat de <?= $client->name  ?></h3>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Prestataire</th>
                <th>Montant</th>
                <th>Rapport</th>
            </tr>
        </thead>
        <?php foreach($app->getTable('Intervention_sans_contrat')->interventionByClient($client->id) as $intervention_sans_contrat): ?>
        
            <?php if ($intervention_sans_contrat->statut) {?>
                <tr>
                    <td><?= $intervention_sans_contrat->id ?></td>
                    <td><?= $intervention_sans_contrat->dte_int ?></td>
                    <td><?= $intervention_sans_contrat->_prestataire_name ?></td>
                    <td><?= $intervention_sans_contrat->montant ?>  FCFA</td>
                    <td>
                        <?= substr($intervention_sans_contrat->rapport_int,0,11) ?>
                    </td>
                </tr>
            <?php } ?>

        <?php endforeach;?>
    </table>

<!-- block interventions sans contrat -->






    <!-- bouton action -->
    <div class="row">
        <div class="col-md-12">
            <h2 align="left"  class="col-md-4">
                <a href="?p=contrat_admin_add_cible&id=<?= $client->id;?>" type="button" class="btn btn-xs btn-orange-ci">Ajouter un contrat</a>
            </h2>

            <h2 align="center"  class="col-md-4">
                <a href="?p=intervention.sans.contrat_admin_add&id=<?= $client->id;?>" type="button" class="btn btn-xs btn-orange-ci">Interventions sans contrat</a>
            </h2>

            <h2 align="right"  class="col-md-4">
                <a href="?p=client_admin" type="button" class="btn btn-xs btn-orange-ci">Retour</a>
            </h2>
        </div>
    </div>
    
</div>


