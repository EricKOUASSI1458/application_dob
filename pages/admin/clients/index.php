<div class="row">
	<h1>Liste des clients
    <a href="?p=client_admin_add" class="btn  btn-orange-ci pull-right">Ajouter un client</a></h1>
	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Siège</th>
                <th>Produit</th>
                <th>Tel</th>
                <th>Commercial</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('Client')->last() as $client): ?>
        <?php
        if ($client->statut) {?> 

               
        <tr>
            <td><?= $client->id ?></td>
        	<td><?=    substr($client->name,0,15) ?></td>
        	<td><?=    substr($client->place,0,20) ?></td>
        	<td><?= substr($client->systeme,0,6) ?></td>
            <td><?= $client->tel ?></td>
        	<td><?= $client->commercial ?></td>
        	<td>
	            <a  href="?p=client_admin_show&id=<?= $client->id;?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
	            <a  href="?p=client_admin_edit&id=<?= $client->id;?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="?p=client_admin_delete&id=<?= $client->id;?>" style="display: inline;" method="post">
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
