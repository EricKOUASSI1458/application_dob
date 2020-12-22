<div class="row">
	<h1 align="center">Liste des clients</h1>
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
        	<td><?= $client->name ?></td>
        	<td><?= $client->place ?></td>
        	<td><?= $client->systeme ?></td>
            <td><?= $client->tel ?></td>
        	<td><?= $client->commercial ?></td>
        	<td align="center">
	            <a  href="<?= $client->showUrl();?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
                
	            <!-- <a  href="<?=$client->editUrl()?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="<?=$client->deleteUrl()?>" style="display: inline;" method="post">
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
