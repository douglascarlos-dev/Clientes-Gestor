<?php
session_start();

define('ENDERECO', '/php-pdo-oop-clean-urls-postgresql');
define('URLROOT', '/php-pdo-oop-clean-urls-postgresql');

include_once 'controller/UserController.php';
$usuario = new UserController();

$url = (isset($_GET['url'])) ? $_GET['url']:'';
$url = array_filter(explode('/',$url));
@$classe = ucfirst($url[0]);

if($classe != 'User'){
    $usuario->isLoggedIn();
}

@$classe .= 'Controller';
@include_once 'controller/'.$classe.'.php';
if (!empty($classe) and class_exists($classe)) {
        $$classe = new $classe();
        array_shift($url);
        @$metodo = $url[0];
        if (!empty($metodo) and method_exists($$classe, $metodo)){
            
            array_shift($url);
            $parametros = array();
            $parametros = $url;
            if(count($parametros) == 1){
                $parametro = $url[0];
                $$classe->$metodo($parametro);
            } else {
                $$classe->$metodo($parametros);
            }

        } elseif (method_exists($$classe,'visualizar')) {
            $$classe->visualizar();
        } else {
            require_once 'controller/Home.php';
            $Home = new Home();
            $Home->view();
        }
} else {
    require_once 'controller/Home.php';
    $Home = new Home();
    $Home->view();
}
?>