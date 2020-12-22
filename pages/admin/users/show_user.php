<?php
	$app = App::getInstance();

	$commercial = $app->getTable('Prestataire')->find($_GET['id']);
	if($commercial === false){
		$app->notFound();
	}

	$app->titre_page = $commercial->name ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Info sur Prestataire</h1>
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
            <div class="col-md-3 text-right"><strong>Siège</strong></div>
            <div class="col-md-3">
                <?= $commercial->place  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Emial</strong></div>
            <div class="col-md-3"> 
                <?= $commercial->email  ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-3 text-right"><strong>Tel</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $commercial->tel  ?>
            </div>
            <div class="col-md-3 text-right"><strong>Fax</strong></div>
            <div class="col-md-3"> (+225) 
                <?= $commercial->fax  ?>
            </div>
        </div>
    </div>

    <div>
        <h2 align="right">
            <a href="?p=prestataire_admin" type="button" class="btn btn-xs btn-orange-ci">Retour</a>
        </h3>
    </div>
</div>