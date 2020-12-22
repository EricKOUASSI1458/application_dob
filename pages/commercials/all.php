<div class="row">
	<h1 align="center">Liste des commerciaux</h1>
	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>EMAIL</th>
                <th>TEL</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('Commercial')->all() as $commercial): ?>
        <?php
        if ($commercial->statut) {?> 

               
        <tr>
        	<td><?= $commercial->id ?></td>
        	<td><?= $commercial->name ?></td>
        	<td><?= $commercial->email ?></td>
        	<td><?= $commercial->tel ?></td>
        	<td>
	            <a  href="?p=commercial.show&id=<?= $commercial->id;?>" title="Plus d'info">
	                <span class="glyphicon glyphicon-eye-open"></span>
	            </a>
                
	            <!-- <a  href="?p=commercial.edit&id=<?= $commercial->id;?>"  title="Modifier">
	                <span class="glyphicon glyphicon-pencil"></span>
	            </a>

                <form action="?p=commercial.delete" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$commercial->id?>">
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
