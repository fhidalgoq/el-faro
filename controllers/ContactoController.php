<?php

require_once 'models/Contacto.php';

class ContactoController {

    public function mostrar(): void {
        $datos = [];
        if (Auth::logeado()) {
            $datos = [
                'nombre' => Auth::nombre(),
                'email'  => Auth::email(),
            ];
        }

        render('views/contacto/form.php', [
            'paginaActiva'  => 'contacto',
            'tituloPagina'  => 'Contacto',
            'metaDesc'      => 'Formulario de contacto del periódico digital El Faro.',
            'taglinePagina' => 'Estamos para escucharte.',
            'errores'       => [],
            'datos'         => $datos,
        ]);
    }

    public function procesar(): void {
        $datos   = $_POST;
        $errores = Contacto::validarDatos($datos);

        if (!empty($errores)) {
            render('views/contacto/form.php', [
                'paginaActiva'  => 'contacto',
                'tituloPagina'  => 'Contacto',
                'metaDesc'      => 'Formulario de contacto del periódico digital El Faro.',
                'taglinePagina' => 'Estamos para escucharte.',
                'errores'       => $errores,
                'datos'         => $datos,
            ]);
            return;
        }

        $nombre  = htmlspecialchars(trim($datos['nombre']));
        $email   = htmlspecialchars(trim($datos['email']));
        $asunto  = htmlspecialchars(trim($datos['asunto']));
        $mensaje = htmlspecialchars(trim($datos['mensaje']));

        if (!Contacto::guardar($nombre, $email, $asunto, $mensaje)) {
            render('views/contacto/form.php', [
                'paginaActiva'  => 'contacto',
                'tituloPagina'  => 'Contacto',
                'metaDesc'      => 'Formulario de contacto del periódico digital El Faro.',
                'taglinePagina' => 'Estamos para escucharte.',
                'errores'       => ['No se pudo enviar el mensaje. Intente nuevamente.'],
                'datos'         => $datos,
            ]);
            return;
        }

        $contacto = new Contacto($nombre, $email, $asunto, $mensaje);

        render('views/contacto/confirmacion.php', [
            'paginaActiva'  => 'contacto',
            'tituloPagina'  => 'Mensaje enviado',
            'metaDesc'      => 'Confirmación de contacto — El Faro.',
            'taglinePagina' => 'Gracias por escribirnos.',
            'contacto'      => $contacto,
        ]);
    }
}
