<?php
$users = App::getInstance()->getTable('Categorie')->all();
?>

<h1>Administrer les categories</h1>
<p>
	<a href="?p=categories.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
	<thead>
	<tr>
		<td>#</td>
		<td>NOM</td>
		<td>ACTIONS</td>
	</tr>
		
	</thead>
	<tbody>
		<?php foreach($users as $user):?>
		<tr>
			<td><?= $user->id?></td>
			<td><?= $user->name?></td>
			<td>
				<a class="btn btn-primary" href="?p=categories.edit&id=<?= $user->id;?>">
					Editer
				</a>
				<form action="?p=categories.delete" style="display: inline;" method="post">
					<input type="hidden" name="id" value="<?=$user->id?>">
					<button type="submit" class="btn btn-danger">
						Supprimer
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>