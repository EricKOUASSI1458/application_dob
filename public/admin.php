<?php
	use Core\Auth\DBAuth;
	define('ROOT', dirname(__DIR__));
	require ROOT . '/app/App.php';
	App::load();

	if(isset($_GET['p'])){
		$page = $_GET['p'];
	}else{
		$page = 'accueil_admin';
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
	}elseif($page === 'commercial_admin_show') {
	require ROOT . '/pages/admin/commercials/show.php';
	}

	/*routing accueil*/
	elseif($page === 'accueil_admin') {
		require ROOT . '/pages/admin/accueil/home.php';
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
	}elseif($page === 'client_admin_show') {
	require ROOT . '/pages/admin/clients/show.php';
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
	}elseif($page === 'prestataire_admin_show') {
	require ROOT . '/pages/admin/prestataires/show.php';
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
	}elseif($page === 'contrat_admin_show') {
	require ROOT . '/pages/admin/contrats/show.php';
	}elseif($page === 'contrat_admin_list_encours') {
	require ROOT . '/pages/admin/contrats/list_encours.php';
	}elseif($page === 'contrat_admin_list_expirant_3_mois') {
	require ROOT . '/pages/admin/contrats/list_expirant_3_mois.php';
	}elseif($page === 'contrat_admin_list_echue') {
	require ROOT . '/pages/admin/contrats/list_echue.php';
	}elseif($page === 'contrat_admin_add_cible') {
	require ROOT . '/pages/admin/contrats/add_cible.php';
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
	}elseif($page === 'intervention_admin_show') {
	require ROOT . '/pages/admin/interventions/show.php';
	}elseif($page === 'intervention_admin_realisee') {
	require ROOT . '/pages/admin/interventions/list_realisee.php';
	}elseif($page === 'intervention_admin_a_venir') {
	require ROOT . '/pages/admin/interventions/list_a_venir.php';
	}elseif($page === 'intervention_mois_courant') {
	require ROOT . '/pages/admin/interventions/list_mois_en_cours.php';
	}


	/*commerciaux root for intervention_sans_contrat*/
	elseif($page === 'intervention.sans.contrat_admin_add') {
	require ROOT . '/pages/admin/intervention_sans_contrats/add.php';
	}elseif($page === 'intervention.sans.contrat_admin') {
	require ROOT . '/pages/admin/intervention_sans_contrats/index.php';
	}elseif($page === 'intervention.sans.contrat_admin_show') {
	require ROOT . '/pages/admin/intervention_sans_contrats/show.php';
	}elseif($page === 'intervention.sans.contrat_admin_delete') {
	require ROOT . '/pages/admin/intervention_sans_contrats/delete.php';
	}elseif($page === 'intervention.sans.contrat_admin_edit') {
	require ROOT . '/pages/admin/intervention_sans_contrats/edit.php';
	}


	/*root for users*/
	elseif($page === 'user_admin') {
	require ROOT . '/pages/admin/users/index_user.php';
	}elseif($page === 'user_admin_edit') {
	require ROOT . '/pages/admin/users/edit_user.php';
	}elseif($page === 'user_admin_add') {
	require ROOT . '/pages/admin/users/add_user.php';
	}elseif($page === 'user_admin_delete') {
	require ROOT . '/pages/admin/users/delete_user.php';
	}elseif($page === 'user_admin_show') {
	require ROOT . '/pages/admin/users/show_user.php';
	}



	/*gestion compte*/
	elseif($page === 'info_admin') {
	require ROOT . '/pages/admin/users/gerer_mon_compte.php';
	}elseif($page === 'modif_admin') {
	require ROOT . '/pages/admin/users/edit.php';
	}
	/*gestion compte*/


	



	
	$content =  ob_get_clean();
	require ROOT . '/pages/templates/admin.php';

	
	
?>