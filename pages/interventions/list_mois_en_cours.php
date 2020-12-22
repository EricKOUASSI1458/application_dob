<?php
$app = App::getInstance();
$tableClient = $app->getTable('Client');
$tableIntervention = $app->getTable('Intervention');
$app->titre_page = "All Interventions";


/*variable pour gerer le filtre sur le mois en cours*/
$date_instance = new DateTime();
$dte_deb_mois = $date_instance->format("Y-m-01");
$dte_fin_mois = $date_instance->format("Y-m-t");
?>

<div class="row">
	<h1 align="">Interventions du mois
        <a href="?p=intervention_admin_add" class="btn  btn-orange-ci pull-right">Ajouter une intervention</a>
    </h1>

    <?php include('main_menu_intervention.php') ?>



	<table class='table table-bordered table-striped'>
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
        if ($intervention->statut && $intervention->dte_int >= $dte_deb_mois && $intervention->dte_int <= $dte_fin_mois ) {?> 

               
        <tr>
            <td><?= $intervention->id ?></td>
            <td> <?= $tableClient->find($intervention->_contrat_client_id)->name ?> </td>
            <td><?= $intervention->dte_int ?></td>
            <td><?=    substr($intervention->rapport_int,0,20) ?> ...</td>
            <td><?= $intervention->_prestataire_name ?> </td>
            <td><?= $intervention->_contrat_date_deb ?></td>
        	<td align="center">
                <a  href="<?= $intervention->showUrl();?>" title="Plus d'info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <!-- <a   href="?p=intervention_admin_edit&id=<?= $intervention->id;?>"  title="Modifier">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                <form action="?p=intervention_admin_delete" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$intervention->id?>">
                    <button type="submit">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </form> -->

            </td>
        </tr>


        <?php
            }
            endforeach;
        ?>
                    
                   
                    
    </table>

</div>




<?php
    


    
?>