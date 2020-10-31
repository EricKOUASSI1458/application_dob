<?php
	define('ROOT', dirname(__DIR__));
	require ROOT . '/app/App.php';
	App::load();

	if(isset($_GET['p'])){
		$page = $_GET['p'];
	}else{
		$page = 'home';
	}

	ob_start();
	if($page === 'home'){
		require ROOT . '/pages/produits/home.php';
	}elseif($page === 'produits.fournisseur') {
		require ROOT . '/pages/produits/fournisseur.php';
	}elseif($page === 'produits.categorie') {
		require ROOT . '/pages/produits/categorie.php';
	}
	elseif($page === 'produits.show') {
		require ROOT . '/pages/produits/show.php';
	}elseif($page === 'login') {
		require ROOT . '/pages/users/login.php';
	}elseif($page === 'delogin') {
		require ROOT . '/pages/users/delogin.php';
	}

	/*pagination fournisseur*/
	elseif($page === 'fournisseur.all') {
		require ROOT . '/pages/fournisseurs/home.php';
	}
	/*pagination categorie*/
	elseif($page === 'categorie.all') {
		require ROOT . '/pages/categories/home.php';
	}
	
	$content =  ob_get_clean();
	require ROOT . '/pages/templates/default.php';

	
	
?>