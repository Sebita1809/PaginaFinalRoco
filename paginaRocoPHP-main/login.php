<?php
require_once('usuario.controller.php');

// Procesar login antes de mostrar cualquier HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ob_start(); // Evitar salida accidental
    UsuarioController::crtLogin();
    ob_end_flush();
    // Si crtLogin redirige, el script terminará antes de llegar aquí
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="icon" href="imagenes/HH.ico">
    <title>Login - Healthy Habits</title>
</head>
<body>
<div class="titulo">
    <img src="imagenes/HH.ico" class="logoHH">
    <h1>Healthy <br> Habits</h1>
</div>
<div class="login">
    <div class="datosLogin">
        <form action="index.php?ruta=login" method="POST" >
            <p class="emailPassword">Email</p>
            <input type="email" name="email" id="email" class="emailLogin" placeholder="luke@gmail......">
            <p class="emailPassword">Password</p>
            <input type="password" name="Pass" id="Pass" class="contraseñaLogin" placeholder="............">
            <a class="botonLogin"><button type="submit">Log In</button></a>
            <?php
            // Mostrar errores si existen (solo si es POST y hay errores)
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // crtLogin ya los mostró, pero si quieres mostrarlos aquí, puedes adaptar la función para devolverlos
            }
            ?>
         </form>
    </div>
    <div class="problemasLogin">
        <a href=""><p><strong>Forgot yout password?</strong></p></a>
        <a href="index.php?ruta=registro"><button type="button">Sign Up</button></a>
    </div>
</div>
</body>
</html>