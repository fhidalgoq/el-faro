<?php

require_once __DIR__ . '/Conexion.php';

/**
 * Modelo: Contacto
 * Representa los datos del formulario de contacto de El Faro.
 * Arquitectura MVC — Capa Modelo → Conexion (PDO) → MySQL
 */
class Contacto {
    private string $nombre;
    private string $email;
    private string $asunto;
    private string $mensaje;

    public function __construct(string $nombre, string $email, string $asunto, string $mensaje) {
        $this->nombre  = $nombre;
        $this->email   = $email;
        $this->asunto  = $asunto;
        $this->mensaje = $mensaje;
    }

    public function getNombre(): string  { return $this->nombre; }
    public function getEmail(): string   { return $this->email; }
    public function getAsunto(): string  { return $this->asunto; }
    public function getMensaje(): string { return $this->mensaje; }

    public static function guardar(string $nombre, string $email, string $asunto, string $mensaje): bool {
        $db = new Conexion();
        return $db->ejecutar(
            'INSERT INTO contactos (nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?)',
            [$nombre, $email, $asunto, $mensaje]
        );
    }

    public static function validarDatos(array $datos): array {
        $errores = [];

        if (empty(trim($datos['nombre'] ?? ''))) {
            $errores[] = 'El nombre es obligatorio.';
        }

        if (empty(trim($datos['email'] ?? ''))) {
            $errores[] = 'El correo electrónico es obligatorio.';
        } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
            $errores[] = 'El formato del correo electrónico no es válido.';
        }

        if (empty(trim($datos['asunto'] ?? ''))) {
            $errores[] = 'El asunto es obligatorio.';
        }

        if (empty(trim($datos['mensaje'] ?? ''))) {
            $errores[] = 'El mensaje es obligatorio.';
        } elseif (strlen(trim($datos['mensaje'])) < 10) {
            $errores[] = 'El mensaje debe tener al menos 10 caracteres.';
        }

        return $errores;
    }
}
