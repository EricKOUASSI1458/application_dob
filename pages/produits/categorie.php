<?php
	$app = App::getInstance();
	$categorie = $app->getTable('Categorie')->find($_GET['id']);

	if($categorie === false){
		$app->notFound();
	}

	$produits = $app->getTable('Produit')->lastByFCategorie($_GET['id']);
	$fournisseurs = $app->getTable('Fournisseur')->all();
	$categories = $app->getTable('Categorie')->all();
?>

<h1><?= $categorie->name;?></h1>


<div class="row">
	<div class="col-sm-8">
		<?php foreach($produits as $produit): ?>
			<h2><a href="<?= $produit->getUrl() ?>"><?= $produit->name; ?></a></h2>  
			<p>
				<em><?= $produit->fournisseur ?></em> ||
				<em><?= $produit->categorie ?></em>
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
