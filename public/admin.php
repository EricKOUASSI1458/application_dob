<?php
	use Core\Auth\DBAuth;
	define('ROOT', dirname(__DIR__));
	require ROOT . '/app/App.php';
	App::load();

	if(isset($_GET['p'])){
		$page = $_GET['p'];
	}else{
		$page = 'home';
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
	if($page === 'home'){
		require ROOT . '/pages/admin/produits/index.php';
	}elseif($page === 'produits.edit') {
		require ROOT . '/pages/admin/produits/edit.php';
	}elseif($page === 'produits.add') {
		require ROOT . '/pages/admin/produits/add.php';
	}elseif($page === 'produits.delete') {
		require ROOT . '/pages/admin/produits/delete.php';
	}

	/*fournisseur root for admin*/
	elseif($page === 'fournisseurs.all') {
		require ROOT . '/pages/admin/fournisseurs/index.php';
	}elseif($page === 'fournisseurs.edit') {
		require ROOT . '/pages/admin/fournisseurs/edit.php';
	}elseif($page === 'fournisseurs.add') {
		require ROOT . '/pages/admin/fournisseurs/add.php';
	}elseif($page === 'fournisseurs.delete') {
		require ROOT . '/pages/admin/fournisseurs/delete.php';
	}

	/*categorie root for admin*/
	elseif($page === 'categories.all') {
	require ROOT . '/pages/admin/categories/index.php';
	}elseif($page === 'categories.edit') {
	require ROOT . '/pages/admin/categories/edit.php';
	}elseif($page === 'categories.add') {
	require ROOT . '/pages/admin/categories/add.php';
	}elseif($page === 'categories.delete') {
	require ROOT . '/pages/admin/categories/delete.php';
	}
	
	$content =  ob_get_clean();
	require ROOT . '/pages/templates/default.php';

	
	
?>