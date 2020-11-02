<?php
$app = App::getInstance();
$tableClient = $app->getTable('Client');
$tableIntervention = $app->getTable('Intervention');
$app->titre_page = "All Interventions";
?>

<div class="row">
	<h1 align="center">Liste des Interventions</h1>
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
        if ($intervention->statut) {?> 

               
        <tr>
            <td><?= $intervention->id ?></td>
            <td> <?= $tableClient->find($intervention->_contrat_client_id)->name ?> </td>
            <td><?= $intervention->dte_int ?></td>
            <td><?=    substr($intervention->rapport_int,0,20) ?> ...</td>
            <td><?= $intervention->_prestataire_name ?> FCFA</td>
            <td><?= $intervention->_contrat_date_deb ?></td>
        	<td>
	            <a  href="<?= $intervention->showUrl();?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
	            <a  href="<?=$intervention->editUrl()?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="<?=$intervention->deleteUrl()?>" style="display: inline;" method="post">
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
