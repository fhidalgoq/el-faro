<?php

/**
 * Gestión de sesión de usuario — El Faro
 * Mantiene al lector identificado tras el registro.
 */
class Auth {
    public static function iniciar(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function logeado(): bool {
        return !empty($_SESSION['usuario_id']);
    }

    public static function id(): int {
        return (int) ($_SESSION['usuario_id'] ?? 0);
    }

    public static function nombre(): string {
        return (string) ($_SESSION['usuario_nombre'] ?? '');
    }

    public static function email(): string {
        return (string) ($_SESSION['usuario_email'] ?? '');
    }

    public static function entrar(int $id, string $nombre, string $email): void {
        $_SESSION['usuario_id']     = $id;
        $_SESSION['usuario_nombre'] = $nombre;
        $_SESSION['usuario_email']  = $email;
    }

    public static function salir(): void {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
    }
}
