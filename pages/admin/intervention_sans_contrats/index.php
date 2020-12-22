<?php
$app = App::getInstance();
$tableClient = $app->getTable('Client');
$tableIntervention_sans_contrat = $app->getTable('Intervention_sans_contrat');
$app->titre_page = "All Interventions";
?>

<div class="row">
	<h1 align="center">Liste des interventions sans contrat
    </h1>




	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Date</th>
                <th>Rapport</th>
                <th>Prestatire</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach($tableIntervention_sans_contrat->last() as $intervention): ?>
        <?php
        if ($intervention->statut) {?> 

               
        <tr>
            <td><?= $intervention->id ?></td>
            <td> <?= $intervention->_client_name?> </td>
            <td><?= $intervention->dte_int ?></td>
            <td><?=    substr($intervention->rapport_int,0,20) ?> ...</td>
            <td><?= $intervention->_prestataire_name ?> </td>
        	<td>
	            <a  href="?p=intervention.sans.contrat_admin_show&id=<?= $intervention->id;?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
	            <a   href="?p=intervention.sans.contrat_admin_edit&id=<?= $intervention->id;?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="?p=intervention.sans.contrat_admin_delete" style="display: inline;" method="post">
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
