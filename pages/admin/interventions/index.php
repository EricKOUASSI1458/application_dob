<?php
$app = App::getInstance();
$tableClient = $app->getTable('Client');
$tableIntervention = $app->getTable('Intervention');
$app->titre_page = "All Interventions";
?>

<div class="row">
	<h1 align="">Liste des interventions
        <a href="?p=intervention_admin_add" class="btn  btn-orange-ci pull-right">Ajouter une intervention</a>
    </h1>

    <div class="col-md-12">

        <div class="col-md-2"></div>
        <div class="col-md-12">
            <div class=" col-md-3">
                <a href="?p=intervention_admin" type="button" class="btn btn-sm  orange_inverse">Toutes les interventions 
                    <span style="font-style: italic;">
                        (<?= $tableIntervention->total_actif()->total_intervention ?>)
                    </span>
                </a>
            </div>

            <div class=" col-md-3">
                <a href="?p=intervention_admin_realisee" type="button" class="btn btn-sm  btn-success">Interventions réalisées
                    <span style="font-style: italic;">
                        (<?= $tableIntervention->total_realise()->total_realise ?>)
                    </span>
                </a>
            </div>
            
            <div class=" col-md-3">
                <a href="?p=intervention_mois_courant" type="button" class="btn btn-sm  btn-success">
                    Interventions du mois
                    <span style="font-style: italic;">
                        (<?= $tableIntervention->total_mois_courant()->total_mois_courant ?>)
                    </span>
                </a>
            </div>

            <div class=" col-md-3">
                <a href="?p=intervention_admin_a_venir" type="button" class="btn btn-sm  orange_inverse">
                    Interventions à venir
                    <span style="font-style: italic;">
                        (<?= $tableIntervention->total_a_venir()->total_a_venir ?>)
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-12" style="margin-bottom: 20px;"></div>
    </div>




	<table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Date</th>
                <th>Rapport</th>
                <th>Prestatire</th>
                <th>Contrat du</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach($tableIntervention->last() as $intervention): ?>
        <?php
        if ($intervention->statut) {

            if ($intervention->dte_int < date('Y-m-d') ){?>
            <tr class="bg-rouge">  
            <?php
                }else{
                    ?>
            <tr>
                    <?php
                }
            ?>
                <td><?= $intervention->id ?></td>
                <td> <?= $tableClient->find($intervention->_contrat_client_id)->name ?> </td>
                <td><?= $intervention->dte_int ?></td>
                <td><?=    substr($intervention->rapport_int,0,20) ?> ...</td>
                <td><?= $intervention->_prestataire_name ?> </td>
                <td><?= $intervention->_contrat_date_deb ?></td>
            	<td>
    	            <a  href="?p=intervention_admin_show&id=<?= $intervention->id;?>" title="Plus d'info">
    	                <span class="glyphicon glyphicon-eye-open"></span>
    	            </a>
    	            <a   href="?p=intervention_admin_edit&id=<?= $intervention->id;?>"  title="Modifier">
    	                <span class="glyphicon glyphicon-pencil"></span>
    	            </a>

                    <form action="?p=intervention_admin_delete" style="display: inline;" method="post">
                        <input type="hidden" name="id" value="<?=$intervention->id?>">
                        <button type="submit">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>

            	</td>
            </tr>


        <?php
            }
            endforeach;
        ?>
                    
                   
                    
    </table>

</div>
