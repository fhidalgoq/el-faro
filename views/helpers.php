<?php
/**
 * Helper compartido — El Faro
 */
require_once __DIR__ . '/../models/Auth.php';

// --- Badge por sección -------------------------------------------
if (!function_exists('badgeClass')) {
    function badgeClass(string $seccion): string {
        $map = [
            'deporte'    => 'badge-sport',
            'negocios'   => 'badge-business',
            'tecnologia' => 'badge-tech',
            'cultura'    => 'badge-culture',
        ];
        return $map[strtolower($seccion)] ?? 'badge-general';
    }
}

// --- Render de vista con layout ----------------------------------
if (!function_exists('render')) {
    function render(string $vista, array $vars = []): void {
        extract($vars, EXTR_SKIP);
        require 'views/layout/header.php';
        require $vista;
        require 'views/layout/footer.php';
    }
}
