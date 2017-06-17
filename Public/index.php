<?php 
	if (isset($_SESSION)) {
		session_start();
	}

	define('ROOT', dirname(__DIR__));
	include(ROOT.'/App/App.php');
	App::load();

	use \App\Controllers\ArticlesControllers;

	if (isset($_POST['ajax_action'])) {
		$request = explode('.', $_POST['ajax_action']);

		$controller = '\App\Controllers\\'.ucfirst($request[0]).'Controllers';
		$action = $request[1];

		$controller = new $controller();
		echo $articles = $controller->$action();

	} else {

	$p = 'home';

	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	}
	


	$p = explode('/', rtrim($p, '/'));

	if (isset($p[0])) {
		$controller = '\App\Controllers\\'.ucfirst($p[0]).'Controllers';
		App::getInstance()->cur_page = strtolower($p[0]);
	}

	$action = 'index';

	if(isset($p[1])) {
		$action = $p[1];
	}


	
	$controller = new $controller();
	$articles = $controller->$action();


	
	}