<?php
	$app = App::getInstance();

	$client = $app->getTable('Client')->find($_GET['id']);
    $contrats = $app->getTable('Contrat')->contratByClient($_GET['id']);
	if($client === false){
		$app->notFound();
	}

	$app->titre_page = $client->name ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur client</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-4 text-right">
                <h2>Nom</h2>
            </div>
            <div class="col-md-4"><h2><?= $client->name  ?></h2></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Siège</strong></div>
            <div class="col-md-3">
                <?= $client->place  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Email</strong></div>
            <div class="col-md-3">
                <?= $client->email  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Tel</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $client->tel  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Fax</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $client->fax  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 text-right"><strong>Produit</strong></div>
            <div class="col-md-3">
                <?= $client->systeme  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Commercial</strong></div>
            <div class="col-md-3">
                <?= $client->commercial  ?>
            </div>
        </div>
    </div>

    









    <!-- ***************** -->

    <h3 class="text-center" style="color: #f16b0c;">Liste des contrats de <?= $client->name  ?></h3>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>#</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Montant</th>
                <th>Type contrat</th>
                <th>Nombre intervention</th>
            </tr>
        </thead>
        <?php foreach($contrats as $contrat): ?>
        <tr>
        	<td><?= $contrat->id ?></td>
        	<td><?= $contrat->date_deb ?></td>
        	<td><?= $contrat->date_fin ?></td>
        	<td><?= $contrat->montant ?> FCFA</td>
        	<td><?= $contrat->type_cont ?></td>
        	<td>XX</td>
        </tr>
		<?php endforeach;?>
    </table>
</div>
