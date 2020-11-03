<?php
	use Core\Auth\DBAuth;
	define('ROOT', dirname(__DIR__));
	require ROOT . '/app/App.php';
	App::load();

	if(isset($_GET['p'])){
		$page = $_GET['p'];
	}else{
		$page = 'commercial_admin';
	}

	//auth
	$app = App::getInstance();
	$auth = new DBAuth($app->getDb());
	if(!$auth->logged()){
		$app->forbidden();
	}
	if(!$auth->getTypeUser()){
		$app->forbidden();
	}

	ob_start();

	/*commerciaux root for admin*/
	if($page === 'commercial_admin') {
	require ROOT . '/pages/admin/commercials/index.php';
	}elseif($page === 'commercial_admin_edit') {
	require ROOT . '/pages/admin/commercials/edit.php';
	}elseif($page === 'commercial_admin_add') {
	require ROOT . '/pages/admin/commercials/add.php';
	}elseif($page === 'commercial_admin_delete') {
	require ROOT . '/pages/admin/commercials/delete.php';
	}

	/*commerciaux root for client*/
	elseif($page === 'client_admin') {
	require ROOT . '/pages/admin/clients/index.php';
	}elseif($page === 'client_admin_edit') {
	require ROOT . '/pages/admin/clients/edit.php';
	}elseif($page === 'client_admin_add') {
	require ROOT . '/pages/admin/clients/add.php';
	}elseif($page === 'client_admin_delete') {
	require ROOT . '/pages/admin/clients/delete.php';
	}

	/*commerciaux root for prestataire*/
	elseif($page === 'prestataire_admin') {
	require ROOT . '/pages/admin/prestataires/index.php';
	}elseif($page === 'prestataire_admin_edit') {
	require ROOT . '/pages/admin/prestataires/edit.php';
	}elseif($page === 'prestataire_admin_add') {
	require ROOT . '/pages/admin/prestataires/add.php';
	}elseif($page === 'prestataire_admin_delete') {
	require ROOT . '/pages/admin/prestataires/delete.php';
	}

	/*commerciaux root for contrat*/
	elseif($page === 'contrat_admin') {
	require ROOT . '/pages/admin/contrats/index.php';
	}elseif($page === 'contrat_admin_edit') {
	require ROOT . '/pages/admin/contrats/edit.php';
	}elseif($page === 'contrat_admin_add') {
	require ROOT . '/pages/admin/contrats/add.php';
	}elseif($page === 'contrat_admin_delete') {
	require ROOT . '/pages/admin/contrats/delete.php';
	}

	/*commerciaux root for intervention*/
	elseif($page === 'intervention_admin') {
	require ROOT . '/pages/admin/interventions/index.php';
	}elseif($page === 'intervention_admin_edit') {
	require ROOT . '/pages/admin/interventions/edit.php';
	}elseif($page === 'intervention_admin_add') {
	require ROOT . '/pages/admin/interventions/add.php';
	}elseif($page === 'intervention_admin_delete') {
	require ROOT . '/pages/admin/interventions/delete.php';
	}
	
	$content =  ob_get_clean();
	require ROOT . '/pages/templates/admin.php';

	
	
?>