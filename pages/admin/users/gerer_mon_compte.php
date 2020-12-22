<?php
	$app = App::getInstance();

    $user = $app->getTable('User')->find($_SESSION['auth']);

	
	if($user === false){
		$app->notFound();
	}

	$app->titre_page = $user->login ;
	/*$user = User::find($book->user_id);*/
?>


<div class="well well-lg">
    <h1 class="text-center" style="color: #f16b0c;">Informations sur mon compte </h1>
    

    <div class="row">
        <div class="col-md-12">
            <h2 class="col-md-3 text-right"><strong>Nom : </strong></h2>
            <h2 class="col-md-3">
                <?= $user->login  ?>
            </h2>
            <h2 class="col-md-3 text-right"><strong>Fonction : </strong></h2>
            <h2 class="col-md-3">
                Administrateur
            </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <h2 class="col-md-3 text-right"><strong>Crée le : </strong></h2>
            <h2 class="col-md-3">
                <?= $user->created_at  ?>
            </h2>

            <h2 class="col-md-3 text-right"><strong>Modif le : </strong></h2>
            <h2 class="col-md-3">
                <?= $user->updated_at  ?>
            </h2>
        </div>
    </div>


    


    <!-- ***************** -->

    

    <div>
        <h2 align="right">
            <a href="?p=modif_admin" type="button" class="btn btn-xs orange_inverse">Modifer mes infos</a>
        </h2>
    </div>
</div>
