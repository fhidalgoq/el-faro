<?php

require_once __DIR__ . '/Conexion.php';

/**
 * Modelo: Usuario
 * Representa un lector/suscriptor del periódico El Faro.
 * Arquitectura MVC — Capa Modelo → Conexion (PDO) → MySQL
 */
class Usuario {
    private int    $id;
    private string $nombre;
    private string $email;
    private string $password;
    private string $fechaRegistro;

    public function __construct(
        int $id,
        string $nombre,
        string $email,
        string $password,
        string $fechaRegistro = ''
    ) {
        $this->id            = $id;
        $this->nombre        = $nombre;
        $this->email         = $email;
        $this->password      = $password;
        $this->fechaRegistro = $fechaRegistro ?: date('d/m/Y H:i');
    }

    public function getId(): int               { return $this->id; }
    public function getNombre(): string        { return $this->nombre; }
    public function getEmail(): string         { return $this->email; }
    public function getFechaRegistro(): string   { return $this->fechaRegistro; }

    public function setNombre(string $nombre): void { $this->nombre = $nombre; }
    public function setEmail(string $email): void   { $this->email  = $email; }

    public function validarEmail(): bool {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function existeEmail(string $email): bool {
        $db = new Conexion();
        $filas = $db->consulta(
            'SELECT id FROM usuarios WHERE email = ? LIMIT 1',
            [trim($email)]
        );
        return count($filas) > 0;
    }

    /**
     * Persiste un usuario en la base de datos.
     * @return int|null ID del registro creado, o null si falla.
     */
    public static function guardar(string $nombre, string $email, string $passwordHash): ?int {
        $db = new Conexion();
        $ok = $db->ejecutar(
            'INSERT INTO usuarios (nombre, email, password_hash) VALUES (?, ?, ?)',
            [$nombre, $email, $passwordHash]
        );

        return $ok ? (int) $db->ultimoId() : null;
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
        } elseif (self::existeEmail($datos['email'])) {
            $errores[] = 'Este correo electrónico ya está registrado.';
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
