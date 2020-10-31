<?php
	$app = App::getInstance();

	$book = $app->getTable('Produit')->find($_GET['id']);
	if($book === false){
		$app->notFound();
	}

	$app->titre_page = $book->name ;
	/*$user = User::find($book->user_id);*/
?>

<h2><?= $book->name; ?></h2>
<p><em><?=$book->categorie; ?></em></p>
<p><?= $book->fournisseur; ?></p>


