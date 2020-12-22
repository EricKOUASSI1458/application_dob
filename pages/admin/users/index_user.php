<div class="row">
	<h1 align="">Liste des utilisateurs
        <a href="?p=user_admin_add" class="btn  btn-orange-ci pull-right">Ajouter un utilisateur</a>
    </h1>
	<table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Login</th>
                <th>Fonction</th>
                <th>Date création</th>
                <th>Dernière modif</th>
                <td>ACTION</td>
            </tr>
        </thead>
        <?php foreach(App::getInstance()->getTable('User')->all() as $user): ?>
        <?php
        if ($user->statut && !$user->type_user) {?> 

               
        <tr>
        	<td><?= $user->id ?></td>
            <td><?= $user->login ?></td>
        	<td>User</td>
        	<td><?= $user->created_at ?></td>
        	<td><?= $user->updated_at ?></td>
        	<td>
                <!-- <a  href="?p=user_admin_show&id=<?= $user->id;?>" title="Plus d'info">
                    <span class="glyphicon glyphicon-eye-open"></span>
                </a> -->
                <a href="?p=user_admin_edit&id=<?= $user->id;?>"  title="Modifier">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                <form action="?p=user_admin_delete&id=<?= $user->id;?>" style="display: inline;" method="post">
                    <input type="hidden" name="id" value="<?=$user->id?>">
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
