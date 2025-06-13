<?php

require('usuario.php');
class UsuarioController
{


    static public function crtRegistroUsuario() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'celular' => $_POST['celular'],
                'pass' => $_POST['pass'],
                'rol' => 'CLIENTE',
                'activo' => 'ACTIVO'
            ];
        
            $resultado = ModeloUsuario::mdlRegistroUsuario($datos);
        
            if (is_array($resultado)) {
                foreach ($resultado as $error) {
                    echo $error;
                }
            } elseif ($resultado === "ok") {
                // Redirige al login tras registro exitoso
                header('Location: index.php?ruta=login');
                exit();
            } else {
                // Manejar el error si es necesario
                echo "Error en el registro: ";
            }
        }
    }

    static public function crtLogin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $datos = [
                'email' => $_POST['email'],
                'Pass' => $_POST['Pass']
            ];
        
            $resultado = ModeloUsuario::mdlLogin($datos);

            // Si login es exitoso, iniciar sesión y redirigir antes de cualquier HTML
            if (isset($resultado['success']) && $resultado['success'] === true) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION = $resultado['usuario'];
                header('Location:index.php?ruta=home');
                exit();
            }

            // Manejo de errores (mostrar errores si existen)
            if (isset($resultado['success']) && $resultado['success'] === false) {
                if (!empty($resultado['errores'])) {
                    foreach ($resultado['errores'] as $error) {
                        echo $error;
                    }
                }
            } else if (!empty($resultado)) {
                // Esto es para casos donde mdlLogin pueda devolver solo errores sin la estructura success
                // aunque con los cambios actuales ya no debería ocurrir.
                foreach ($resultado as $error) {
                    // Evitar imprimir el array 'usuario' si es el caso
                    if (!is_array($error)) {
                        echo $error;
                    }
                }
            }
        }
    }
    
}
