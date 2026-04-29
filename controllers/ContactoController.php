<?php

require_once 'models/Contacto.php';

class ContactoController {

    public function mostrar(): void {
        render('views/contacto/form.php', [
            'paginaActiva'  => 'contacto',
            'tituloPagina'  => 'Contacto',
            'metaDesc'      => 'Formulario de contacto del periódico digital El Faro.',
            'taglinePagina' => 'Estamos para escucharte.',
            'errores'       => [],
            'datos'         => [],
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

        $contacto = new Contacto(
            htmlspecialchars(trim($datos['nombre'])),
            htmlspecialchars(trim($datos['email'])),
            htmlspecialchars(trim($datos['asunto'])),
            htmlspecialchars(trim($datos['mensaje']))
        );

        render('views/contacto/confirmacion.php', [
            'paginaActiva'  => 'contacto',
            'tituloPagina'  => 'Mensaje enviado',
            'metaDesc'      => 'Confirmación de contacto — El Faro.',
            'taglinePagina' => 'Gracias por escribirnos.',
            'contacto'      => $contacto,
        ]);
    }
}
