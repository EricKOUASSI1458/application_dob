<div class="row">
	<div class="col-sm-8">
		<?php foreach(App::getInstance()->getTable('Produit')->last() as $produit): ?> 
			<h2><a href="<?= $produit->url ?>"><?= $produit->name; ?></a></h2>  
			<p>
				<em><?= $produit->fournisseur ?> ||  <?= $produit->categorie ?></em>
			</p>
		<?php endforeach;?>
	</div>

	<div class="col-sm-4">
		<h3>Naviguer par fournisseur</h3>
		<div class="col-sm-12">
			<ul>
				<?php foreach(App::getInstance()->getTable('Fournisseur')->all() as $four): ?>
					<li><a href="<?= $four->url ?>"><?= $four->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</div>
		
		<div class="col-sm-12">
			<h3>Naviguer par categorie</h3>
			<ul>
				<?php foreach(App::getInstance()->getTable('Categorie')->all() as $cat): ?>
					<li><a href="<?= $cat->url ?>"><?= $cat->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</div>

	</div>
</div>
