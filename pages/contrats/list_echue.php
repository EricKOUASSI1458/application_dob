<?php
$app = App::getInstance();
$app->titre_page = "Contrats échus";

$contrat = $app->getTable('Contrat');
?>

<div class="row">
    <h1 align="">Contrats échus
        <!-- <a href="?p=contrat_admin_add" class="btn  btn-orange-ci pull-right">Ajouter un contrat</a> -->
    </h1>

    <?php include('main_contrat.php') ?>


    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <!-- <th>Montant</th> -->
                <th>Type</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('Contrat')->last() as $client): ?>
        <?php
        if ($client->statut && $client->date_fin < date('Y-m-d')) {?> 

               
        <tr class="bg-rouge">
            <td><?= $client->id ?></td>
            <td><?= $client->_client_name ?></td>
            <td><?= $client->date_deb ?></td>
            <td><?= $client->date_fin ?></td>
            <!-- <td><?= $client->montant ?> FCFA</td> -->
            <td><?= $client->type_cont ?></td>
            <td align="center">
                    <a href="<?= $client->showUrl();?>" title="Plus d'info">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                <!-- <a href="?p=contrat_admin_edit&id=<?= $client->id;?>"  title="Modifier">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                <form action="?p=contrat_admin_delete" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$client->id?>">
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
