<?php
use Core\Auth\DBAuth;
	define('ROOT', dirname(__DIR__));
	require ROOT . '/app/App.php';
	App::load();

	if(isset($_GET['p'])){
		$page = $_GET['p'];
	}else{
		$page = 'login';
	}
	$app = App::getInstance();
	$auth = new DBAuth($app->getDb());
	

	ob_start();
	if($page === 'commercial.all'){
		require ROOT . '/pages/commercials/all.php';
	}elseif($page === 'commercial.show') {
		require ROOT . '/pages/commercials/show.php';
	}elseif($page === 'commercial.add') {
		require ROOT . '/pages/commercials/add.php';
	}elseif($page === 'commercial.edit') {
		require ROOT . '/pages/commercials/edit.php';
	}elseif($page === 'commercial.delete') {
		require ROOT . '/pages/commercials/delete.php';
	}

	/*routing accueil*/
	elseif($page === 'accueil') {
		require ROOT . '/pages/accueil/home.php';
	}

	/*routing client*/
	elseif($page === 'client.all'){
		require ROOT . '/pages/clients/all.php';
	}elseif($page === 'client.show') {
		require ROOT . '/pages/clients/show.php';
	}elseif($page === 'client.add') {
		require ROOT . '/pages/clients/add.php';
	}elseif($page === 'client.edit') {
		require ROOT . '/pages/clients/edit.php';
	}elseif($page === 'client.delete') {
		require ROOT . '/pages/clients/delete.php';
	}

	/*routing prestataire*/
	elseif($page === 'prestataire.all'){
		require ROOT . '/pages/prestataires/all.php';
	}elseif($page === 'prestataire.show') {
		require ROOT . '/pages/prestataires/show.php';
	}elseif($page === 'prestataire.add') {
		require ROOT . '/pages/prestataires/add.php';
	}elseif($page === 'prestataire.edit') {
		require ROOT . '/pages/prestataires/edit.php';
	}elseif($page === 'prestataire.delete') {
		require ROOT . '/pages/prestataires/delete.php';
	}

	/*routing contrat*/
	elseif($page === 'contrat.all'){
		require ROOT . '/pages/contrats/all.php';
	}elseif($page === 'contrat.show') {
		require ROOT . '/pages/contrats/show.php';
	}elseif($page === 'contrat.add') {
		require ROOT . '/pages/contrats/add.php';
	}elseif($page === 'contrat.edit') {
		require ROOT . '/pages/contrats/edit.php';
	}elseif($page === 'contrat.delete') {
		require ROOT . '/pages/contrats/delete.php';
	}elseif($page === 'contrat.list_encours') {
	require ROOT . '/pages/contrats/list_encours.php';
	}elseif($page === 'contrat.list_expirant_3_mois') {
	require ROOT . '/pages/contrats/list_expirant_3_mois.php';
	}elseif($page === 'contrat.list_echue') {
	require ROOT . '/pages/contrats/list_echue.php';
	}

	/*routing intervention*/
	elseif($page === 'intervention.all'){
		require ROOT . '/pages/interventions/all.php';
	}elseif($page === 'intervention.show') {
		require ROOT . '/pages/interventions/show.php';
	}elseif($page === 'intervention.add') {
		require ROOT . '/pages/interventions/add.php';
	}elseif($page === 'intervention.edit') {
		require ROOT . '/pages/interventions/edit.php';
	}elseif($page === 'intervention.delete') {
		require ROOT . '/pages/interventions/delete.php';
	}elseif($page === 'intervention.list_realisee') {
	require ROOT . '/pages/interventions/list_realisee.php';
	}elseif($page === 'intervention.list_a_venir') {
	require ROOT . '/pages/interventions/list_a_venir.php';
	}elseif($page === 'intervention.list_mois_courant') {
	require ROOT . '/pages/interventions/list_mois_en_cours.php';
	}

	/*rooting intervention_sans_contrat*/
	elseif($page === 'interventions_ans_contrat.add') {
	require ROOT . '/pages/intervention_sans_contrats/add.php';
	}elseif($page === 'intervention_sans_contrat.all') {
	require ROOT . '/pages/intervention_sans_contrats/index.php';
	}elseif($page === 'intervention_sans_contrat.show') {
	require ROOT . '/pages/intervention_sans_contrats/show.php';
	}elseif($page === 'intervention_sans_contrat.delete') {
	require ROOT . '/pages/intervention_sans_contrats/delete.php';
	}elseif($page === 'intervention_sans_contrat.edit') {
	require ROOT . '/pages/intervention_sans_contrats/edit.php';
	}



	/*block authentification*/
	elseif($page === 'login') {
		require ROOT . '/pages/users/login.php';
	}elseif($page === 'delogin') {
		require ROOT . '/pages/users/delogin.php';
	}

	/*gestion compte*/
	elseif($page === 'info_user') {
	require ROOT . '/pages/users/gerer_mon_compte.php';
	}elseif($page === 'modif_user') {
	require ROOT . '/pages/users/edit.php';
	}
	/*gestion compte*/

	
	$content =  ob_get_clean();
	require ROOT . '/pages/templates/default.php';

	
	
?>