<?php
    $app = App::getInstance();

    $client = $app->getTable('Client')->total_actif();
    $prestataire = $app->getTable('Prestataire')->total_actif();
    $commercial = $app->getTable('Commercial')->total_actif();
    $intervention = $app->getTable('Intervention');
    $intervention_sans_contrat = $app->getTable('Intervention_sans_contrat')->total_actif();
    $app->titre_page = "Statistique" ;

    /*variables contrats*/
    $contrat = $app->getTable('Contrat');
    
?>


<div class="well well-lg">         
    <div class="row">
        <div class="col-md-12">
            <!-- <a  href="?p=commercial_admin" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left"><?= $commercial->total_commercial ?></h1>
                <p>Commerciaux</p>
            </a> -->
            <a  href="?p=client.all" class="col-md-3 btn btn-xs btn-orange-ci">
                <h1 align="left"><?= $client->total_client ?><br></h1>
                <p>Clients</p>
            </a>
            <a  href="?p=prestataire.all" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left"><?= $prestataire->total_prestataire ?></h1>
                <p>Prestataires</p>
            </a>
            <a  href="?p=contrat.all" class="col-md-3 btn btn-xs btn-orange-ci">
                <h1 align="left"><?= $contrat->total_actif()->total_contrat ?></h1>
                <p>Contrats</p>
            </a>
            <a href="?p=contrat.list_encours" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left">
                    <?= $contrat->total_contrat_en_cours()->total_contrat_en_cours ?>
                </h1>
                <p>Contrats en cours</p>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top: 20px;">
            <!-- <a href="?p=contrat_admin_list_encours" class="col-md-3 btn btn-xs btn-orange-ci">
                <h1 align="left">
                    <?= $contrat->total_contrat_en_cours()->total_contrat_en_cours ?>
                </h1>
                <p>Contrat en cours</p>
            </a> -->
            <a href="?p=contrat.list_echue" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left">
                    <?= $contrat->total_contrat_echu()->total_contrat_echu ?>
                </h1>
                <p>Contrats échus</p>
            </a>
            <a href="?p=contrat.list_expirant_3_mois" class="col-md-3 btn btn-xs  btn-orange-ci">
                <h1 align="left">
                    <?= $contrat->total_contrat_echeant_dans_trois_mois()->total_contrat_echeant_dans_trois_mois ?>
                </h1>
                <p>Contrats expirant dans 3 mois</p>
            </a>
            <a href="?p=intervention.all" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left"><?= $intervention->total_actif()->total_intervention ?></h1>
                <p>Interventions</p>
            </a>

            <a href="?p=intervention_sans_contrat.all" class="col-md-3 btn btn-xs  btn-orange-ci">
                <h1 align="left">
                    <?= $intervention_sans_contrat->total_intervention_sans_contrat ?>
                </h1>
                <p>Interventions sans contrat</p>
            </a>
        </div>
    </div>

    <div class="row"  style="margin-top: 20px;">
        <div class="col-md-12">
            <a  href="?p=intervention.list_realisee" class="col-md-3 btn btn-xs btn-orange-ci">
                <h1 align="left"><?= $intervention->total_realise()->total_realise ?><br></h1>

                <p>Interventions réalisées</p>
            </a>
            <a  href="?p=intervention.list_a_venir" class="col-md-3 btn btn-xs btn-default">
                <h1 align="left"><?= $intervention->total_a_venir()->total_a_venir ?></h1>
                <p>Interventions à venir</p>
            </a>
            <a  href="?p=intervention.list_mois_courant" class="col-md-3 btn btn-xs btn-orange-ci">
                <h1 align="left">
                    <?= $intervention->total_mois_courant()->total_mois_courant ?>
                </h1>
                <p>Interventions du mois</p>
            </a>
        </div>
    </div>




</div>
