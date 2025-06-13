<?php
require_once('usuario.controller.php');
// Procesar registro solo si es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start();
    UsuarioController::crtRegistroUsuario();
    ob_end_flush();
    // Si crtRegistroUsuario redirige, el script termina aquí
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="icon" href="imagenes/HH.ico">
    <title>Registro - Healthy Habits</title>
</head>
<body>
<div class="titulo">
        <img src="imagenes/HH.ico" class="logoHH">
        <h1>Healthy <br> Habits</h1>
    </div>
    <div class="loginRegister">
        <div class="datosLogin">
            <form action="index.php?ruta=registro" method="POST" >
                <p class="emailPassword">Name</p>
                <input type="text" name="nombre" id="nombre" class="emailLogin" placeholder="Jonathan">
                <p class="emailPassword">Last Name</p>
                <input type="text" name="apellido" id="apellido" class="emailLogin" placeholder="Joestar">
                <p class="emailPassword">Email</p>
                <input type="email" name="email" id="email" class="emailLogin" placeholder="jonathan@gmail......">
                <p class="emailPassword">Phone</p>
                <input type="number" name="celular" id="celular" class="emailLogin" placeholder="2610011223">
                <p class="emailPassword">Password</p>
                <input type="password" name="pass" id="pass" class="contraseñaLogin" placeholder="............">
                <a href="home.html" class="botonLogin"><button type="submit">Sign Up</button></a>
                <?php
                // Los errores ya se muestran en el controlador si existen
                ?>
             </form>
        </div>
        <div class="problemasLogin">
            <a href=""><p><strong>Forgot yout password?</strong></p></a>
            <a href="index.php?ruta=login"><button type="button">Log In</button></a>
        </div>
    </div>
</body>
</html>