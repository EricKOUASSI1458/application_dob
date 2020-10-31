<div class="row">
	<div class="col-sm-8">
		<?php foreach(App::getInstance()->getTable('Books')->last() as $book): ?>
			<h2><a href="<?= $book->getUrl() ?>"><?= $book->title; ?></a></h2>  
			<p>
				<em><?= $book->user ?></em>
			</p>
			<?= $book->extrait; ?>
		<?php endforeach;?>
	</div>

	<div class="col-sm-4">
		<ul>
			<?php foreach(App\Table\User::all() as $users): ?>
				<li><a href="<?= $users->url;?>"><?= $users->name; ?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
