<?php
$produits = App::getInstance()->getTable('Produit')->all();
?>

<h1>Administrer les livres</h1>
<p>
	<a href="?p=produits.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
	<thead>
	<tr>
		<td>#</td>
		<td>Titre</td>
		<td>Detail</td>
		<td>Actions</td>
	</tr>
		
	</thead>
	<tbody>
		<?php foreach($produits as $book):?>
		<tr>
			<td><?= $book->id?></td>
			<td><?= $book->name?></td>
			<td><?= $book->detail?></td>
			<td>
				<a class="btn btn-primary" href="?p=produits.edit&id=<?= $book->id;?>">
					Editer
				</a>
				<form action="?p=produits.delete" style="display: inline;" method="post">
					<input type="hidden" name="id" value="<?=$book->id?>">
					<button type="submit" class="btn btn-danger">
						Supprimer
					</button>
				</form>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>