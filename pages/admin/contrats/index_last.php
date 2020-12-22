<?php
$app = App::getInstance();
$app->titre_page = "All contrats";

$contrat = $app->getTable('Contrat');
?>

<div class="row">
    <h1 align="">Liste des contrats
        <a href="?p=contrat_admin_add" class="btn  btn-orange-ci pull-right">Ajouter un contrat</a>
    </h1>

    <div class="col-md-12">

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class=" col-md-4">
                <a href="?p=contrat_admin_list_encours" type="button" class="btn btn-xs btn-success">En cours  
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_en_cours()->total_contrat_en_cours ?>)
                    </span>
                </a>
            </div>
            <div class=" col-md-4">
                <a href="?p=contrat_admin_list_expirant_3_mois" type="button" class="btn btn-xs btn-warning">
                    Echéant en moin de trois mois
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_echeant_dans_trois_mois()->total_contrat_echeant_dans_trois_mois ?>)
                    </span>
                </a>
            </div>
            <div class=" col-md-4">
                <a href="?p=contrat_admin_list_echue" type="button" class="btn btn-xs btn-danger">
                    Echus
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_echu()->total_contrat_echu ?>)
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-12" style="margin-bottom: 20px;"></div>
    </div>


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

               
        <tr class="bg-rouge" style="background-color: #d9534f">
            <td><?= $client->id ?></td>
            <td><?= $client->_client_name ?></td>
            <td><?= $client->date_deb ?></td>
            <td><?= $client->date_fin ?></td>
            <td><?= $client->montant ?> FCFA</td>
            <td><?= $client->type_cont ?></td>
            <td>
                <a href="?p=contrat_admin_show&id=<?= $client->id;?>" title="Plus d'info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <a href="?p=contrat_admin_edit&id=<?= $client->id;?>"  title="Modifier">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                <form action="?p=contrat_admin_delete" style="display: inline;" method="post">
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
