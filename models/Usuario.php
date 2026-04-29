<?php

/**
 * Modelo: Usuario
 * Representa un lector/suscriptor del periódico El Faro.
 * Arquitectura MVC — Capa Modelo
 */
class Usuario {
    private int    $id;
    private string $nombre;
    private string $email;
    private string $password;
    private string $fechaRegistro;

    public function __construct(int $id, string $nombre, string $email, string $password, string $fechaRegistro = '') {
        $this->id            = $id;
        $this->nombre        = $nombre;
        $this->email         = $email;
        $this->password      = $password;
        $this->fechaRegistro = $fechaRegistro ?: date('d/m/Y H:i');
    }

    // Getters
    public function getId(): int            { return $this->id; }
    public function getNombre(): string     { return $this->nombre; }
    public function getEmail(): string      { return $this->email; }
    public function getFechaRegistro(): string { return $this->fechaRegistro; }

    // Setters
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setEmail(string $email): void   { $this->email  = $email; }

    /**
     * Valida que el email tenga formato correcto.
     */
    public function validarEmail(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Valida que todos los campos obligatorios estén completos.
     * Retorna array de errores (vacío = sin errores).
     */
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

        if (empty($datos['password'] ?? '')) {
            $errores[] = 'La contraseña es obligatoria.';
        } elseif (strlen($datos['password']) < 6) {
            $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
        }

        if (($datos['password'] ?? '') !== ($datos['password_confirm'] ?? '')) {
            $errores[] = 'Las contraseñas no coinciden.';
        }

        return $errores;
    }
}
