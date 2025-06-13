<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('plantilla.controller.php');
require_once('usuario.controller.php');
require_once('admin.controller.php');
require_once('rutas.controller.php');
require_once('conexion.php');

// Procesar login antes de cargar la plantilla
if (isset($_GET['ruta']) && $_GET['ruta'] === 'login') {
    // Procesar login antes de cualquier HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        ob_start();
        UsuarioController::crtLogin();
        ob_end_flush();
        // Si crtLogin redirige, el script terminará antes de llegar aquí
    }
    include('login.php');
    exit();
}

// Procesar registro antes de cargar la plantilla
if (isset($_GET['ruta']) && $_GET['ruta'] === 'registro') {
    // Procesar registro antes de cualquier HTML
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        ob_start();
        UsuarioController::crtRegistroUsuario();
        ob_end_flush();
        // Si crtRegistroUsuario redirige, el script terminará antes de llegar aquí
    }
    include('registro.php');
    exit();
}

$plantilla = new PlantillaController();

$plantilla ->crtGetPlantilla();

?>