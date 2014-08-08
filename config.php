<?php 

	// routes url to controller and view
	$routes = array(
					array('url' => '/^forms$/', 'controller' => 'form', 'view' => 'forms'),
					array('url' => '/^fields$/', 'controller' => 'field', 'view' => 'fields'),

                    array('url' => '/^form\/new$/', 'controller' => 'form', 'view' => 'new'),
                    array('url' => '/^fields\/new$/', 'controller' => 'field', 'view' => 'new'),

					array('url' => '/^form\/(?P<id>\d+)$/', 'controller' => 'form', 'view' => 'edit'),
                    array('url' => '/^field\/(?P<id>\d+)$/', 'controller' => 'field', 'view' => 'field'),

					array('url' => '/^search\/(?P<id>\d+)\/form$/', 'controller' => 'form', 'view' => 'search_form'),
                    array('url' => '/^search\/(?P<id>\d+)\/field$/', 'controller' => 'field', 'view' => 'search_field'),

                    array('url' => '/^form\/(?P<id>\d+)\/edit$/', 'controller' => 'form', 'view' => 'edit'),
                    array('url' => '/^form\/(?P<id>\d+)\/config$/', 'controller' => 'form', 'view' => 'config'),
					array('url' => '/^field\/(?P<id>\d+)\/edit$/', 'controller' => 'field', 'view' => 'edit'),

                    array('url' => '/^form\/(?P<id>\d+)\/delete/', 'controller' => 'form', 'view' => 'del'),
                    array('url' => '/^field\/(?P<id>\d+)\/delete/', 'controller' => 'field', 'view' => 'del')
                );

	// Database connection params
    define('DB_SERVER', 'mysql');
	define('HOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'password');
	define('DB_NAME', 'formmanager_db');
	
	// The server root
	define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);

    define('URL_ROOT', 'http://localhost/');
	
	//Application directory
	define('APP_ROOT', 'formmanager');
	
	// MVC paths
	define('MODEL_PATH', SERVER_ROOT.APP_ROOT.'/Models/');
	define('VIEW_PATH', SERVER_ROOT.APP_ROOT.'/Views/');
	define('CONTROLLER_PATH', SERVER_ROOT.APP_ROOT.'/Controllers/');
	define('SHARED_PATH', SERVER_ROOT.APP_ROOT.'/Shared/');
	define('CSS_PATH', URL_ROOT.APP_ROOT.'/Content/Css/');
	define('SCRIPT_PATH', URL_ROOT.APP_ROOT.'/Scripts/');
