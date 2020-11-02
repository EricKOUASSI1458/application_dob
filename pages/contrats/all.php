<?php
$app = App::getInstance();
$app->titre_page = "All contrats";
?>

<div class="row">
	<h1 align="center">Liste des contrats</h1>
	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Montant</th>
                <th>Type</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('Contrat')->last() as $client): ?>
        <?php
        if ($client->statut) {?> 

               
        <tr>
            <td><?= $client->id ?></td>
            <td><?= $client->_client_name ?></td>
            <td><?= $client->date_deb ?></td>
            <td><?= $client->date_fin ?></td>
            <td><?= $client->montant ?> FCFA</td>
            <td><?= $client->type_cont ?></td>
        	<td>
	            <a  href="<?= $client->showUrl();?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
	            <a  href="<?=$client->editUrl()?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="<?=$client->deleteUrl()?>" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$client->id?>">
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
