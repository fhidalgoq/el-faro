<?php

require_once 'models/Usuario.php';

class UsuarioController {

    public function mostrar(): void {
        if (Auth::logeado()) {
            header('Location: index.php');
            exit;
        }

        render('views/usuario/registro.php', [
            'paginaActiva'  => 'registro',
            'tituloPagina'  => 'Crear cuenta',
            'metaDesc'      => 'Regístrate en El Faro para recibir las noticias del día.',
            'taglinePagina' => 'Únete a nuestra comunidad de lectores.',
            'errores'       => [],
            'datos'         => [],
        ]);
    }

    public function procesar(): void {
        $datos   = $_POST;
        $errores = Usuario::validarDatos($datos);

        if (!empty($errores)) {
            render('views/usuario/registro.php', [
                'paginaActiva'  => 'registro',
                'tituloPagina'  => 'Crear cuenta',
                'metaDesc'      => 'Regístrate en El Faro para recibir las noticias del día.',
                'taglinePagina' => 'Únete a nuestra comunidad de lectores.',
                'errores'       => $errores,
                'datos'         => $datos,
            ]);
            return;
        }

        $nombre = htmlspecialchars(trim($datos['nombre']));
        $email  = htmlspecialchars(trim($datos['email']));
        $hash   = password_hash($datos['password'], PASSWORD_DEFAULT);

        $id = Usuario::guardar($nombre, $email, $hash);

        if ($id === null) {
            render('views/usuario/registro.php', [
                'paginaActiva'  => 'registro',
                'tituloPagina'  => 'Crear cuenta',
                'metaDesc'      => 'Regístrate en El Faro para recibir las noticias del día.',
                'taglinePagina' => 'Únete a nuestra comunidad de lectores.',
                'errores'       => ['No se pudo completar el registro. Intente nuevamente.'],
                'datos'         => $datos,
            ]);
            return;
        }

        Auth::entrar($id, $nombre, $email);

        $usuario = new Usuario($id, $nombre, $email, $hash);

        render('views/usuario/confirmacion.php', [
            'paginaActiva'  => 'registro',
            'tituloPagina'  => 'Registro exitoso',
            'metaDesc'      => 'Confirmación de registro — El Faro.',
            'taglinePagina' => '¡Bienvenido a El Faro!',
            'usuario'       => $usuario,
        ]);
    }
}
