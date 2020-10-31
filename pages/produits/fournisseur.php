<?php
	$app = App::getInstance();
	$fournisseur = $app->getTable('Fournisseur')->find($_GET['id']);

	if($fournisseur === false){
		$app->notFound();
	}

	$produits = $app->getTable('Produit')->lastByFournisseur($_GET['id']);
	$fournisseurs = $app->getTable('Fournisseur')->all();
	$categories = $app->getTable('Categorie')->all();
?>

<h1><?= $fournisseur->name;?></h1>


<div class="row">
	<div class="col-sm-8">
		<?php foreach($produits as $book): ?>
			<h2><a href="<?= $book->getUrl() ?>"><?= $book->name; ?></a></h2>  
			<p>
				<em><?= $book->fournisseur ?></em>
			</p>
		<?php endforeach;?>
		<?php
			if(!$produits){
				echo "<em>pas de produits pour ce fournisseur</em>";
			}
		?>
	</div>

	<div class="col-sm-4">
		<div class="col-sm-12">
			<h2>Trie par fournisseur</h2>
			<ul>
				<?php foreach($fournisseurs as $tous): ?>
					<li><a href="<?= $tous->url;?>"><?= $tous->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		
		<div class="col-sm-12">
			<h2>Trie par Categorie</h2>
			<ul>
				<?php foreach($categories as $tous): ?>
					<li><a href="<?= $tous->url;?>"><?= $tous->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
</div>
