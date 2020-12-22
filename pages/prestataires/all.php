<div class="row">
	<h1 align="center">Liste des prestaires</h1>
	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>NOM</th>
                <th>EMAIL</th>
                <th>TEL</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('Prestataire')->all() as $prestataire): ?>
        <?php
        if ($prestataire->statut) {?> 

               
        <tr>
        	<td><?= $prestataire->id ?></td>
        	<td><?= $prestataire->name ?></td>
        	<td><?= $prestataire->email ?></td>
        	<td><?= $prestataire->tel ?></td>
        	<td align="center">
                <a  href="<?= $prestataire->showUrl();?>" title="Plus d'info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a>
                <!-- <a  href="<?=$prestataire->editUrl()?>"  title="Modifier">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                <form action="<?=$prestataire->deleteUrl()?>" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$prestataire->id?>">
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
