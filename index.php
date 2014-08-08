<?php

	require_once('config.php');
    require_once('Shared/header.php');

    //Dispatcher implementation
    function dispatcher($routes){

        // Requested URL
        $url = $_SERVER['REQUEST_URI'];

        // Removes Application root from url
        $url = substr( $url, 1 );
        $url = str_replace('formmanager', '', $url);
        $url = substr( $url, 1 );

        if($url == ''){
            require_once('default.php');
            return;
        }

        if($_POST){
            if(isset($_POST['action']) && $_POST['action'] == 'newform'){
                require_once(CONTROLLER_PATH.'form/insert_form.php');
                header("Location: " . URL_ROOT.'formmanager/forms');
            }
            if(isset($_POST['action']) && $_POST['action'] == 'configform'){
                require_once(CONTROLLER_PATH.'form/config_form.php');
                header("Location: " . URL_ROOT.'formmanager/forms');
            }
            if(isset($_POST['action']) && $_POST['action'] == 'editform'){
                require_once(CONTROLLER_PATH.'form/edit_form.php');
                header("Location: " . URL_ROOT.'formmanager/forms');
            }
        }

        $params = array();

        $route_match = false;
        foreach($routes as $urls => $route){
            if(preg_match($route['url'], $url, $matches))
            {
                $params = array_merge($params, $matches);
                $route_match = true;
                break;
            }
        }

        // if no route matched display error
        if(!$route_match){
            include(SHARED_PATH.'noroute.php');
            require_once('Shared/footer.php');
            exit();
        }

        require_once(CONTROLLER_PATH.$route['controller'].'.php');
    }

    //Dispatcher call
    dispatcher($routes);

    require_once('Shared/footer.php');
