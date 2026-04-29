<?php

require_once 'models/Usuario.php';

class UsuarioController {

    public function mostrar(): void {
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

        $usuario = new Usuario(
            1,
            htmlspecialchars(trim($datos['nombre'])),
            htmlspecialchars(trim($datos['email'])),
            password_hash($datos['password'], PASSWORD_DEFAULT)
        );

        render('views/usuario/confirmacion.php', [
            'paginaActiva'  => 'registro',
            'tituloPagina'  => 'Registro exitoso',
            'metaDesc'      => 'Confirmación de registro — El Faro.',
            'taglinePagina' => '¡Bienvenido a El Faro!',
            'usuario'       => $usuario,
        ]);
    }
}
