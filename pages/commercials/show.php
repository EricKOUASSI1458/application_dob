<?php
	$app = App::getInstance();

	$commercial = $app->getTable('Commercial')->find($_GET['id']);
	$clients = $app->getTable('Client')->lastByCommercial($_GET['id']);
	if($commercial === false){
		$app->notFound();
	}

	$app->titre_page = $commercial->name ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur Commercial</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-4 text-right">
                <h2>Nom</h2>
            </div>
            <div class="col-md-4"><h2><?= $commercial->name  ?></h2></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Email</strong></div>
            <div class="col-md-3">
                <?= $commercial->email  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Tel</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $commercial->tel  ?>
            </div>
        </div>
    </div>

    <h3 class="text-center" style="color: #f16b0c;">Liste des clients de <?= $commercial->name  ?></h3>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Fax</th>
                <th>Produit</th>
            </tr>
        </thead>
        <?php foreach($clients as $client): ?>
        <tr>
        	<td><?= $client->id ?></td>
        	<td><?= $client->name ?></td>
        	<td><?= $client->email ?></td>
        	<td><?= $client->tel ?></td>
        	<td><?= $client->fax ?></td>
        	<td><?= $client->systeme ?></td>
        </tr>
		<?php endforeach;?>
    </table>

    <div>
        <h2 align="right">
            <a href="?p=commercial.all" type="button" class="btn btn-xs btn-orange-ci">Retour</a>
        </h3>
    </div>
</div>