<?php
/**
 * Router principal — El Faro
 * Punto de entrada único. Parámetro: ?page=<seccion>
 * Arquitectura MVC — PHP Puro
 */

require_once 'views/helpers.php';
require_once 'controllers/ArticuloController.php';
require_once 'controllers/ContactoController.php';
require_once 'controllers/UsuarioController.php';

Auth::iniciar();

$page = htmlspecialchars(strip_tags($_GET['page'] ?? 'home'));

if ($page === 'logout') {
    Auth::salir();
    header('Location: index.php');
    exit;
}

$secciones  = ['home', 'deporte', 'negocios', 'tecnologia', 'cultura'];
$articuloCtrl = new ArticuloController();
$contactoCtrl = new ContactoController();
$usuarioCtrl  = new UsuarioController();

// Secciones de noticias → un solo método
if (in_array($page, $secciones)) {
    $articuloCtrl->cargar($page);
    exit;
}

// Formularios
switch ($page) {
    case 'contacto':
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? $contactoCtrl->procesar()
            : $contactoCtrl->mostrar();
        break;

    case 'registro':
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? $usuarioCtrl->procesar()
            : $usuarioCtrl->mostrar();
        break;

    default:
        header('Location: index.php');
        exit;
}
